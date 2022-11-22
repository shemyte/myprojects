<?php 
    // session_start();

    $con = mysqli_connect('localhost','root','');

    mysqli_select_db($con, 'webis');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <style>
        body{
            background-color: silver;
            padding: 10px;
        }
        .abt{
            margin: 0;
            /* padding: 10px; */
        }
        a{
            text-decoration: none;
        } 
        .log-out{
            margin-top: 10px;
            margin-right: 10px;
            border: 1px solid #f0f0f0;
            padding: 10px;
            border-radius: 3px;
            background-color: #f0f0f0;
            float: right;
            font-size: 14px;
        }
        
        input:focus{
            outline: 0;
        }
        
        .log-out:hover{
            background-color: rgba(237, 237, 244, 0.701);
        }
        .search-btn{
            padding: 7px;
           color: blueviolet;
        }
    </style>
</head>
<body>
    <h1 style="color: #848482;">
        <a href="#">SilverCrest Club</a>
        <a href="logout.php" class="log-out">Logout</a>
    </h1>
    <div class="about">
        <h3 class="about_section">About Us</h3>
        <div class="abt">
            <p>Vestibulum ultricies justo sem, in commodo erat rhoncus sit amet. Integer sit amet diam laoreet sem hendrerit convallis. Morbi scelerisque dui nisl, vel congue massa convallis id. Suspendisse pharetra scelerisque convallis. Curabitur efficitur sem blandit lorem vehicula, vel dictum tellus porttitor. Nulla vel rhoncus dui, eu sodales lacus.
                Phasellus sollicitudin venenatis sodales. Phasellus a urna quam. Aenean ex metus, malesuada sed finibus eget, porttitor ut urna. Nunc consequat, sapien vitae congue tempus, nibh tellus placerat quam, quis iaculis elit leo venenatis leo. Sed vel massa mauris. Vestibulum consequat metus sem, aliquam condimentum magna semper id.
            </p>

            <form method="post">
                <input type="text" name="search" placeholder="Search data" style="padding: 7px; width:25%;">
                <button name="submit" class="search-btn">Search</button>
            </form>

            <table>
                <?php 
                    if(isset($_POST['submit'])) {
                        $search = $_POST['search'];

                        $sql = "select * from user_info  where id = '$search' or username like '%$search%' or registration like '%search%'";
                        $result = mysqli_query($con, $sql);

                        if($result) {
                            if(mysqli_num_rows($result) > 0) {
                                echo '<table>
                                    <tr>
                                        <th>id</th>
                                        <th>username</th>
                                        <th>date</th>
                                        <th></th>
                                    </tr>
                                </table>';

                                while($row = mysqli_fetch_assoc($result)){
                                echo '<table>
                                <tr>  
                                    <td><a href="searchData.php?data='.$row['id'].'">'.$row['id'].'</a></td>
                                    <td>'.$row['username'].'</td>
                                    <td>'.$row['date'].'</td>
                                    <td>'.$row['registration'].'</td>
                                </tr>
                                </table>';
                                }
                            }else {
                                echo '<h2 style="color: red;">Data not found</h2>';
                            }
                        }
                    }

                ?>
            </table>

        </div>
        
    </div>
</body>
</html>