<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: SignUpLogIn.php');
    exit();
}

// Get subject ID from the URL
if (!isset($_SESSION['subject_id'])) {
    header('Location: userMenu.php');
    exit();
}

if (isset($_POST['topic_id'])) {
    $_SESSION['topic_id'] = $_POST['topic_id'];
    header("Location: topicPage.php");
    exit();
}


include('connection.php');


$subject_id = $_SESSION['subject_id'];

$sub_query = "SELECT * FROM tblsubject WHERE subject_id = '$subject_id'";
$subject = mysqli_query($connection, $sub_query);
$subject_name = mysqli_fetch_assoc($subject)['name'];

$query = "SELECT * FROM tbltopic WHERE subject_id = '$subject_id'";
$topics = mysqli_query($connection, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $subject_name; ?></title>

    <?php include('embedStyle.php'); ?>

</head>
<body>
    <?php include('header.php'); ?>
    <div class="content subjectPage">
        
        <button class="back" onclick="window.location.href = 'userMenu.php';">
            <span class="material-symbols-outlined">
                arrow_back
            </span>
        </button>
        
        <div class="topic_title">
            <h1><?php echo $subject_name ?></h1>
            <h2>SELECT A TOPIC TO START QUIZ</h2>
        </div>
        <div class="topics">
            <?php if (mysqli_num_rows($topics) > 0) {
                while ($row = mysqli_fetch_assoc($topics)) {
                    $topic_id = htmlspecialchars($row['topic_id']);
                    $topic_name = htmlspecialchars($row['name']);
                    ?>
                    <form method='POST' action=''>
                        <input type='hidden' name='topic_id' value='<?php echo $topic_id;?>'/>
                        <input type='hidden' name='topic_name' value='<?php echo $topic_name;?>'/>
                        <button type='submit'><?php echo $topic_name;?></button>
                    </form>
                    <?php
                }
            } else {
                ?>
                <p>This subject has no topics yet.</p>
                <?php
            }?>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>
