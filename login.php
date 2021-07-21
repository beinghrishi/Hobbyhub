<?php
include("connect.php");
$dbconnect=mysqli_select_db($connect,"$dbname")or die("cannot select DB");
$tbl1="users";
$email=$_POST["email"];
$pass=$_POST["pass"];

// To protect MySQL injection
$email = stripslashes($email);
$pass = stripslashes($pass);
$email = mysqli_real_escape_string($connect,$email);
$pass = mysqli_real_escape_string($connect,$pass);

$sql="SELECT * FROM $tbl1 WHERE email='$email' and password='$pass'";
$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);

if($count==1){
    //$query="SELECT * from $tbl1 WHERE email like '$email'";
    //$details=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($result);
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['usertype']=$row['usertype'];
    header("Location:home.php");

}
?>