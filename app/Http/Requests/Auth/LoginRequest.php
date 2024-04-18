<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'emailUser' => ['required', 'string', 'emailUser'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('email', 'password');
        $remember = $this->filled('remember');

        if (! Auth::attempt($credentials, $remember)) {
            $this->incrementLoginAttempts($credentials['email']);
            
            $message = trans('auth.failed');
            
            if (!RateLimiter::tooManyAttempts($this->throttleKey($credentials['email']), 5)) {
                $message = trans('auth.failed') . ' ' . trans('auth.throttle', [
                    'seconds' => RateLimiter::availableIn($this->throttleKey($credentials['email'])),
                    'minutes' => ceil(RateLimiter::availableIn($this->throttleKey($credentials['email'])) / 60),
                ]);
            }
            
            throw ValidationException::withMessages([
                'email' => [$message],
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        $email = $this->input('email');
        $throttleKey = $this->throttleKey($email);

        if (! RateLimiter::tooManyAttempts($throttleKey, 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($throttleKey);

        throw ValidationException::withMessages([
            'email' => [trans('auth.throttle', ['seconds' => $seconds, 'minutes' => ceil($seconds / 60)])],
        ]);
    }

       /**
     * Get the rate limiting throttle key for the request.
     *
     * @param string $email
     * @return string
     */
    public function throttleKey(string $email): string
    {
        return Str::lower($email) . '|' . $this->ip();
    }

    /**
     * Increment the login attempts for the user.
     *
     * @param string $email
     * @return void
     */
    protected function incrementLoginAttempts(string $email): void
    {
        RateLimiter::hit($this->throttleKey($email));
    }

}
