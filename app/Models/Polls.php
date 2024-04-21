<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    use HasFactory;

    protected $table = 'pollinghasil';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idpollingHasil',
        'idCourse',
        'totalPolling',
        'start_poll',
        'end_poll',
        'statusPoll'
    ];
    
    public function course()
    {
        return $this->belongsTo(Matkul::class, 'idCourse');
    }

    protected $primaryKey = 'idpollingHasil';
}
