<?php 
session_start();
if(isset($_GET['id'])){
$orderid=$_GET['id'];
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM $tbl5 WHERE orderid LIKE '%{$orderid}'";


$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==1 && isset($orderid) && $row['customeremail']==$_SESSION['email']) { 

    $query2 = "UPDATE orders SET status=3 WHERE orderid=$orderid";

    if (mysqli_query($conn, $query2)) {
      
      header("Location:index.php");
      
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{
  "You don't have permission to access this page";
}
 ?>