<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connected</title>
  <link rel="stylesheet" href="css/index.css" type="text/css">
  <link rel="stylesheet" media="screen and (max-width: 1050px)" href="css/widerscreen.css">
  <link rel="stylesheet" media="screen and (max-width: 650px)" href="css/smallerscreen.css">
</head>
<body>
<div id="sources">
  <ul>
    <li><a href="#home">HOME</a></li>
    <li><a href="./index.html">LOG IN</a></li>
    <li><a href="./about.php">ABOUT</a></li>
  </ul>
</div>
<div id="container-php">
<?php
// post records
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$Adress = $_POST['adress'];
$Phone = $_POST['phoneNum'];
$Password = $_POST['password'];
$imgFileSize = $_FILES["fileToUpload"]['size'];
$Img = $_FILES['fileToUpload']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$type = $_FILES['fileToUpload']['type'];
//Check if the database is compatible.
require('db/connect.php');

// check type of file.
if($imageFileType != "img" && $imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "gif" && $imageFileType != "png") {
  echo 'Sorry but is accepted only img / jpg / jpeg / gif... <br>
  Please go back to log in page and load one accepted type of image. :) <br>';
  echo '<a href="index.html" id="goBack">Go back!</a>';
  die();
} 
else {
    // Session!
  session_start();
    $_SESSION['fullName'] = $firstname.' '.$lastname;
    $_SESSION['adress'] = $Adress;
    $_SESSION['mobile'] = $Phone;

  if(isset($_SESSION['fullName'])) {
    echo 'Welcome back '.$_SESSION['fullName'], '!!!<br>';
  }
    // Insert image in folder...
  if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. <br>";

    // database insert sql
  $sql = "INSERT INTO website (FirstName, LastName, Adress, PhoneNumber, Password, FileName) VALUES ('$firstname', '$lastname', '$Adress', '$Phone', '$Password', '$Img');";
  if ($con->query($sql) === TRUE) {
      echo "New record created successfully! <br>";
      echo '<a href="about.php" id="goAbout">Go about!</a>';
  } else {
      echo "Error: ".$sql.'<br>'.$con->error;
    }
  $con->close();

    } else {
      die();
    }
  };
}
?>
</div>
</body>
</html>
