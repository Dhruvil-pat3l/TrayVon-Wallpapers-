<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'><link rel="stylesheet" href="style.css">
     <style>
     img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
     {
        display: none;  
    }
 </style>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
      
        $query    = "INSERT into `admin` (username,password,email)
                     VALUES ('$username', '$password', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='cont'>
                  <h3  style=' color:#00ff00 ; margin: 50px auto; width: 500px; padding: 1px 5px; font-size: 30px; text-align: center;  '>You are registered successfully.</h3><br/>
                  <p style='  margin: 20px auto; width: 500px; padding: 1px 1px; color: #666; font-size: 25px; text-align: center; margin-bottom: 0px; '>Click here to <a href='login.php' style='color:white'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='cont'>
                  <h3  style=' color:#990033; margin: 50px auto; width: 500px; padding: 1px 5px; font-size: 30px; text-align: center;  ' >Username is already registered</h3><br/>
                  <p style='  margin: 20px auto; width: 500px; padding: 1px 5px; color: #666; font-size: 25px; text-align: center; margin-bottom: 0px; '>Click here to <a href='register.php' style='color:white'>Register</a> again.</p>
                  </div>";
        }
    } else {
?>

<form action="" method="post" class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input" name="username" placeholder="Username" required />
        </div>

        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input" name="password" placeholder="Password" required />
        </div>

        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
          </svg> 
          <input type="email" class="login__input" name="email" placeholder="E-mail" required />
        </div>

           <input type="submit"  value="Register" class="login_submit"  name="submit"> 
           <p class="login__signup"><a href="login.php">Already have an account ?</a></p>
      </div>
    </div>
  </div>
</form>
<?php
    }
?>

</body>
</html>
