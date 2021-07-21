<?php 
session_start();
if(isset($_GET['id'])){
$orderid=$_GET['id'];
include("connection.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM $tbl2 WHERE servicestatus LIKE '%{$notcomplete}'";

$result=mysqli_query($conn,$query);
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==0 && isset($orderid)) { 

?>
<?php} ?>