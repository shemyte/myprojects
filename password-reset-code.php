<?php 
 session_start();

 $con = mysqli_connect('localhost','root','');
 
 // select database to use
 mysqli_select_db($con, 'webis');

 //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
 function send_password_reset($get_name, $get_email, $token) {
    $mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'skatuu@kabarak.ac.ke';                     //SMTP username
    $mail->Password   = 'Kabarak123';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('shemaiahngala8@gmail.com', $get_name);
    $mail->addAddress($get_email);     //Add a recipient
    
    $mail->isHTML(true);               
    $mail->Subject = "Reset password notofication";

    $email_teplate = "
        <h2>Hello</h2>
        <h3>Youe are receiving this email because we received a password reset request for your account.</h3>
        <br><br>
        <a href='http://localhost/web-based-form/myprojects/password-reset.php?token=$token&email=$get_email'>Click Me</a>
        ";

    $mail->Body = $email_teplate;
    $mail->send();
}
//  } catch (Exception $e){
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//  }

 if(isset($_POST['password-reset-link'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM user_info WHERE email='$email' limit 1";
    $check_email_run = mysqli_query( $con, $check_email);

    if(mysqli_num_rows($check_email_run)>0){
        // echo "your email is $email";
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email']; 

        // check and update token
        $update_token = "UPDATE user_info SET verify_token='$token'WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run){
            send_password_reset($get_name, $get_email, $token);
            $_SESSION['status'] = "we've emailed you a password reset link";
            header("location: password-reset.php");
            exit(0);
        }else{
            $_SESSION['status'] = "Something went wrong. #1";
        header("location: password-reset.php");
        exit(0);
        }
    }else{
        // echo 'failed';
        $_SESSION['status'] = "No email found!";
        header("location: password-reset.php");
        exit(0);
    }
 }
?>