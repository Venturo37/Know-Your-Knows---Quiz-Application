<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: SignUpLogIn.php');
        exit();
    }
    if (!isset($_SESSION['score'])) {
        header('Location: questions.php');
        exit();
    }

    include('connection.php');
    $topic_name = $_SESSION['topic_name'];
    $total_questions = $_SESSION['totalQuestions'];
    $user_score = $_SESSION['score'];
    
    $subject_id = $_SESSION['subject_id'];
    $topic_id = $_SESSION['topic_id'];

    $topic_query = "SELECT * FROM tbltopic WHERE subject_id = '$subject_id' AND topic_id != '$topic_id' LIMIT 3";
    $topic_results = mysqli_query($connection, $topic_query);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $topic_name ?> - Results</title>
    <?php include('embedStyle.php'); ?>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="content questionResultPage">
        <div class="results_title_container">
            <button class="back" onclick="window.location.href = 'topicPage.php';">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>

            <div class="topic-results-title">
                <h1><?php echo $topic_name?> Results</h1>
            </div>
        </div>
        <div class="topic-score">
            <h2>Your Score: </h2>
            <h2><?php echo $user_score?>/<?php echo $total_questions?></h2>
        </div>
        <div class="more-topics">
            <h2>Try other Topics:</h2>
            <div class="topics">
                <?php 
                while ($row = mysqli_fetch_assoc($topic_results)) {
                    $topic_id = htmlspecialchars($row['topic_id']);
                    $topic_name = htmlspecialchars($row['name']);
                    ?>
                    <form method='POST' action="topicPage.php">
                        <input type='hidden' name='topic_id' value='<?php echo $topic_id;?>'/>
                        <input type='hidden' name='topic_name' value='<?php echo $topic_name;?>'/>
                        <button type='submit'><?php echo $topic_name;?></button>
                    </form>
                    <?php
                }?>
            </div>
        </div>
        <div class="user-action">
            <button type="button" onclick="window.location.href = 'questions.php';">
                Retry
            </button>
            <button type="button" onclick="window.location.href = 'userMenu.php';">
                Return to Home
            </button>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>