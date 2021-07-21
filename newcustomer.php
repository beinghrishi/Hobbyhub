<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hobbyhub";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass=$_POST['pass'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
// To protect MySQL injection
$email = stripslashes($email);
$pass = stripslashes($pass);
$phone=stripslashes($phone);
$fname=stripslashes($fname);
$lname=stripslashes($lname);
$address=stripslashes($address);
$email = mysqli_real_escape_string($conn,$email);
$pass = mysqli_real_escape_string($conn,$pass);
$phone = mysqli_real_escape_string($conn,$phone);
$fname = mysqli_real_escape_string($conn,$fname);
$lname = mysqli_real_escape_string($conn,$lname);
$address = mysqli_real_escape_string($conn,$address);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (email, phoneno, password ,usertype)
VALUES ('$email', '$phone', '$pass','1')";
$sql2 = "INSERT INTO freelancers (email,  ,address,fstatus)
VALUES ('$email', '$fname', '$lname','$address','0')";
if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>