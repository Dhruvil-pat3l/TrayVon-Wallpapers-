<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
    // session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `admin` WHERE username='$username'
                     AND password='$password' ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            ?>
            <script type="text/javascript">
            window.location.href = 'https://trayvon.000webhostapp.com/wall/home.php';
            </script>
            <?php
            // header("Location: home.php", TRUE, 301);
        } else {  
           echo " <div class='cont'>
                  <h3 style=' color:#990033; margin: 50px auto; width: 500px; padding: 1px 5px; font-size: 30px; text-align: center;  ' >Incorrect Username/password.</h3><br/>
                  <p style='  margin: 20px auto; width: 500px; padding: 1px 5px; color: #666; font-size: 25px; text-align: center; margin-bottom: 10px; '>Click here to <a href='login.php' style='color:white'>Login</a> again.</p>
                     </div> "; 
        }
    } else {
?>

<form method="post" class="cont" name="login">
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
           <input type="submit" value="login" class="login_submit"  name="submit" >
      <p class="login__signup"><br><a href="forget.php">Forgot Password ?</a></p>
              <p class="login__signup"><br><a href="Register.php">Don't have an Account ?</a></p>
   
	  </div>
    </div>
  </div>
</form>
<?php
    }
?>

</body>
</html>
