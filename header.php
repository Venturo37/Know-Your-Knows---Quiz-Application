<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['userType'])) {
        $redirectPage = ($_SESSION['userType'] === 'admin') ? 'adminMenu.php' : 'userMenu.php';
    } else {
        $redirectPage = 'SignUpLogIn.php';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <?php include('embedStyle.php'); ?>

</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="<?php echo $redirectPage; ?>">
                <h1>Know Your Knows</h1>
            </a>
        </div>
        <div class="about_Us">
            <a href="about.php">
                <h1>About Us</h1>
            </a>
        </div>
        <div class="logOut">
            <a href="SignUpLogIn.php">
                <h1>Log Out</h1>
            </a>    
        </div>
    </div>
</body>
</html>