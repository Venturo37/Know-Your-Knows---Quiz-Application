// MAIN
document.addEventListener("DOMContentLoaded", function() {
    const playSection = document.querySelector(".Play-page");
    const playBtn = document.querySelector(".play-btn");
    const userSection = document.querySelector(".user-SignUp-Login");
    
    const signUpBtn = document.querySelector(".signup-btn");
    const loginBtn = document.querySelector(".login-btn");
    const signUpSection = document.querySelector(".signUp-section");
    const loginSection = document.querySelector(".login-section");
        
    
    playBtn.addEventListener("click", function() {
        playSection.style.display = "none";  //Hide Play button
        userSection.style.display = "block";  // show user sign-up/login buttons
    });

    signUpBtn.addEventListener("click", function() {
        userSection.style.display = "none";
        signUpSection.style.display = "block";
    });
    loginBtn.addEventListener("click", function() {
        userSection.style.display = "none";  // Hide user sign-up/login buttons
        loginSection.style.display = "block"; // Show login form
    });

});
function goBack() {
    document.querySelector(".user-SignUp-Login").style.display = "block"; // Show main buttons
    document.querySelector(".login-section").style.display = "none"; // Hide login form
    document.querySelector(".signUp-section").style.display = "none";
}

function togglePassword() {
    var passwordField = document.getElementById("password");
    var toggleIcon = document.getElementById("togglePassword");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.textContent = "visibility_off";
    } else {
        passwordField.type = "password";
        toggleIcon.textContent = "visibility";
    }
}
// SIGN UP
function SignUp() {
    let SignUp_firstName = document.getElementById('first_name').value;
    let SignUp_lastName = document.getElementById('last_name').value;
    let SignUp_password = document.getElementById('password').value;
    let SignUp_email = document.getElementById('email').value;
    let data = "action=signUp&SignUp_firstName=" + encodeURIComponent(SignUp_firstName)
                +"&SignUp_lastName="+encodeURIComponent(SignUp_lastName) 
                +"&SignUp_password="+encodeURIComponent(SignUp_password)
                +"&SignUp_email="+encodeURIComponent(SignUp_email);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "SignUpLogIn.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.responseText.trim() === "signup_success") { 
                alert("User Sign Up Successful");
                goBack();
            } else if (xhttp.responseText.trim() === "email_exists") { 
                alert("Email already exists.");
                return;
            } else {
                alert("Sign Up Unsuccessful.");
                return;
            }
        }
    }
}
// LOG IN
function LogIn() {
    let LogIn_email = document.getElementById('LogIn_email').value;
    let LogIn_password = document.getElementById('LogIn_password').value;
    let data = "action=logIn&LogIn_email="+encodeURIComponent(LogIn_email)
                +"&LogIn_password="+encodeURIComponent(LogIn_password);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "SignUpLogIn.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.responseText.trim() === "user_login") {
                window.location.href = "userMenu.php";
            } else if (xhttp.responseText.trim() === "admin_login") {
                window.location.href = "adminMenu.php";
            } else if (xhttp.responseText.trim() === "invalid_login") { 
                alert("Invalid Email or Password.");
            } else {
                alert("Record not found");
            }
        }
    }
}

// POP UPS
function openPopUp(id) {
    document.getElementById(id).style.display = "block";

    document.querySelector(".overlay").style.display = "block";
    document.querySelector(".header").classList.add("blur");
    document.querySelector(".content").classList.add("blur");
    document.querySelector(".footer").classList.add("blur");

    if (id == "deleteTopicPopUp") {
        let subject_id = document.getElementById("subjectforDeleteTopic").value;
        loadTopics(subject_id, false);
    }

    if (id == "addQuestionPopUp") {
        let topicSelect = document.getElementById('topicSelect');
        let selectedTopic = topicSelect.options[topicSelect.selectedIndex].text;
        document.getElementById("PopUpTopicName").innerHTML = selectedTopic;
    }

}
function closePopUp(id) {
    document.getElementById(id).style.display = "none";

    // Clear update message when closingsettings popup
    if (id == "settingsPopUp") {
        document.querySelector("#settingsPopUp #updateMessage").innerText= "";
    }
    
    document.querySelector(".overlay").style.display = "none";
    document.querySelector(".header").classList.remove("blur");
    document.querySelector(".content").classList.remove("blur");
    document.querySelector(".footer").classList.remove("blur");

}


// Settings
function openUpdatePersonalDetails(firstname, lastname, password, email) {
    openPopUp('settingsPopUp');

    document.getElementById('updateFirstname').value = firstname;
    document.getElementById('updateLastname').value = lastname;
    document.querySelector('#updateForm .password .textBox #password').value = password;
    document.getElementById('updateEmail').value = email;
    
}
function updatePersonalDetails() {
    let id = document.getElementById('settingsID').value;
    let firstname = document.getElementById('updateFirstname').value;
    let lastname = document.getElementById('updateLastname').value;
    let password = document.querySelector('#updateForm .password .textBox #password').value;
    let email = document.getElementById('updateEmail').value;

    let data = "action=update_personalInfo"
                +"&id="+encodeURIComponent(id)
                +"&firstname="+encodeURIComponent(firstname)
                +"&lastname="+encodeURIComponent(lastname)
                +"&password="+encodeURIComponent(password)
                +"&email="+encodeURIComponent(email);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "settings.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(data);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.responseText.trim();
            if (response === "update_success") {
                document.getElementById("updateMessage").innerText = "Details updated successfully";
                let newFullName = firstname + " " + lastname; 
                document.getElementById("welcomeUser").innerText = "Welcome, "+newFullName+"!";

                let newOnclick = `openUpdatePersonalDetails('${firstname}', '${lastname}'
                                    , '${password}', '${email}')`;
                document.getElementById("settingsButton").setAttribute("onclick", newOnclick);
            } else {
                alert(response);
                document.getElementById("updateMessage").innerText = "Error updating details"; 
            }
        }
    }
}
