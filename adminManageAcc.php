<?php
    session_start();
    if (!isset($_SESSION['admin_id'])) {
        header('Location: SignUpLogIn.php');
        exit();
    }

    include('connection.php');
    
    // 3
    if (isset($_POST['updateUser'])) {
        $id = $_POST['user_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $user_type = $_POST['user_type'];

        if ($user_type === 'user') {
            $email_check_query = "SELECT * FROM tbluser WHERE email = '$email' AND user_id != '$id'";
        } else if ($user_type === 'admin') {
            $email_check_query = "SELECT * FROM tbladmin WHERE email = '$email' AND admin_id != '$id'";
        }

        $email_check_result = mysqli_query($connection, $email_check_query);
        if (mysqli_num_rows($email_check_result) > 0) {
            echo "email_exists";
            exit();
        }

        if ($user_type === "user") {
            $update_query = "UPDATE tbluser 
            SET firstname='$firstname', lastname='$lastname', email='$email' 
            WHERE user_id='$id'";
        } else if ($user_type === "admin") {
            $update_query = "UPDATE tbladmin
            SET firstname='$firstname', lastname='$lastname', email='$email' 
            WHERE admin_id='$id'";
        }

        if (mysqli_query($connection, $update_query)) {
            echo "success";
        } else {
            echo "error";
        }
        exit();
    }

    if (isset($_POST['deleteUser'])) {
        $id = $_POST['user_id'];
        $user_type = $_POST['user_type'];

        if ($user_type === "user") {
            $delete_query = "DELETE FROM tbluser WHERE user_id='$id'";
        } else if ($user_type === "admin") {
            $delete_query = "DELETE FROM tbladmin WHERE admin_id='$id'";
        }

        if (mysqli_query($connection, $delete_query)) {
            echo "success";
        } else {
            echo "error";
        }
        exit();
    }

    if (isset($_POST['addAdmin'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $checkUserEmail = "SELECT email FROM tbluser WHERE email = '$email'";
        $checkAdminEmail = "SELECT email FROM tbladmin WHERE email = '$email'";
        $checkUserEmail_result = mysqli_query($connection, $checkUserEmail);
        $checkAdminEmail_result = mysqli_query($connection, $checkAdminEmail);

        if (mysqli_num_rows($checkUserEmail_result) > 0 || mysqli_num_rows($checkAdminEmail_result) > 0) {
            echo "email_exists";
            exit();
        }

        $insert_query = "INSERT INTO tbladmin (firstname, lastname, password, email)
                            VALUES ('$firstname', '$lastname', '$password', '$email')";

        if (mysqli_query($connection, $insert_query)) {
            echo "success";
        } else {
            echo "error";
        }
        exit();
    }



// For tabular data display
    $user_query = "SELECT user_id, firstname, lastname, email FROM tbluser";
    $user_result = mysqli_query($connection, $user_query);
    
    $admin_query = "SELECT admin_id, firstname, lastname, email FROM tbladmin";
    $admin_result = mysqli_query($connection, $admin_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <?php include('embedStyle.php'); ?>


</head>
<body> 
    <div class="overlay"></div>
    <?php include('header.php');?>

    <div class="content adminManageAcc">
        <div class="title">
            <button class="back" onclick="window.location.href = 'adminMenu.php';">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>

            <h1>User & Admin Management</h1>
        </div>
        
        <div class="user_admin_container">
            <div class="user_container">
                <h2>User Lists</h2>
                <div class="userList">
                    <table border="1">
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th colspan=2>Action</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($user_result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['email']; ?></td>

                                <td>
                                    <button class="edit-button" onclick="openEditPopUp(
                                        'user',
                                        '<?php echo $row['user_id']; ?>',
                                        '<?php echo $row['firstname']; ?>',
                                        '<?php echo $row['lastname']; ?>',
                                        '<?php echo $row['email']; ?>'
                                        )">
                                        Edit
                                    </button>
                                </td>
                                <td>
                                    <button class="delete-button" 
                                        onclick="deleteUser('<?php echo $row['user_id']; ?>', 'user')">
                                            Delete
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class="adminList_container">
                <h2>
                    <div>Admin List</div>
                    <div>
                        <button onclick="openPopUp('addAdmin-popUp')">
                            Add Admin
                        </button>
                    </div>
                    
                </h2>
                <div class="adminList">
                    <table border="1">
                        <tr>
                            <th>Admin ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th colspan=2>Action</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($admin_result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['admin_id']; ?></td>
                                <td><?php echo $row['firstname']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['email']; ?></td>

                                <td>
                                    <button class="edit-button" onclick="openEditPopUp(
                                        'admin',
                                        '<?php echo $row['admin_id']; ?>',
                                        '<?php echo $row['firstname']; ?>',
                                        '<?php echo $row['lastname']; ?>',
                                        '<?php echo $row['email']; ?>'
                                        )">
                                        Edit
                                    </button>
                                </td>
                                <td>
                                    <button class="delete-button" 
                                        onclick="deleteUser('<?php echo $row['admin_id']; ?>', 'admin')">
                                            Delete
                                    </button>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-popUp" class="popup">
        <div class="popup_form">
                <h2>Editing Details</h2>
            <div>
                <form onsubmit="updateUserDetails();">
                    <input type="hidden" id="edit_Type" name="user_type">
                    <input type="hidden" id="edit_ID" name="user_id">

                    <label for="edit_Firstname">New First Name: </label>
                    <input type="text" name="firstname" id="edit_Firstname" required><br>

                    <label for="edit_Lastname">New Last Name: </label>
                    <input type="text" name="lastname" id="edit_Lastname" required><br>

                    <label for="edit_Email">New Email: </label>
                    <input type="email" name="email" id="edit_Email" required><br>

                    <div class="button_group">
                        <button class="close_popup_form" type="button" onclick="closePopUp('edit-popUp')">Cancel</button>
                        <button class="submit_popup_form" type="submit" class="edit-button" name="updateUser">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="addAdmin-popUp" class="popup">
        <div class="popup_form">
            <h2>Add New Admin</h2>
            <div>
                <form onsubmit="AddAdminForm();">
                    <label for="new_Firstname">New First Name: </label>
                    <input type="text" name="firstname" id="new_Firstname" required><br>

                    <label for="new_Lastname">New Last Name: </label>
                    <input type="text" name="lastname" id="new_Lastname" required><br>
                    
                    <label for="new_Password">New Password: </label>
                    <input type="password" name="password" id="new_Password" required><br>

                    <label for="new_Email">New Email: </label>
                    <input type="email" name="email" id="new_Email" required><br>

                    <div class="button_group">
                        <button class="close_popup_form" type="button" onclick="closePopUp('addAdmin-popUp');">Cancel</button>
                        <button class="submit_popup_form" type="submit" class="edit-button" name="addAdmin">Add Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script src="assignmentScript.js"></script>
    <script>
        function openEditPopUp(usertype, userId, firstName, lastName, email) {
            document.getElementById("edit_Type").value = usertype;
            document.getElementById("edit_ID").value = userId;
            document.getElementById("edit_Firstname").value = firstName;
            document.getElementById("edit_Lastname").value = lastName;
            document.getElementById("edit_Email").value = email;
            openPopUp("edit-popUp");
        }
        
        // Sequence of the process
        // 1
        function updateUserDetails() {
            let user_type = document.getElementById("edit_Type").value;
            let user_id = document.getElementById("edit_ID").value;
            let first_name = document.getElementById("edit_Firstname").value;
            let last_name = document.getElementById("edit_Lastname").value;
            let email = document.getElementById("edit_Email").value;

            let xhttp = new XMLHttpRequest();
        // 4
        // Function is run after event is occured
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText.trim() === "success") {
                        alert('User/Admin updated successfully');
                        document.getElementById("edit-popUp").style.display = "none";
                        location.reload();
                    } else if (this.responseText.trim() === "email_exists") {
                        alert('The email is already in use. Please choose another email.');
                    } else {
                        alert('Error updating record');
                    }
                }
            };
        // 2
            xhttp.open("POST", "adminManageAcc.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("updateUser=true&user_id=" + user_id + "&firstname="+ first_name + "&lastname=" + last_name + "&email=" + email + "&user_type=" + user_type);
            // encodes unsafe characters like " # % < > + that might break URLs or be misinterpreted
        }

        function deleteUser(user_id, user_type) {
            if (confirm('Are you sure you want to delete this user?')) {
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText.trim() === "success") {
                            alert('User/Admin deleted successfully');
                            location.reload();
                        } else {
                            alert('Error deleting record');
                        }
                    }
                };
            xhttp.open("POST", "adminManageAcc.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("deleteUser=true&user_id=" + user_id + "&user_type=" + user_type);
            }
        }

        function AddAdminForm() {
            let firstname = document.getElementById("new_Firstname").value;
            let lastname = document.getElementById("new_Lastname").value;
            let password = document.getElementById("new_Password").value;
            let email = document.getElementById("new_Email").value;

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText.trim() === "success") {
                        alert('New Admin added successfully');
                        location.reload();
                    } else if (this.responseText.trim() === "email_exists") {
                        alert('The email is already in use. Please choose another email.');
                    } else {
                        alert('Error adding new admin');
                    }
                }
            };
            xhttp.open("POST", "adminManageAcc.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("addAdmin=true&firstname="+firstname+"&lastname="+lastname+"&password="+password+"&email="+email);
        }


    </script>
</body>
</html>