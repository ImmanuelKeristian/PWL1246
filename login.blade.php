<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
    body,h1 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
    background-image: url('imej/aswq.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
    }
</style>
</head>
<body>

    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-display-middle">
          <h1 class="w3-jumbo w3-animate-top">LOG IN</h1>
          <form method="POST" action="http://127.0.0.1:8000/login" class="the-form">
            <table>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="email" id="email" required="required" placeholder="Enter your email">
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password" required="required" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td>
                        <input id="remember_me" type="checkbox" name="remember"> Remember Me
                    </td>
                    <td></td>
                </tr> 
                <tr>
                    <td><input type="submit" value="Log In"></td>
                    <td><span>Don't have an account?</span> <a href="">Register</a></td>
                </tr>  
            </table>
          </form>    
        </div>
      </div>
</body>
</html>