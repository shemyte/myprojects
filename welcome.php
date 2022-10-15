<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Welcome page</title>
    <style>
        body{
            background-color: silver;
            padding: 10px;
        }
        .abt{
            margin: 0;
            padding: 10px;
        }
        a{
            text-decoration: none;
        } 
        .log-out{
            margin-top: 10px;
            border: 2px solid #f0f0f0;
            padding: 10px;
            border-radius: 3px;
            background-color: #f0f0f0;
            float: right;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1 style="color: #848482;">
        <a href="#">SilverCrest</a>
        <!-- <h3>Welcome <?php echo $_SESSION['username']; ?> </h3> -->
        <a href="logout.php" class="log-out">Logout</a>
    </h1>
    <div id="about-section" class="about">
        <h3 class="about_section">About Us</h3>
        <div class="abt">
            <!-- <h5>Background</h5> -->
            <p>Vestibulum ultricies justo sem, in commodo erat rhoncus sit amet. Integer sit amet diam laoreet sem hendrerit convallis. Morbi scelerisque dui nisl, vel congue massa convallis id. Suspendisse pharetra scelerisque convallis. Curabitur efficitur sem blandit lorem vehicula, vel dictum tellus porttitor. Nulla vel rhoncus dui, eu sodales lacus.
                Phasellus sollicitudin venenatis sodales. Phasellus a urna quam. Aenean ex metus, malesuada sed finibus eget, porttitor ut urna. Nunc consequat, sapien vitae congue tempus, nibh tellus placerat quam, quis iaculis elit leo venenatis leo. Sed vel massa mauris. Vestibulum consequat metus sem, aliquam condimentum magna semper id.
            </p>
    
            <p>Vestibulum ultricies justo sem, in commodo erat rhoncus sit amet. Integer sit amet diam laoreet sem hendrerit convallis. Morbi scelerisque dui nisl, vel congue massa convallis id. Suspendisse pharetra scelerisque convallis. Curabitur efficitur sem blandit lorem vehicula, vel dictum tellus porttitor. Nulla vel rhoncus dui, eu sodales lacus.
                Phasellus sollicitudin venenatis sodales. Phasellus a urna quam. Aenean ex metus, malesuada sed finibus eget, porttitor ut urna. Nunc consequat, sapien vitae congue tempus, nibh tellus placerat quam, quis iaculis elit leo venenatis leo. Sed vel massa mauris. Vestibulum consequat metus sem, aliquam condimentum magna semper id.
            </p>
        </div>

        <div class="container">
            <h5 style="text-decoration: underline;">Our Team</h5>
            <div class="row" id="imagez">
                <div class="col-md-4">
                    <img src="./images/board.jpg" alt="" style="max-width: 100%;">
                    <p>Board of Directors</p>
                </div>
                <div class="col-md-4">
                    <img src="./images/christina.jpg" alt="" style="max-width: 100%; ">
                    <p>C.E.O</p>
                </div>
                <div class="col-md-4">
                    <img src="./images/clay.jpg" alt="" style="max-width: 100%;">
                    <p>Human Resource</p>
                </div>
            </div>
</body>
</html>