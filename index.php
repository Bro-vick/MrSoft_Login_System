<?php
    include 'config.php';

    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql1 = "SELECT * FROM users WHERE email = '$email' AND password = '$pass';";
        $select_users = mysqli_query($conn, $sql1) or die("Query Failed!");

        if(mysqli_num_rows($select_users) > 0 ){
            $row = mysqli_fetch_assoc($select_users);
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header('location:home.php');
        } else{
            $message[] = 'Incorrect Email or Password!';
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <h1>Welcome To Our Shop</h1>
    </div>
    <?php
        if(isset($message)){
            foreach($message as $message){
                echo '
                    <div class="message">
                        <p>'.$message.'</p>
                        <button onclick="this.parentElement.remove();">Close</button>
                    </div>
                ';
            };
        };
    ?>
    <div class="form-container">
        <h2>Login To Get Started</h2>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Enter Your Email" required class="box">
            <input type="password" name="password" placeholder="Enter Your Password" required class="box">
            <input type="submit" name="submit" Value="Login Now" class="btn">
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </div>
</body>
</html>