<?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

        $sql1 = "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'";
        $select_users = mysqli_query($conn, $sql1);
        
        if (mysqli_num_rows($select_users) > 0){
            $message[] = 'User Already Exists!';
        }else{
            if($pass != $cpass){
                $message[] = 'Confirm password Does not match';
            }else{
                $sql2 = "INSERT INTO `users` (name, email, password) VALUES ('$name', '$email', '$cpass')";
                mysqli_query($conn, $sql2);
                header('location:index.php');
            };
        };
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
        <h2>Register Now</h2>
        <form action="" method="post">
            <input type="name" name="name" placeholder="Enter Your name" required class="box">
            <input type="email" name="email" placeholder="Enter Your Email" required class="box">
            <input type="password" name="password" placeholder="Enter Your Password" required class="box">
            <input type="password" name="cpassword" placeholder="Confirm Your Password" required class="box">
            <input type="submit" name="submit" Value="Register Now" class="btn">
            <p>Already have an account? <a href="index.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>