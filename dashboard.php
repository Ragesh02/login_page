<?php include "header.php"; ?>
<?php include "db_connect.php"; ?>

<div class="container">

    <h2 class="mt-5 mb-3">Welcome To Dashboard</h2>

    <?php
    
        if(isset($_GET['message'])){
            echo "<div class='alert alert-warning alert-dismissible fade show'>";
                echo $_GET['message'];
            echo "</div>";
        }

        echo "<div>Email: " . $_SESSION['email'] . "</div>";
        // Check if the user is logged in
        if (!isset($_SESSION["email"])) {
        // Redirect to the login page or display an error message
        header("Location: login.php?message=Please login to access the dashboard!");
        exit();
        }
    ?>

    <h1>Hello Dear User, You are logged in the Dashboard</h1>
    <a href="logout.php" class="btn btn-success mt-3">Logout</a>
    
</div>

<?php include "footer.php"; ?>