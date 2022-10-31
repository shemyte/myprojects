<?php 
    session_start();

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'webis');

    // $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password2 = $_POST['password2'];

    $s1 = "SELECT * from user_info where email = '$email'";

    $result1 = mysqli_query($con, $s1);

    $num = mysqli_num_rows($result1);

    if($num == 1){
        // $_SESSION['username'] = $username;
       header('location: welcome.php');
    }else{
       echo "Wrong email or password!";
    }
?>