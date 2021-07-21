<?php 
session_start();
$serviceid=$_POST['serviceid'];
$femail=$_POST['femail'];
$instruction=$_POST['instruction'];
$paid=$_POST['paid']/100;
$cemail=$_SESSION['email'];

include("connection.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$cemail=$_SESSION['email'];
$ordercreated=0;
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "INSERT INTO orders (customeremail, freelanceremail, 	serviceid, paid, status, instruction,gateway_payment_id	,gateway_order_id	,signature_hash	)
  VALUES ('$cemail', '$femail', '$serviceid', '$paid' , '$ordercreated' , '$instruction', '".$_POST['razorpay_payment_id']."','".$_POST['razorpay_order_id']."','".$_POST['razorpay_signature']."')";
  
  if (mysqli_query($conn, $sql)) {
    echo "Your order has been successfully created";
    
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);
?>
