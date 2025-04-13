<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header('Location: SignUpLogIn.php');
        exit();
    }
    include('connection.php');  

    $admin_query = "SELECT * FROM tbladmin WHERE admin_id = '".$_SESSION['admin_id']."'";
    $admin_result = mysqli_query($connection, $admin_query);
    $admin = mysqli_fetch_assoc($admin_result);
    $fullname = $admin['firstname'] . " " . $admin['lastname'];


    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'get_subjects'){
            $subject_query = "SELECT * FROM tblsubject";
            $subject_query_result = mysqli_query($connection, $subject_query);
            
            echo json_encode(mysqli_fetch_all($subject_query_result, MYSQLI_ASSOC));
            exit();
        }
        if ($action == 'get_topics' && isset($_POST['subject_id'])){
            $subject_id = $_POST['subject_id'];
            $topic_query = "SELECT * FROM tbltopic WHERE subject_id = '$subject_id'";
            $topics = mysqli_query($connection, $topic_query);
            
            
            echo json_encode(mysqli_fetch_all($topics, MYSQLI_ASSOC));
            exit();
        }
        if ($action == 'get_questions' && isset($_POST['topic_id'])){
            $topic_id = $_POST['topic_id'];
            $question_query = "SELECT * FROM tblquestion WHERE topic_id = '$topic_id'";
            $questions = mysqli_query($connection, $question_query);
            
            echo json_encode(mysqli_fetch_all($questions, MYSQLI_ASSOC));
            exit();
        }
        // MANAGE SUBJECTS
        if ($action == 'add_subject' && isset($_POST['subject_name'])) {
            $subject_name = mysqli_real_escape_string($connection, $_POST['subject_name']);

            $check_query = "SELECT * FROM tblsubject WHERE name = '$subject_name'";
            $check_result = mysqli_query($connection, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo 'subject_exists';
            } else {
                $insert_subject_query = "INSERT INTO tblsubject (name) VALUES ('$subject_name')";
                mysqli_query($connection, $insert_subject_query);
                echo 'add_subject_success';
            }
            exit();
        }
        if ($action == 'delete_subject' && isset($_POST['subject_id'])) {
            $subject_id = $_POST['subject_id'];
            $delete_subject_query = "DELETE FROM tblsubject WHERE subject_id = '$subject_id'";
            
            if (mysqli_query($connection, $delete_subject_query)){
                echo "delete_subject_success";
            } else {
                echo "Error: ". mysqli_error($connection);
            }
            
            exit();
        }
        // MANAGE TOPICS
        if ($action == 'add_topic' && isset($_POST['topic_name']) && isset($_POST['topic_desc']) && isset($_POST['subject_id'])){
            $topic_name = mysqli_real_escape_string($connection, $_POST['topic_name']);
            $topic_desc = mysqli_real_escape_string($connection, $_POST['topic_desc']);
            $subject_id = $_POST['subject_id'];

            $check_query = "SELECT * FROM tbltopic WHERE name = '$topic_name' AND subject_id = '$subject_id'";
            $check_result = mysqli_query($connection, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo "topic_exists";
            } else {
                $insert_topic_query = "INSERT INTO tbltopic (name, topic_description, subject_id)
                                        VALUES ('$topic_name', '$topic_desc', '$subject_id')";
                mysqli_query($connection, $insert_topic_query);
                echo "add_topic_success";
            }
            exit();
        }
        if ($action == 'delete_topic' && isset($_POST['topic_id'])){
            $topic_id = $_POST['topic_id'];

            $delete_question_query = "DELETE FROM tblquestion WHERE topic_id = '$topic_id'";
            mysqli_query($connection, $delete_question_query);
            $delete_topic_query = "DELETE FROM tbltopic WHERE topic_id = '$topic_id'";
            mysqli_query($connection, $delete_topic_query);
            echo "delete_topic_success";
            exit();
        }

// ADD QUESTION
        if ($action == 'add_question') {
            $question = mysqli_real_escape_string($connection, $_POST['question']);
            $a = mysqli_real_escape_string($connection, $_POST['a']);
            $b = mysqli_real_escape_string($connection, $_POST['b']);
            $c = mysqli_real_escape_string($connection, $_POST['c']);
            $d = mysqli_real_escape_string($connection, $_POST['d']);
            $correct_answer = mysqli_real_escape_string($connection, $_POST['correct_answer']);
            $topic_id = $_POST['topic_id'];

            $check_query = "SELECT * FROM tblquestion WHERE question = '$question' AND topic_id = '$topic_id'";
            $check_result = mysqli_query($connection, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo "question_exists";
            } else {
                $insert_question_query = "INSERT INTO tblquestion (question, a, b, c, d, correct_answer, topic_id)
                                        VALUES ('$question', '$a', '$b', '$c', '$d', '$correct_answer' , '$topic_id')";
                mysqli_query($connection, $insert_question_query);
                echo "add_question_success";
            }
            exit();
        }
// UPDATE QUESTION
        if ($action == 'update_question' && isset($_POST['question_id'])){
            $question_id = $_POST['question_id'];
            // It access to the database ensure escaping is handled properly and sends the question data to the database such as What is 2 + 2?
            // PHP to SQL
            $question = mysqli_real_escape_string($connection, $_POST['question']);
            $a = mysqli_real_escape_string($connection, $_POST['a']);
            $b = mysqli_real_escape_string($connection, $_POST['b']);
            $c = mysqli_real_escape_string($connection, $_POST['c']);
            $d = mysqli_real_escape_string($connection, $_POST['d']);
            $correct_answer = mysqli_real_escape_string($connection, $_POST['correct_answer']);

            $check_query = "SELECT * FROM tblquestion WHERE question = '$question' AND question_id != '$question_id'";
            $check_result = mysqli_query($connection, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo "question_exists";
            } else {
                $update_question_query = "UPDATE tblquestion 
                                        SET question = '$question', 
                                        a = '$a',
                                        b = '$b',
                                        c = '$c',
                                        d = '$d',
                                        correct_answer = '$correct_answer'
                                        WHERE question_id = '$question_id'";
                mysqli_query($connection, $update_question_query);
                echo "edit_question_successful";
            }
            exit();
        }
        if ($action == 'delete_question' && isset($_POST['question_id'])){
            $question_id = $_POST['question_id'];
            $question_delete_query = "DELETE FROM tblquestion WHERE question_id = '$question_id'";
            mysqli_query($connection, $question_delete_query);

            echo "delete_question_successful";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <?php include('embedStyle.php'); ?>


</head>
<body>
    <div class="overlay"></div>
    <?php include ('header.php'); ?>
    
    <div class="content adminMenu">
        <div class="user-acc">
            <div class="ProfilePic">
                <img src="Picture/BMo.jpg" alt="Profile Picture">
                <div class="username">
                    <h2 id="welcomeUser">Welcome, <?php echo $fullname; ?>!</h2>
                </div>
            </div>

            <button id="settingsButton" class="settings"
            onclick="openUpdatePersonalDetails('<?php echo $admin['firstname']?>', '<?php echo $admin['lastname']?>', '<?php echo $admin['password']?>', '<?php echo $admin['email']?>')"> 
                <span class="material-symbols-outlined">
                    settings
                </span>
            </button>
        
        </div>

        <div class="button-manageAcc">
            <button class="manageAcc" onclick="window.location.href = 'adminManageAcc.php';">
                Manage User Accounts
            </button>
        </div>

        <div class="manage_questions_title">
            <h2>Manage Questions</h2>
            <div class="manageButton">
                <button onclick="openPopUp('addSubjectPopUp')">Add Subject</button>
                <button onclick="openPopUp('deleteSubjectPopUp')">Delete Subject</button>
                <button onclick="openPopUp('addTopicPopUp')">Add Topic</button>
                <button onclick="openPopUp('deleteTopicPopUp')">Delete Topic</button>
            </div>
        </div>

        <div class="modify_questions_container">
            <div class="modify_questions_title">
                <label>Subject:
                    <select id="subjectSelect" onchange="loadTopics(this.value)">
                        <!-- <option value="${subjects[i].subject_id}">${subjects[i].name}</option> -->
                    </select>
                </label>
                <label>Topic: 
                    <select id="topicSelect" onchange="loadQuestions(this.value)">
                        
                    </select>
                </label>
                
                <button onclick="openPopUp('addQuestionPopUp')">ADD Question</button>
            </div>
            <div id="questionsTable"></div>
        </div>

    </div>
        <!-- POP UPS -->

    <!-- SUBJECT MANAGEMENT -->
        <div id="addSubjectPopUp" class="popup">
            <div class="popup_form">
                <h2>Add New Subject</h2>
                <label>New Subject Name:
                    <input type="text" id="newSubjectName" placeholder="Enter NEW subject name" required>
                </label>
                <div class="button_group">
                    <button class="close_popup_form"  onclick="closePopUp('addSubjectPopUp')">Cancel</button>
                    <button class="submit_popup_form" onclick="addSubject()">Add New Subject</button>
                </div>
            </div>
        </div>
        <div id="deleteSubjectPopUp" class="popup">
            <div class="popup_form">
                <h2>Remove Subject</h2>
                <select id="deleteSubjectSelect">
                    <!-- <option value="${subjects[i].subject_id}">${subjects[i].name}</option> -->
                </select>
                <div class="button_group">
                    <button class="close_popup_form"  onclick="closePopUp('deleteSubjectPopUp')">Cancel</button>
                    <button class="submit_popup_form" onclick="deleteSubject()">Delete Subject</button>
                </div>
            </div>
        </div>

    <!-- TOPIC MANAGEMENT -->
        <div id="addTopicPopUp" class="popup">
            <div class="popup_form">
                <h2>Add New Topic</h2>
                <label>Subject:
                    <select id="subjectforTopic">
                        <!-- <option value="${subjects[i].subject_id}">${subjects[i].name}</option> -->
                    </select>
                </label>
                <input type="text" id="newTopicName" placeholder="Enter NEW topic name" required>
                <textarea id="newTopicDescription" placeholder="What is topic about" required></textarea>
                <div class="button_group">
                    <button class="close_popup_form"  onclick="closePopUp('addTopicPopUp')">Cancel</button>
                    <button class="submit_popup_form" onclick="addTopic()">Add New Topic</button>
                </div>
            </div>
        </div>

        <div id="deleteTopicPopUp" class="popup">
            <div class="popup_form">
                <h2>Remove Topic</h2>
                <label>Subject:
                    <select id="subjectforDeleteTopic" onchange="loadTopics(this.value, false)">
                        <!-- <option value="${subjects[i].subject_id}">${subjects[i].name}</option> -->
                    </select>
                </label>
                <label>Topic:
                    <select id="selectTopicforDelete">
                        <!-- <option value="${topics[i].topic_id}">${topics[i].name}</option> -->
                    </select>
                </label>
            </div>  
            <div class="button_group">
                <button class="close_popup_form"  onclick="closePopUp('deleteTopicPopUp')">Cancel</button>
                <button class="submit_popup_form" onclick="deleteTopic()">Delete Topic</button>
            </div>
        </div>

        <!-- ADD QUESTIONS -->
        <div id="addQuestionPopUp" class="popup">
            <div class="popup_form">
                <h2>Add Question for Topic:
                    <span id="PopUpTopicName"></span>
                </h2>
                        
                <textarea id="newQuestion" placeholder="Enter NEW question" required></textarea>
                <input type="text" id="newOption_A" placeholder="Enter Option A" required>
                <input type="text" id="newOption_B" placeholder="Enter Option B" required>
                <input type="text" id="newOption_C" placeholder="Enter Option C" required>
                <input type="text" id="newOption_D" placeholder="Enter Option D" required>
                <label>Correct Answer: 
                    <select id="newCorrect_Answer">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </label>
                <div class="button_group">
                    <button class="close_popup_form"  onclick="closePopUp('addQuestionPopUp')">Cancel</button>
                    <button class="submit_popup_form" onclick="addQuestion()">Add Question</button>
                </div>
            </div>
        </div>

    <!-- EDIT QUESTION -->
        <div id="editPopUp" class="popup"> 
            <div class="popup_form">
                <h2>Edit Question</h2>
                <form onsubmit="updateQuestion();">
                    <input type="hidden" name="question_id" id="editQuestionId">

                    <label>New Question: 
                        <textarea name="question" id="editQuestion" required></textarea>
                    </label>

                    <label>A: 
                        <input type="text" name="a" id="editA" required>
                    </label>
                    <label>B: 
                        <input type="text" name="b" id="editB" required>
                    </label>
                    <label>C: 
                        <input type="text" name="c" id="editC" required>
                    </label>
                    <label>D: 
                        <input type="text" name="d" id="editD" required>
                    </label>

                    <label>Correct Answer:
                        <select name="correct_answer" id="editCorrect_Answer">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                        </select>
                    </label>

                    <div class="button_group">
                        <button class="close_popup_form"  type="button" onclick="closePopUp('editPopUp')">Cancel</button>
                        <button class="submit_popup_form" type="button" onclick="updateQuestion()">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include('footer.php'); ?>

    <!-- SETTINGS -->
    <div class="setting_menu">    
        <?php
            include('settings.php');
        ?>
    </div>


    
    <script src="assignmentScript.js"></script>
    <script>
        
        function openEdit(question_id, question, a, b, c, d, correct_answer) {
            openPopUp('editPopUp');
                        
            document.getElementById('editQuestionId').value = question_id;
            document.getElementById('editQuestion').value = question;
            document.getElementById('editA').value = a;
            document.getElementById('editB').value = b;
            document.getElementById('editC').value = c;
            document.getElementById('editD').value = d;
            
            let correct_answerSelect = document.getElementById('editCorrect_Answer');

            correct_answerSelect.innerHTML = ``;

            correct_answerSelect.innerHTML = `
                <option value="${a}" ${correct_answer === a ? 'selected' : '' }>A</option>
                <option value="${b}" ${correct_answer === b ? 'selected' : '' }>B</option>
                <option value="${c}" ${correct_answer === c ? 'selected' : '' }>C</option>
                <option value="${d}" ${correct_answer === d ? 'selected' : '' }>D</option>
            `;

        }


        window.onload = function () {
            loadSubjects();
            let subject_id = document.getElementById('subjectSelect').value;

            loadTopics(subject_id);
        }

        // LOADING QUESTIONS ON MENU
        function loadSubjects() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("action=get_subjects");

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let subjects = JSON.parse(xhttp.responseText);
                    let subjectSelect = document.getElementById('subjectSelect');
                    let deleteSubjectSelect = document.getElementById('deleteSubjectSelect');
                    let subjectforTopic = document.getElementById('subjectforTopic');
                    let subjectforDeleteTopic = document.getElementById('subjectforDeleteTopic');
                    let optionsHTML = '';

                    for (let i = 0; i < subjects.length; i++) {
                        optionsHTML += `<option value="${subjects[i].subject_id}">${subjects[i].name}</option>`;
                    }
                    subjectSelect.innerHTML = optionsHTML;
                    deleteSubjectSelect.innerHTML = optionsHTML;
                    subjectforTopic.innerHTML = optionsHTML;
                    subjectforDeleteTopic.innerHTML = optionsHTML;

                    if (subjects.length > 0) {
                        loadTopics(subjects[0].subject_id);
                    } else {
                        subjectSelect.innerHTML = `<option>No Subjects</option>`;
                    }

                }
            };
        }
        function loadTopics(subject_id, showQuestions=true) {
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("action=get_topics&subject_id="+subject_id);

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    let topics = JSON.parse(xhttp.responseText);
                    let topicSelect = document.getElementById('topicSelect');
                    let selectTopicforDelete = document.getElementById('selectTopicforDelete');
                    let optionsHTML = '';

                    for (let i = 0; i < topics.length; i++) {
                        optionsHTML += `<option value="${topics[i].topic_id}">${topics[i].name}</option>`;
                    }
                    
                    if (showQuestions) {
                        topicSelect.innerHTML = optionsHTML;
                        if (topics.length > 0) {
                            loadQuestions(topics[0].topic_id);
                        } else {
                            topicSelect.innerHTML = `<option>No topics available</option>`;
                            document.getElementById('questionsTable').innerHTML = `<p>No questions available</p>`;
                        }
                    } else {
                        selectTopicforDelete.innerHTML = optionsHTML;
                        if (topics.length === 0) {
                            selectTopicforDelete.innerHTML = `<option>No topics available</option>`;
                        }
                    }
                }
            }
        }
        function loadQuestions(topic_id) {
            let xhttp = new XMLHttpRequest();
            
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("action=get_questions&topic_id="+topic_id);
            
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                
                    let questions = JSON.parse(xhttp.responseText);
                    let table = ``;
                    if (questions.length > 0) {
                        table = `
                            <table border=1>
                                <tr>
                                    <th>Questions</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>Correct Answer</th>
                                    <th>Actions</th>
                                </tr>`;

                        for (let i = 0; i < questions.length; i++) {
                            let question_id = questions[i].question_id;
                            let question = questions[i].question;
                            let a = questions[i].a;
                            let b = questions[i].b;
                            let c = questions[i].c;
                            let d = questions[i].d;
                            let correct_answer = questions[i].correct_answer;
                            table += `
                                <tr>
                                    <td>${question}</td>
                                    <td>${a}</td>
                                    <td>${b}</td>
                                    <td>${c}</td>
                                    <td>${d}</td>
                                    <td>${correct_answer}</td>
                                    <td>
                                        <button onclick="
                                            openEdit('${question_id}', '${question}', '${a}', '${b}', '${c}', '${d}', '${correct_answer}')">
                                            Edit
                                        </button>
                                        <button onclick="deleteQuestion('${question_id}');">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            `;
                        }
                        table += `</table>`;
                    } else {
                        table = `<p>No questions are available for this topic.</p>`
                    }

                    document.getElementById('questionsTable').innerHTML = table;
                }
            };
        }

// MANAGE Subject
        function addSubject() {
            let name = document.getElementById('newSubjectName').value;

            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("action=add_subject&subject_name=" + encodeURIComponent(name));

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    if (xhttp.responseText.trim() === "add_subject_success") {
                        alert("Subject Added Successfully!");
                        closePopUp('addSubjectPopUp');
                        loadSubjects();
                    } else {
                        alert("Subject name exists");
                    }
                }
            }
        }
        function deleteSubject() {
            let subject_id = document.getElementById('deleteSubjectSelect').value;
            if (confirm('Are you sure you want to delete this subject?')) {
                let xhttp = new XMLHttpRequest();

                xhttp.open("POST", "adminMenu.php", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("action=delete_subject&subject_id="+subject_id);

                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        alert("Subject Deleted Successfully!");
                        closePopUp('deleteSubjectPopUp');
                        loadSubjects();
                    }
                };
            }
        }

// MANAGE TOPICS
        function addTopic() {
            let subject_id = document.getElementById('subjectforTopic').value;
            let new_topic_name = document.getElementById('newTopicName').value.trim();
            let new_topic_desc = document.getElementById('newTopicDescription').value.trim();

            if (new_topic_name == "" || new_topic_desc == "") {
                alert("Please fill in all fields");
                return;
            }

            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("action=add_topic&subject_id="+subject_id+"&topic_name="+encodeURIComponent(new_topic_name)+"&topic_desc="+encodeURIComponent(new_topic_desc));

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    if (xhttp.responseText.trim() === "add_topic_success") {
                        alert("Topic Added Successfully!");
                        closePopUp('addTopicPopUp');
                        document.getElementById('newTopicName').value = "";
                        document.getElementById('newTopicDescription').value = "";
                        loadSubjects();
                    } else {
                        alert("Topic name exists in subject");
                    }                   
                }
            }
        }
        function deleteTopic() {
            let topic_id = document.getElementById('selectTopicforDelete').value;
            if (confirm('Are you sure you want to delete this topic?')) {
                let xhttp = new XMLHttpRequest();

                xhttp.open("POST", "adminMenu.php", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("action=delete_topic&topic_id="+topic_id);

                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        if (xhttp.responseText.trim() === "delete_topic_success") {
                            alert("Topic Deleted Successfully!");
                            closePopUp('deleteTopicPopUp');
                            loadSubjects();
                        } else {
                            alert("Topic not provided");
                        }
                        
                    }
                };
            }
        }
// MANAGE QUESTIONS
        function addQuestion() {
            let new_question = document.getElementById('newQuestion').value;
            let new_a = document.getElementById('newOption_A').value;
            let new_b = document.getElementById('newOption_B').value;
            let new_c = document.getElementById('newOption_C').value;
            let new_d = document.getElementById('newOption_D').value;
            let new_correct_answer = document.getElementById('newCorrect_Answer').value;
            let topic_id = document.getElementById('topicSelect').value;

            if (new_correct_answer === 'a') {
                new_correct_answer = new_a;
            } else if (new_correct_answer === 'b') {
                new_correct_answer = new_b;
            } else if (new_correct_answer === 'c') {
                new_correct_answer = new_c;
            } else if (new_correct_answer === 'd') {
                new_correct_answer = new_d;
            }

            let data = "action=add_question&question="+encodeURIComponent(new_question)
                        +"&a="+encodeURIComponent(new_a)
                        +"&b="+encodeURIComponent(new_b)
                        +"&c="+encodeURIComponent(new_c)
                        +"&d="+encodeURIComponent(new_d)
                        +"&correct_answer="+encodeURIComponent(new_correct_answer)
                        +"&topic_id="+encodeURIComponent(topic_id);

            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(data);

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    if (xhttp.responseText.trim() == "add_question_success") {
                        alert("Question Added Successfully!");
                        document.getElementById('newQuestion').value = "";
                        document.getElementById('newOption_A').value = "";
                        document.getElementById('newOption_B').value = "";
                        document.getElementById('newOption_C').value = "";
                        document.getElementById('newOption_D').value = "";
                        document.getElementById('newCorrect_Answer').selectedIndex = 0;
                        
                        closePopUp('addQuestionPopUp');
                        loadQuestions(document.getElementById('topicSelect').value);
                    } else {
                        alert("Question already exists in topic");
                    }
                }
            }
        }
        function updateQuestion() {
            let question_id = document.getElementById('editQuestionId').value;
            let question = document.getElementById('editQuestion').value;
            let a = document.getElementById('editA').value;
            let b = document.getElementById('editB').value;
            let c = document.getElementById('editC').value;
            let d = document.getElementById('editD').value;
            let correct_answer = document.getElementById('editCorrect_Answer').value;

            // securely transfer special characters like & = to link JS to PHP
            let data = "action=update_question&question_id="+encodeURIComponent(question_id)
                        +"&question="+encodeURIComponent(question)
                        +"&a="+encodeURIComponent(a)
                        +"&b="+encodeURIComponent(b)
                        +"&c="+encodeURIComponent(c)
                        +"&d="+encodeURIComponent(d)
                        +"&correct_answer="+encodeURIComponent(correct_answer);
            
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", "adminMenu.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(data);

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    if (xhttp.responseText.trim() == "edit_question_successful") { 
                        alert("Question Updated Successfully!");
                        closePopUp('editPopUp');
                        loadQuestions(document.getElementById('topicSelect').value);
                    } else {
                        alert("Question already exists");
                        return;
                    }
                    
                }
            }
        }
        function deleteQuestion(question_id) {
            if (confirm('Are you sure you want to delete this question?')) {
                let xhttp = new XMLHttpRequest();

                xhttp.open("POST", "adminMenu.php", true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("action=delete_question&question_id="+question_id);
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        if (xhttp.responseText.trim() == "delete_question_successful") {
                            loadQuestions(document.getElementById('topicSelect').value);
                            alert("Question Deleted Successfully!");
                        }
                    }
                };
            }
        } 

    </script>


    </body>
</html>