<?php include "header.php"; ?>
<?php include "db_connect.php"; ?>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // print_r($_POST);
        $name = $_POST['name'];
        $email = $_POST['email'];
        // $password = $_POST['password'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $contact = $_POST['contact'];

        $query = "INSERT INTO user (id, name, email, password, contact)
        VALUES (NULL, '$name', '$email', '$password', '$contact')";

        $result = mysqli_query($connect, $query);

        if ($result) {
            header("Location: login.php?message= Successfully Registered");
        }

    }

?>

<nav class="navbar justify-content-center mt-4 mb-3">
    <h2>Register Page</h2>
</nav>

<div class="container" style="width:500px">
    <form action="register.php" method = "POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="form-group">
            <label>Contact</label>
            <input type="number" name="contact" class="form-control" id="contact" required>
        </div>

        <button class="btn btn-success" type="submit" id="login">Register</button>
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="register.php" class="btn btn-warning">Cancel</a>
        
    </form>

</div>


<?php include "footer.php"; ?>