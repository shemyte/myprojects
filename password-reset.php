<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        button,input {
        display: block;
        margin-block-end: 10px;
        padding: 7px;
        box-sizing: border-box;
        inline-size: 100%;
        }
        form{
            background-color: silver;
            margin: 10px;
            padding: 10px;

        }
        #alert{
            text-align: center;
        }
    </style>
</head>
<body>
    <form id="password-reset-form" method="POST" action="password-reset-code.php" >
        <div id="alert">
            <h2>Reset Password</h2>
        </div>
      
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" />
      
        <!-- <label for="password-verify">Re-type password</label>
        <input type="password" id="password-verify" /> -->
      
        <button type="submit" name="password-reset-link">Send password</button>
      </form>
</body>
</html>