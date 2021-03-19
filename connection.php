<?php
    $username="jarvis";
    $password="mindfire";
    $host="www.assignments.com";
    $dbname="demo";
    $conn=@mysqli_connect($host,$username,$password,$dbname) or die();
    if(!$conn)
        {
            
            echo "Failed to connect". mysqli_connect_error();
            exit();
        }
    

?>