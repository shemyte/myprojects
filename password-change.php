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
        button,input {
        display: block;
        margin-block-end: 10px;
        padding: 7px;
        box-sizing: border-box;
        inline-size: 100%;
        }
        form{
            background-color: silver;
            /* margin: 10px; */
            padding: 10px;
            margin: 20vh 0 auto 80vh;
            width: 350px;

        }
        #alert{
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="POST" action="password-reset-code.php" >
        <div id="alert">
            <h2>Change Password</h2>
            <input type="hidden" name="password-token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>" >
        </div>
      
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" placeholder="Enter your email" />

        <label for="password">New Password</label>
        <input type="password" id="new-password" name="new-password" placeholder="Enter your new password" />
      
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm-Password"/>
      
        <button type="submit" name="password-update">Update Password</button>
      </form>
</body>
</html>