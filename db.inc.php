<?php

    $servername="localhost";
    $serverusername="root";
    $serverpassword="temitope";
    $dbname="imagejudi";
    $connection=mysqli_connect($servername, $serverusername, $serverpassword,  $dbname);
    
    if (!$connection) {
        die("Error in Connection".mysqli_connect_error());
    }


?>