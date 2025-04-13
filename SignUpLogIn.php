<?php
    session_start();
    include('connection.php');
    unset($_SESSION['user_id']); 
    unset($_SESSION['admin_id']); 
    
    if (isset($_POST['action'])){
        $action = $_POST['action'];

        if ($action == "signUp"){
            $firstName = $_POST['SignUp_firstName'];
            $lastName = $_POST['SignUp_lastName'];
            $password = $_POST['SignUp_password'];
            $email = $_POST['SignUp_email'];

            if (!empty($firstName) && !empty($lastName) && !empty($password) && !empty($email)) {

                $checkUserEmail = "SELECT email FROM tbluser WHERE email = '$email'";
                $checkAdminEmail = "SELECT email FROM tbladmin WHERE email = '$email'";
                $checkUserEmail_result = mysqli_query($connection, $checkUserEmail);
                $checkAdminEmail_result = mysqli_query($connection, $checkAdminEmail);

                // if != 0 can be done
                if (mysqli_num_rows($checkUserEmail_result) > 0 || mysqli_num_rows($checkAdminEmail_result) > 0) {
                    echo "email_exists";
                } else {
                    $registering = "INSERT INTO tbluser (firstname, lastname, password, email)
                        VALUES ('$firstName', '$lastName', '$password', '$email')
                        ";

                    if (mysqli_query($connection, $registering)) {
                        echo "signup_success";
                    } else {
                        echo "signup_fail";
                    }
                }  
            }
            exit();
        }

        if($action == "logIn"){
            $email = $_POST['LogIn_email'];
            $password = $_POST['LogIn_password'];
    
            $loginQueryUser = "SELECT * FROM tbluser 
                                WHERE email = '$email' AND password = '$password'";
            $loginResultUser = mysqli_query($connection, $loginQueryUser);
            $loginQueryAdmin = "SELECT * FROM tbladmin 
                                WHERE email = '$email' AND password = '$password'";
            $loginResultAdmin = mysqli_query($connection, $loginQueryAdmin);
    
            if($user = mysqli_fetch_assoc($loginResultUser)){
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['userType'] = 'user';
                echo "user_login";
            } else if($admin = mysqli_fetch_assoc($loginResultAdmin)){
                $_SESSION['admin_id'] = $admin['admin_id'];
                $_SESSION['userType'] = 'admin';
                echo "admin_login";
            } else {
                echo "invalid_login";
            }
            exit();
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RWDD Assignment</title>

    <?php include('embedStyle.php'); ?>
</head>
<body>
    
    <div class="main">
        <div id = "Header">
            <h1>Know Your Knows</h1>
        </div>
        <div class="Play-page">
            <button type="button" class="play-btn">PLAY</button>
        </div>
        <div class="user-SignUp-Login" style="display: none;">
            <button type="button" class="signup-btn">Sign Up</button>
            <button type="button" class="login-btn">Log In</button>
        </div>
        
        <div class="signUp-section" style="display: none;">
            <form class="signup-form" method="POST" onsubmit="SignUp();">
                <div class="signupTXT">
                    <h1>Sign Up</h1>
                </div>
                <div class="firstname">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="SignUp_firstName" placeholder="Enter first name" required>
                </div>
                <div class="lastname">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="SignUp_lastName" placeholder="Enter last name" required>
                </div>
                <div class="password show-password-container">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="SignUp_password" placeholder="Enter password" required pattern="^\S{8,}$" title= "Password must be at least 8 characters AND no spaces">
                    <span id="togglePassword" class="material-symbols-outlined" onclick="togglePassword()">visibility</span>
                </div>
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="SignUp_email" placeholder="Enter email" required>
                </div>
                <div class="button">
                    <button type="button" id="back_button"  onclick="goBack()">Back</button>
                    <button id="submit_button" type="button" onclick="SignUp()">Sign Up</button>
                </div>

                
            </form>
        </div>

        <div class="login-section" style="display: none;">
            <form class="login-form" method="POST" onsubmit="LogIn();">
                <div class="loginTXT">
                    <h1>Log In</h1>
                </div>
                <div class="email">
                    <label for="LogIn_email">Email:</label>
                    <input type="email" id="LogIn_email" name="LogIn_email" placeholder="Enter email" required>
                </div>
                <div class="password">
                    <label for="LogIn_password">Password:</label>
                    <input type="password" id="LogIn_password" name="LogIn_password" placeholder="Enter password" required>
                </div>
                <div class="button">
                    <button type="button" id="back_button" onclick="goBack()">Back</button>
                    <button id="submit_button" type="button" onclick="LogIn()">Log In</button>
                </div>
            </form>
        </div>
    </div>

    <script src="assignmentScript.js"></script>
</body>
</html>