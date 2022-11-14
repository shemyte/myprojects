<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        }
        button,input {
            display: block;
            margin-block-end: 10px;
            padding: 7px;
            box-sizing: border-box;
            inline-size: 100%;
        }
        button{
            background-color: #084cb1;
            border: none;
            border-radius: 3px;
            color: white;
            margin-top: 10px;
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
            padding: 7px;
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
        #alert p{
            font-size: medium;
        }
    </style>
</head>
<body>
    
    <?php 
        if(isset($_SESSION['status'])){
            ?>
            <div class="alert1">
                <h5 style="background-color: sliver; color: black;"><?=$_SESSION['status'];?></h5>
            </div>
            <?php
            unset($_SESSION['status']);
        }
    ?>
    <form id="password-reset-form" method="POST" action="password-reset-code.php" >
        <div id="alert">
            <h2>Reset Password</h2>
            <p>Please provide your email address to get a reset password link.</p>
        </div>
      
        <div class="form-field">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" />
        <small></small>
        </div>

        <div class="form-field">
        <button type="submit" name="password-reset-link">Send password-reset-link</button>
        </div>
    </form>

    <script type="text/javascript">
        const emailEl = document.querySelector('#email');
        const form = document.querySelector('#password-reset-form');

        form.addEventListener('submit', function (e) {
            // check if form is valid
            let isEmailValid = checkEmail();
            
            let isFormValid = isEmailValid;

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
    </script>
</body>
</html>