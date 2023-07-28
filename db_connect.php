<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "login_page";

    $connect = mysqli_connect($host, $user, $pass, $dbname);

    if (!$connect) {
        echo "DB is not connected";
    }
    else{
        // echo "DB is connected";
    }

?>