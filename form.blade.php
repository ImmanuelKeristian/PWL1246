<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Page</h1>
    <nav>
        <ul>
            <li><a href="{{route('route-index')}}">Home</a></li>
            <li><a href="{{route('route-form')}}">Login</a></li>
            <li><a href="{{route('route-about')}}">Register</a></li>
        </ul>
    </nav>
    <form method="post" action="{{ route('halo-user') }}">
        @csrf
        <div>
            <h3>Login</h3>
            <label for="name_id">Email</label>
            <input type="text" id="name_id" name="nama" placeholder="e.g.John Doe" maxlength="100" required autofocus>
        </div>
        <div>
            <label for="pw_id">Password</label>
            <input type="text" id="pw_id" name="nama" placeholder="********" maxlength="16">
        </div>
        <button type="submit" name="btnSubmit">Submit</button>
    </form>
</body>
</html>