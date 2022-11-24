<?php 
     $con = mysqli_connect('localhost','root','');
     mysqli_select_db($con, 'webis');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Display search data</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src='main.js'></script> -->
    <style>
        body{
            background-image: url("images/pic\ \(2\).jpg");
            background-size: cover;
            background-attachment: fixed;
        }
        h1,p{
            text-align: center;
        }
        .data{
            margin: 15vh auto 0 auto;
            width: 600px;
            padding: 10px;
            background-color: silver;
        }
        a{
            text-decoration: none;
        }
        .back{
           border: 1px solid blue;
           border-radius: 3px;
           padding: 3px 5px;
           background-color: blue;
           color: black;
        }
        .back:hover{
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <?php 
        $data = $_GET['data']; 
        $sql = "select * from user_info where id = $data";
        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_assoc($result);
            echo '<div class="data">
            <h1>'.$row['username'].'</h1>
            <p>Your email is: '.$row['email'].'</p>
            <hr>
            <a class="back" href="welcome.php" role="button">Back</a>
            </div>';
        }
    ?>
    
</body>
</html>