<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .srouce{
            text-align: center;
            color: #ffffff;
            padding: 10px;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="form-container">

            <div class="srouce"><a title="Learn How to create Beautiful HTML & CSS login page template" href="https://www.w3jar.com/beautiful-html-css-login-page-template/">W3jar.Com</a></div>

            <div class="form-body">
                <h2 class="title">Log in with</h2>
                <div class="social-login">
                    <ul>
                        <li class="google"><a href="#">Google</a></li>
                        <li class="fb"><a href="#">Facebook</a></li>
                    </ul>
                </div><!-- SOCIAL LOGIN -->

                <div class="_or">or</div>

                <form action="" class="the-form">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">

                    <input type="submit" value="Log In">

                </form>

            </div><!-- FORM BODY-->

            <div class="form-footer">
                <div>
                    <span>Don't have an account?</span> <a href="">Sign Up</a>
                </div>
            </div><!-- FORM FOOTER -->

        </div><!-- FORM CONTAINER -->
    </div>

</body>
</html>
    <!-- <title>Home</title>
</head>
<body>
     <h1>Welcome</h1>
    <nav>
        <ul>
            <li><a href="{{route('route-index')}}">Home</a></li>
            <li><a href="{{route('route-form')}}">Login</a></li>
        </ul>
    </nav>
    <h2>{{$kurikulum}}</h2>
    <ol>
        @foreach($courses as $course) 
            <li>{{$course}}</li>
        @endforeach
    </ol>
</body>
</html> -->
