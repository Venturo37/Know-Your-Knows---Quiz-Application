<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

if (!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id'])) {
    header('Location: SignUpLogIn.php');
    exit();
}

include('connection.php');

if (isset($_POST['action'])){
    $action = $_POST['action'];

    if ($action == 'update_personalInfo') {
        $id = $_POST['id'];
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);

        $userType = $_SESSION['userType'];
        $table = ($userType == 'user') ? 'tbluser' : 'tbladmin';
        $idColumn = ($userType == 'user') ? 'user_id' : 'admin_id';
        $update_query = "UPDATE $table 
                    SET firstname='$firstname', lastname='$lastname', password='$password', email='$email' 
                    WHERE $idColumn ='$id'";

        if (mysqli_query($connection, $update_query)) {
            echo "update_success";
        } else {
            echo "error: " . mysqli_error($connection);
        }
        exit();
    }
}

?>

<body>
    <div id="settingsPopUp" style="display: none;">
        <h2>Updating Personal Details</h2>
        <form id="updateForm">
            <input type="hidden" id="settingsID" name="id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_SESSION['admin_id']; ?>"> 
            <label class="textBox">New First Name: 
                <input type="text" id="updateFirstname" name="firstname" required>
            </label>
            <label class="textBox">New Last Name: 
                <input type="text" id="updateLastname" name="lastname" required>
            </label>
            
            <div class="password show-password-container">
                <label class="textBox">New Password:
                    <input type="password" id="password" name="password" required>
                    <span id="togglePassword" class="material-symbols-outlined" onclick="togglePassword()">visibility</span>
                </label>
            </div>
            <label class="textBox">New Email: 
                <input type="email" id="updateEmail" name="email" required>
            </label>
            <div class="settings_button">
                <button type="button" onclick="closePopUp('settingsPopUp')">Exit</button>
                <button type="button" onclick="updatePersonalDetails()">Save Changes</button>
            </div>
        </form>
        <p id="updateMessage"></p>
        
    </div>

    <script src="assignmentScript.js"></script>

</body>
</html>
