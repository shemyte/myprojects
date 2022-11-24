<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        :root{
            --error-color: #dc3545;
            --success-color: #28a745;
            --warning-color: #ffc107;
        }
        body{
            background-image: url("images/pic\ \(2\).jpg");
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        button{
            display: block;
            margin-block-end: 10px;
            padding: 10px;
            inline-size: 100%;
            background-color: #084cb1;
            border:none;
            color:white;
        }
        button:hover{
            background-color: darkblue;
            cursor: pointer;
        }
        form{
            background-color: whitesmoke;
            width: 350px;
            margin: 20vh auto 0 auto;
            padding: 20px;
            border-radius: 4px;

        }
        .form-field{
            margin-bottom: 5px;
        }
        form.field label{
            display: block;
            color: #777;
            margin-bottom: 5px;
        }

        .form-field input{
            border: solid 2px #f0f0f0;
            box-sizing: border-box;
            border-radius: 3px;
            padding: 9px;
            margin-bottom: 5px;
            font-size: 14px;
            display: block;
            width: 100%;
        }

        .form-field input:focus{
            outline: none;
        }

        .form-field.error input{
            border-color: var(--error-color);
        }
        .form-field.success input{
            border-color: var(--success-color);
        }

        .form-field small{
            color: var(--error-color);
        }
        #alert{
            text-align: center;
            color: rgb(131, 135, 137);
            font-size: large;
        }
        .alert1{
            text-align: center;
            font-size: x-large;
            color: red; 
            background-color: silver;
            padding: 10px;
        }
        #password-update{
            margin-top: 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
        <?php 
            if(isset($_SESSION['status'])){
                ?>
                <div class="alert1">
                    <h5><?=$_SESSION['status'];?></h5>
                </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>

    <form method="POST" action="password-reset-code.php" id="password-change">
        <div id="alert">
            <h2>Change Password</h2>
            <input type="hidden" name="password-token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
        </div>

        <div class="form-field">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" placeholder="youremail@gmail.com"/>
        <small></small>
        </div>

        <div class="form-field">
        <label for="password">New Password</label>
        <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" />
        <small></small>
        </div>

        <div class="form-field">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm-Password"/>
        <small></small>
        </div>

        <button type="submit" id="password-update" name="password-update" >Update Password</button>
    </form>

    <script type="text/javascript">
        const emailEl = document.querySelector('#email');
        const passwordEl = document.querySelector('#new-password');
        const confirmPasswordEl = document.querySelector('#confirm-password');
        const form = document.querySelector('#password-change');

        form.addEventListener('submit', function (e) {
            // check if form is valid
            let isEmailValid = checkEmail(),
            isPasswordValid = checkPassword(),
            isConfirmPasswordValid = checkConfirmPassword();

            let isFormValid = isEmailValid &&
            isPasswordValid && isConfirmPasswordValid;

            // submitting to the server if form is valid
            if(!isFormValid){
                e.preventDefault();
            }
        });

        // returns true if input argument is empty
        const isRequired = value => value === '' ? false : true;

        const isEmailValid = (email) => {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };

        // check if password is strong
        const isPasswordSecure = (password) => {
            const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            return re.test(password);
        };

        const showError = (input, message) => {
            const formField = input.parentElement;
            formField.classList.remove('success');
            formField.classList.add('error');
            const error = formField.querySelector('small');
            error.textContent = message;
        };

        const showSuccess = (input) => {
            const formField = input.parentElement;
            formField.classList.remove('error');
            formField.classList.add('success');
            const error = formField.querySelector('small');
            error.textContent = '';
        };

        // validating email
        const checkEmail = () => {
            let valid = false;
            const email = emailEl.value.trim();
            if (!isRequired(email)) {
                showError(emailEl, 'Email cannot be blank.');
            } else if (!isEmailValid(email)) {
                showError(emailEl, 'Email is not valid.')
            } else {
                showSuccess(emailEl);
                valid = true;
            }
            return valid;
        };

        // validating password
        const checkPassword = () => {
            let valid = false;
            const password = passwordEl.value.trim();
            if (!isRequired(password)) {
                showError(passwordEl, 'Password cannot be blank.');
            } else if (!isPasswordSecure(password)) {
                showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
            } else {
                showSuccess(passwordEl);
                valid = true;
            }
            return valid;
        };

        // validate confirm password
        const checkConfirmPassword = () => {
            let valid = false;
            const confirmPassword = confirmPasswordEl.value.trim();
            const password = passwordEl.value.trim();
            if (!isRequired(confirmPassword)) {
                showError(confirmPasswordEl, 'Please enter the password again');
            } else if (password !== confirmPassword) {
                showError(confirmPasswordEl, 'Confirm password does not match');
            } else {
                showSuccess(confirmPasswordEl);
                valid = true;
            }
            return valid;
        };
    </script>
</body>
</html>