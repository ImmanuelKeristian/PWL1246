<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .logres{
        padding:1px;
        background:white;
        color:white;
        border-radius:1px;
        display:block;
        }
        a{
        text-decoration:none;
        }
        
    </style>
</head>
<!-- style= "background:url('https://imgur.com/t/background/3sbm53s') center no-repeat" -->
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header" >
                    <h1 class="card-title">Register</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('register-proses') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">NRP</label>
                            <input type="text" name="id" value="{{ old('id')}}" class="form-control" id="id" placeholder="NRP" required>
                        </div>
                        @error('id')
                            <small>{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                            <label for="nama" class="form-label">Name</label>
                            <input type="text" name="nama" value="{{ old('nama')}}" class="form-control" id="nama" placeholder="John Doe" required>
                        </div>
                        @error('nama')
                            <small>{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" value="{{ old('email')}}" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        @error('email')
                            <small>{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        @error('password')
                            <small>{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
