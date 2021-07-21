<?php
session_start();

include("connection.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$title=$_POST['title'];
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$location=$_POST['location'];
$description=$_POST['description'];
$cost=$_POST['cost'];
$email=$_SESSION['email'];
$filename=$_FILES["image"]["name"];
$filetmpname=$_FILES["image"]["tmp_name"];
$filesize=$_FILES["image"]["size"];
// To protect MySQL injection
$title = stripslashes($title);
$category = stripslashes($category);
$subcategory=stripslashes($subcategory);
$location = stripslashes($location);
$description = stripslashes($description);
$cost=stripslashes($cost);
$email=stripslashes($email);
$title = mysqli_real_escape_string($conn,$title);
$category = mysqli_real_escape_string($conn,$category);
$subcategory=mysqli_real_escape_string($conn,$subcategory);
$location = mysqli_real_escape_string($conn,$location);
$description = mysqli_real_escape_string($conn,$description);
$cost=mysqli_real_escape_string($conn,$cost);
$email=mysqli_real_escape_string($conn,$email);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO services (title, email, category, subcategory, location, description, cost ,image, completedorders, pendingorders ,servicestatus)
VALUES ('$title', '$email', '$category', '$subcategory' , '$location' , '$description' , '$cost' , '' ,'0' ,'0' ,'0')";

if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);
  $target_dir = "images/services/".$last_id;
$target_file = $target_dir .".".strtolower(pathinfo($filename,PATHINFO_EXTENSION));
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($filetmpname);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($filesize > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($filetmpname, $target_file)) {
    echo "The file ". htmlspecialchars( basename( $filename)). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


  
} 
mysqli_close($conn);
?>