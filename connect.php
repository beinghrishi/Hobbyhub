<?php

include("connection.php");


$connect=mysqli_connect("$servername", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($connect,"$dbname")or die("cannot select DB");

?>