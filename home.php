<?php 
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['name'])){
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
    <body>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Let's Meet</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feeds</a>
                </li>
                
                
                </ul>
                
                <span class="navbar-text">
                <?php if(isset($_SESSION['email'])) { ?>
                
                    <a class="nav-link" href="logout.php">Log Out</a>
                <?php }
                    
                    ?>         
            </div>
        </nav>

    </div>
    <div class="container">
    <?php
        
                    echo "Hello ". "<span>". $_SESSION['name'] ."</span>";
         }

        else

            {
            echo "You Dont't have the permission to view this page bro";

            }
    ?>
</div>
    </body>
  
</html>