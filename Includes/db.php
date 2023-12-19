<?php 

        $con = mysqli_connect("localhost","root","12345678","Jardin_De_Zamboanga_db");
      
        if (mysqli_connect_errno()) {
                echo "Failed to connect to MySql " . mysqli_connect_error();
        }
?>