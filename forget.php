<?php
session_start();
include_once 'db.php';
if(isset($_POST['submit']))
{
    $user_id = $_POST['user_id'];
    $result = mysqli_query($con,"SELECT * FROM admin where username='" . $_POST['user_id'] . "'");
    if (mysqli_num_rows ($result)==1) 
   {

        $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['username'];
	$email_id=$row['email'];
	$password=$row['password'];
	if($user_id==$fetch_user_id) {
				$to = $email_id; 
                $subject = "Password";
                $txt = "Password sent on your registered Email.    (Your password is : $password) ";
  	
	   
	   echo " <div class='cont'>
                	  <h3 style=' color:#00ff00; margin: 50px auto; width: 600px; padding: 1px 5px; font-size: 30px; text-align: center;  '>  $txt </h3><br/>
                 	 <p style='  margin: 20px auto; width: 500px; padding: 1px 5px; color: #666; font-size: 25px; text-align: center; margin-bottom: 10px; '>Click here to <a href='login.php' style='color:white'>Login</a> again.</p> 
                     </div>  ";  
              }
			else{
					echo 'invalid userid';
				}
   }
  else{      ?>
	    <div class="cont">
			 <h3 style=' color:#990033; margin: 50px auto; width: 500px; padding: 1px 5px; font-size: 30px; text-align: center;  ' >Invalid Username</h3><br/>
              			   <p style='  margin: 20px auto; width: 500px; padding: 1px 5px; color: #666; font-size: 25px; text-align: center; margin-bottom: 10px; '>Click <a href='forget.php' style="color:white">here</a> to go back.</p>
                    </div>
  
<?php  
}}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forget Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"><link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'><link rel="stylesheet" href="style.css">
  <style>
img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]
     {
        display: none;  
    }
 </style>
</head>
<body>

<form action="" method="post" class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check"></div>
      <div class="login__form">
      
      <br><br><br><br>  <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input" name="user_id" placeholder="Username" required />
        </div>


       <br><br><br> <input type="submit" value="Submit" class="login_submit"  name="submit"  >

              <br><br><br> <p class="login__signup"><br><a href="login.php">Back to Login page</a></p>
       </div>
    </div>
  </div>
</form>

</body>
</html>
