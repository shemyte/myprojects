<?php 

session_start();

$con = mysqli_connect('localhost','root','');

// select database to use
mysqli_select_db($con, 'webis');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$s = "select * from user_info where email = '$email'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "Email already taken";
}else{
    $reg = "insert into user_info(username,email,password,password2) values ('$username','$email','$password','$password2')";
    mysqli_query($con, $reg);
    echo "Registration Successfully";
}
header('location: login.html');
?>