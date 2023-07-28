<?php include "header.php"; ?>
<?php include "db_connect.php"; ?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // print_r($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT password FROM user WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            $_SESSION["email"] = $email;

            header("Location: dashboard.php?message= Successfully Logged In");

            exit;
        }
        else{
            echo "Incorrect Log In";
        }

        mysqli_close($connect);
    }

?>

<nav class="navbar justify-content-center mt-4 mb-3">
    <h2>Login Page</h2>
</nav>


<div class="container" style="width:500px">

    <?php
        if(isset($_GET['message'])){
            echo "<div class='alert alert-warning alert-dismissible fade show'>";
                echo $_GET['message'];
            echo "</div>";
        }

        if(!isset($_SESSION)){
            echo "<div>Email: " . $_SESSION['email'] . "</div>";
        } 

    ?>
    <form action="login.php" method = "POST">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="password" required>

        <br>

        <button class="btn btn-success" type="submit" id="login">Login</button>
        <a href="register.php" class="btn btn-warning">Cancel</a>
        <a href="register.php" class="btn btn-primary">Click to Register</a>

        
    </form>

</div>


<?php include "footer.php"; ?>