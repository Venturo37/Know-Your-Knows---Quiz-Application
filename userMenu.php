<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: SignUpLogIn.php');
    exit();
}

if (isset($_POST['subject_id'])) {
    $_SESSION['subject_id'] = $_POST['subject_id'];
    header("Location: subjectPage.php");
    exit();
}
include('connection.php');
$user_query = "SELECT * FROM tbluser WHERE user_id = '".$_SESSION['user_id']."'";
$user_result = mysqli_query($connection, $user_query);
$user = mysqli_fetch_assoc($user_result);
$fullname = $user['firstname'] . " " . $user['lastname'];

$query = "SELECT * FROM tblsubject";
$subjects = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Menu</title>
    <?php include('embedStyle.php'); ?>
</head>
<body>
<div class="overlay"></div>
    <?php include ('header.php'); ?>
    <div class="content userMenu">
        <div class="user-acc">
            <div class="ProfilePic">
                <img src="Picture/BMo.jpg" alt="Profile Picture">
                <div class="username">
                    <h2 id="welcomeUser">Welcome, <?php echo $fullname; ?>!</h2>
                </div>
            </div>
            <button id="settingsButton" class="settings" 
            onclick="openUpdatePersonalDetails('<?php echo $user['firstname']?>', '<?php echo $user['lastname']?>', 
                '<?php echo $user['password']?>', '<?php echo $user['email']?>')">  
            
                <span class="material-symbols-outlined">
                    settings
                </span>
            </button>
        </div>
        <div class="subjects">
            <?php
                while ($row = mysqli_fetch_assoc($subjects)){
                    $subject_id = htmlspecialchars($row['subject_id']);
                    $subject_name = htmlspecialchars($row['name']);
                    ?>
                    <form method='POST'>
                        <input type='hidden' name='subject_id' value='<?php echo $subject_id;?>'/>
                        
                        <button id="boxButton" type='submit'><?php echo $subject_name;?></button>
                    </form>
                    <?php
                }
            ?>
        </div>
    </div>
    <div class="setting_menu">    
        <?php include('settings.php'); ?>
    </div>
    <?php include('footer.php'); ?>
    <script src="assignmentScript.js"></script>
</body>
</html>