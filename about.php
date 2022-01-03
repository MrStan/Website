<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="css/index.css" type="text/css">
</head>
<body>
<div id="sources">
  <ul>
    <li><a href="#home">HOME</a></li>
    <li><a href="./index.html">LOG IN</a></li>
    <li class="active"><a href="">ABOUT</a></li>
  </ul>
</div>
<div id="container-php">
    <?php
    session_start();
    if(isset($_SESSION['fullName'])){
      echo '<h3>Your profile: </h3> <br>';
        echo 'Your full name: '.$_SESSION['fullName'].'<br>';
        echo 'Your adress: '.$_SESSION['adress'].'<br>';
        echo 'Phone number: '.$_SESSION['mobile'].'<br>';
    }
    ?>
</div>
</body>
</html>