<?php
session_start();


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==2) { 
    
include("connection.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$serviceid=$_GET['id'];
$approved=1;




// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE services SET servicestatus=$approved WHERE id=$serviceid";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header("Location:index.php");
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>