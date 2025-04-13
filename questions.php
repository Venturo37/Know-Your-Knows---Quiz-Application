<?php
    // Start the session
    session_start();
    // Redirect if user is not logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: SignUpLogIn.php');
        exit();
    }
    // Redirect if topic_id is not set
    if (!isset($_SESSION['topic_id'])) {
        header('Location: subjectPage.php');
        exit();
    }
    
    // Include database connection
    include('connection.php');
    $topic_name = $_SESSION['topic_name'];
    $user_id = $_SESSION['user_id'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ensure session variables are set
        $user_query = "SELECT user_id FROM tbluser WHERE user_id = '$user_id'";
        $user_result = mysqli_query($connection, $user_query);
        $user_id = mysqli_fetch_assoc($user_result)['user_id'];
        $topic_id = $_SESSION['topic_id'];
        $_SESSION['score'] = $_POST['score']; 
        $_SESSION['totalQuestions'] = $_POST['totalQuestions'];
        $score = $_SESSION['score'];
        
        // Insert score into the database
        $insertAttempt = "INSERT INTO tblquizattempt (user_id, topic_id, score) 
                  VALUES ('$user_id', '$topic_id', '$score')";
        if (mysqli_query($connection, $insertAttempt)) {
            echo "success";
        } else {
            echo 'error'.mysqli_error($connection);
        }
        exit();
    }

    if (isset($_SESSION['score']) || isset($_SESSION['totalQuestions'])) {
        unset($_SESSION['score']);
        unset($_SESSION['totalQuestions']);
    }
    // Fetch quiz questions for the current topic
    $topic_id = $_SESSION['topic_id'];
    $questions = mysqli_query($connection, 
        "SELECT * FROM tblquestion WHERE topic_id = '$topic_id'"
    );
    // ANOTHER CONCEPT
    // $questions = array();
    // while ($row = mysqli_fetch_assoc($questions)) {
    //     $questions[] = $row;
    // }
    $questions = mysqli_fetch_all($questions, MYSQLI_ASSOC);
    // CONCEPT
    // question_id : 1
    // question : What is the capital of France?
    // a : answer a
    // b : answer b
    // c : answer c
    // d : answer d
    // correct_answer : correct_answer
    // topic_id : topic_id

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $topic_name; ?> - Questions</title>
            
    <?php include('embedStyle.php'); ?>
</head>
<body>
    <?php include('header.php'); ?>
    
    <div class="content questionPage">
        <!-- Back button -->
        <button class="back" onclick="window.location.href = 'topicPage.php';">
            <span class="material-symbols-outlined">
                arrow_back
            </span>
        </button>
        
        <!-- Quiz container -->
        <div id="quiz">
            <div id="question"></div>
            <!-- SAMPLE -->
            <!-- <div id="question">(question_index + 1) + '. ' + q.question</div> -->
            <div id="options"></div>
            <button id="next" class="next-btn" onclick="nextQuestion()">Next</button>
        </div>
    </div>
    
    <?php include('footer.php'); ?>

    <script>
        // Quiz logic
        let questions = <?php echo json_encode($questions); ?>; // Load questions from PHP
        let question_index = 0; // current question index
        let score = 0;   // User's score

        // Display the current question
        function showQuestion() {
            if (question_index >= questions.length) {
                saveScore(); // Save score when all questions are answered
                return;
            }

            let q = questions[question_index];
            document.getElementById('question').innerHTML = `
                <span id="question-text">${(question_index + 1) + '. ' + q.question}</span>
            `;

            // option = <div class="option" onclick="checkAnswer('${q[opt]}')">${q[opt]}</div><div class="option" onclick="checkAnswer('${q[opt]}')">${q[opt]}</div><div class="option" onclick="checkAnswer('${q[opt]}')">${q[opt]}</div><div class="option" onclick="checkAnswer('${q[opt]}')">${q[opt]}</div>
            let options = `
                <div class="options">
                    <div class="option" onclick="checkAnswer('${q.a}', this)">${q.a}</div>
                    <div class="option" onclick="checkAnswer('${q.b}', this)">${q.b}</div>
                    <div class="option" onclick="checkAnswer('${q.c}', this)">${q.c}</div>
                    <div class="option" onclick="checkAnswer('${q.d}', this)">${q.d}</div>
                </div>
            `;
            
            // '';
            // ['a', 'b', 'c', 'd'].forEach(opt => {
            //     options += `<div class="option" onclick="checkAnswer('${q[opt]}')">${q[opt]}</div>`;
            // });

            // class="option"  =>      class="option correct" 
            // class="option"  =>      class="option wrong" 

            document.getElementById('options').innerHTML = options;
        }

        // Check the selected answer
        function checkAnswer(selectedAnswer) {
            let correctAnswer = questions[question_index].correct_answer.trim(); // Correct answer
            let options = document.getElementsByClassName('option');
            
            for (let opt of options) {
                opt.style.pointerEvents = 'none';
                // Mark the correct answer
                if (opt.innerHTML.trim() == correctAnswer) {
                    opt.classList.add('correct');
                }
            }

                // Mark the selected answer
            if (selectedAnswer.trim() !== correctAnswer) {
                for (let opt of options) {
                    if (opt.innerHTML.trim() == selectedAnswer.trim()) {
                        opt.classList.add('wrong');
                    }
                }
            } else {
                score++
            }
            
            
            document.getElementById('next').style.display = 'block';
        }

        // Move to the next question
        function nextQuestion() {
            question_index++;
            document.getElementById('next').style.display = 'none'; // Hide "Next" button
            showQuestion(); // Display the next question
        }

        // Save the score using an asynchronous fetch request
        function saveScore() {
            let totalQuestions = questions.length;
            let xhttp = new XMLHttpRequest();

            xhttp.open("POST", "questions.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("score="+score+"&totalQuestions="+totalQuestions);

            // SAMPLE
            // "score=3&totalQuestions=5"
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText.trim() === "success") {
                        window.location.href = "questionResults.php"
                    } else {
                        alert(this.responseText);
                    }
                }
            };
        }

        // Start the quiz
        showQuestion();
    </script>
</body>
</html>