<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="navbar">
        <h1>MrSoft Shop</h1>
        <ul>
            <li>About</li>
            <li>Products</li>
            <li>Contact</li>
        </ul>
        <div class="profile">
            <p>Username: <span><?php echo $_SESSION['username']; ?></span></p>
            <p>Email: <span><?php echo $_SESSION['email']; ?></span></p>
            <a href="logout.php">Logout</a>
        </div>
    </div>
   
</body>
</html>