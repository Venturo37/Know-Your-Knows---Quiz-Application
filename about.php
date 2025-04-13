<?php
    session_start();
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
        header('Location: SignUpLogIn.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <?php include('embedStyle.php'); ?>
</head>
<body>
    <?php
        include('header.php');
    ?>
    <div class="content about">
        <div class="title">
            <h1>About Us</h1>
        </div>
        <div class="members">
            <div class="Leader">
                <h2>CHUNG YHUNG YIE</h2>
                <p>(TP076855)</p>
            </div>
            <div class="Member">
                <h2>CHAN RUI JIE</h2>
                <p>(TP076190)</p>
            </div>
            <div class="Member">
                <h2>DERICK LIEW WEN XI</h2>
                <p>(TP076603)</p>
            </div>
            <div class="Member">
                <h2>IVAN SHAK LOONG WYE</h2>
                <p>(TP076378)</p>
            </div>
        </div>
    </div>
    <?php 
        include('footer.php');
    ?>
</body>
</html>