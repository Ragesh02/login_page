<?php

    //start the session
    session_start();

    //clear all the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: login.php?message=Please login to access the dashboard!");
    exit();
    
?>