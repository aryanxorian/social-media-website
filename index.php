<?php 
session_start();
include "sanitize.php";
include "connection.php";
if(isset($_POST['login']))

 {
   
     $error="";
     if(isset($_POST['email'])&& isset($_POST['psw']) && !empty($_POST['email']) && !empty($_POST['psw']))
        {
            $email=sanitize($_POST['email']);
            $psw=sanitize($_POST['psw']);
            $psw=md5($psw);
            
            
            $query="select * from users where email='$email' and password='$psw'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)==1)
                {
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['email']=$row['email'];
                    $_SESSION['name']=$row['name'];
                    header('Location:home.php');
                    
                    
                }
            else                {
                    $error="email/Password invalid";

                }

            


        }
        else{
            

        }
 }
 mysqli_close($conn);

?>
<?php 
if (!isset($_SESSION['email']))
{
 ?>
<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <style>
      body{
        background-color: #f0f2f5;
      }
      </style>
    <body>
      <div class="container sign-container" >
        <div class="row">
        
          <div class="col-md-6">
            <div class="container">
              <h1> Let's Meet </h1>
              <h4> Find friends near you</h4>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.82014503893!2d85.80554741429664!3d20.349047416010908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1908e025984c55%3A0xee1fcd1f11e55141!2sDLF%20CYBER%20CITY!5e0!3m2!1sen!2sin!4v1616144813307!5m2!1sen!2sin"
                  style="border:0;width:100%;height:250px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>

          
          <div class="col-md-6">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >

              <div class="container login">
                  <p class="alert-denger" ><?php echo $error; ?></p>
                  
                  
            

                  <label for="email"><b>Email</b></label>
                  <input type="text" placeholder="Enter Email" name="email" id="email" required>

                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                  
                  <p></p>

                  <button type="submit" class="loginbtn" name="login">Sign In</button>
                  <hr>
                  <a href="signup.php" > <button class="registerbtn"> Create New Account </button></a>
                  
              </div>
            
            
            </form>
          </div>
        </div>
      </div>
    </body>

</html>
<?php 
}
else{
  header('Location:home.php');
}
?>
