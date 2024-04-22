<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php
   // Display  message if set
    
    if (isset($_SESSION['success'])) {
        echo '<p style="color:green;">' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']); 
    }
 
    if (isset($_SESSION['error'])) {
        echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']); 
    }
    ?>

    <form action="index.php?action=login" method="post">
        Username: <input type="text" name="username">
        <br> 
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
