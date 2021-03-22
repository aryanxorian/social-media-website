<?php 
session_start();
include "sanitize.php";
include "connection.php";
$error="";

if(isset($_POST['signup']))
    {
        if(isset($_POST['firstname'])&& isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) &&
        isset($_POST['dob']) && isset($_POST['gender']))
        {
            if(!empty($_POST['firstname']) && !empty($_POST['lastname']) &&  !empty($_POST['email'])
            && !empty($_POST['password']) && !empty($_POST['dob']) && !empty($_POST['gender']))
                {
                    //$dob=date('Y/m/d',strtotime($_POST['dob']));
                    $firstname=sanitize($_POST['firstname']);
                    $lastname=sanitize($_POST['lastname']);
                    $email=sanitize($_POST['email']);
                    $dob=$_POST['dob'];
                    $password=MD5(sanitize($_POST['password']));
                    $gender=sanitize($_POST['gender']);
                    $query="insert into users(firstname,lastname,email,password,dob,gender) values('$firstname','$lastname','$email','$password','$dob','$gender')";
                    
                    $result=mysqli_query($conn,$query);
                    if($result)
                        {
                            header('Location:index.php');
                            
                        }
                    else
                        {
                            $error="email already exists/please use a different email id";
                        }
                }

            else
            {
                $error="You can't leave any field empty";
            }
        }
        else
        {
            $error="There is data inconsistency please sign up again.";
        }
    }
?>
<?php 
if (!isset($_SESSION['email']) &&  !isset($_SESSION['firstname']))
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
      <div class="container sign-container " >
        <div class="row row justify-content-md-center">
        
          

          
          <div class="signup-container">
            <h4 class="error"> <?php echo $error ; ?></h4>
            <h1> Create An account </h1>
             <h4> It's quick and Easy</h4>


            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >

            
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"placeholder="First Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder=" Last Name" require>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>

                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                    
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="m">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="gender" id="inlineRadio2" value="f">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  name="gender"id="inlineRadio3" value="t" >
                    <label class="form-check-label" for="inlineRadio3">Transgender</label>
                </div>

                <br>
                <div class="form-group" >
                    <input  type="submit" name="signup" value ="Sign Up"class="btn btn-primary" style="margin-top:14px;">
                </div>
                 
            
            
          </div>
        </div>
      </div>
    </body>

</html>
<?php
}
else{
    header("Location:home.php");
}
?>
