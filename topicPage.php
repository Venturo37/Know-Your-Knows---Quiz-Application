<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: SignUpLogIn.php');
    exit();
}

include('connection.php');

if (isset($_POST['topic_id'])) {
    $_SESSION['topic_id'] = $_POST['topic_id'];
}

$topic_id = $_SESSION['topic_id'];

$query = "SELECT name, topic_description FROM tbltopic WHERE topic_id = '$topic_id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$topic_name = $row['name'];
$topic_description = $row['topic_description'];
$_SESSION['topic_name'] = $topic_name;

$user_id = $_SESSION['user_id'];
$user_query = "SELECT * FROM tbluser WHERE user_id = '$user_id'";
$user_result = mysqli_query($connection, $user_query);
$user_id = mysqli_fetch_assoc($user_result)['user_id'];

$questionQuery = "SELECT * FROM tblquestion WHERE topic_id = '$topic_id'";
$questionResult = mysqli_query($connection, $questionQuery);
$questionQuantity = mysqli_num_rows($questionResult);

if ($questionQuantity > 0) {
    $attemptQuery = "SELECT MAX(score) as max_score FROM tblquizattempt WHERE user_id = '$user_id' AND topic_id = '$topic_id'";
    $attemptQuiz_Result = mysqli_query($connection, $attemptQuery);
    $userMaxScore = mysqli_fetch_assoc($attemptQuiz_Result);
    
    $max_score = ((isset($userMaxScore['max_score']) ? $userMaxScore['max_score'] : 0) / $questionQuantity) * 100;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $topic_name; ?></title>

    <?php include('embedStyle.php'); ?>

</head>
<body>
    <?php include('header.php'); ?>

    <div class="content topicPage">
        <div class="topic_title_section">
            <button class="back" onclick="window.location.href = 'subjectPage.php';">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>
            <h1><?php echo $topic_name;?></h1>
        </div>
        <div class="topic-description">
            <p><?php echo $topic_description ?></p>
        </div>
        <div class="bodyBottom">
            <?php
            if ($questionQuantity > 0) {
                ?>
                <div class="quiz_score">
                    Your High Score: 
                    <span class="score">
                        <?php echo number_format($max_score, 1); ?>%
                    </span>
                </div>
                <div class="start_quiz_btn">
                    <button class="submitButton" type="button" onclick="window.location.href = 'questions.php';">
                        START QUIZ
                    </button>
                </div>
                <?php
            } else {
                ?> 
                <p>This topic has no questions</p>
                <?php
            }
            ?>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
   
</body>
</html>