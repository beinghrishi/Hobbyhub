<?php 

session_start();
include("connection.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==2) { 
    ?>

<?php
$orderid=$_GET['id'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM orders WHERE orderid LIKE '%{$orderid}'";


$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

$query2="SELECT * FROM freelancers WHERE email LIKE '%{$row['freelanceremail']}'";
$query3="SELECT * FROM customers WHERE email LIKE '%{$row['customeremail']}'";
$query4="SELECT * FROM users WHERE email LIKE '%{$row['customeremail']}'";
$query5="SELECT * FROM users WHERE email LIKE '%{$row['freelanceremail']}'";
$query6="SELECT * FROM services WHERE id LIKE '%{$row['serviceid']}'";
$result2=mysqli_query($conn,$query2);
$row2=mysqli_fetch_array($result2);
$result3=mysqli_query($conn,$query3);
$row3=mysqli_fetch_array($result3);
$result4=mysqli_query($conn,$query4);
$row4=mysqli_fetch_array($result4);
$result5=mysqli_query($conn,$query5);
$row5=mysqli_fetch_array($result5);
$result6=mysqli_query($conn,$query6);
$row6=mysqli_fetch_array($result6);
?>
   <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>review order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="myse.css">
</head>
<body>

<div class="jumbotron">
    <div class="row">
       
        <div class="col-lg-6">  <img src="images/services/<?php echo $row6['id'];?>.jpg" style="height: 300px;" class="img-thumbnail" alt="Responsive image"></div>
    <div class="col-lg-6"><h3 class="text-center"><strong>Order Title:</strong><?php echo $row6['title'];?></h3>
    <h6>Order Instruction</h6>
    <p>
       <?php echo $row['instruction'];?>
    </p>
    
    
    
    
    </div>

<div class="row container-fluid">
<div class="col-lg-4">
    <div class="card" style="width: 18rem;">
    
        <div class="card-body">
            <h5>Order Details</h5>
         <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Razorpay Payment Id
    <span class="badge badge-primary badge-pill"><?php echo $row['gateway_payment_id'];?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Razorpay Order Id
    <span class="badge badge-primary badge-pill"><?php echo $row['gateway_order_id'];?></span>
  </li>

</ul>
        </div>
      </div>

</div>
<div class="col-lg-4">
    <div class="card bg-warning" style="width: 18rem;">
        
        <div class="card-body">
<h5>Customer Details</h5>
<p class="card-text">
    <ul class="list-group bg-warning">
        <li class="list-group-item">Name:<?php echo $row4['email'];?></li>
        <li class="list-group-item">Email:<?php echo $row4['email'];?></li>
        <li class="list-group-item">Phone no:<?php echo $row4['phoneno'];?></li>
    
      </ul>
</p>

        </div>
      </div>
      
      
</div>
<div class="col-lg-4">
    <div class="card bg-info" style="width: 18rem;">
        
        <div class="card-body">
<h5>Freelancer Details</h5>
<p class="card-text">
    <ul class="list-group bg-warning">
    <li class="list-group-item">Name:<?php echo $row2['fname']." ".$row2['lname'];?></li>
        <li class="list-group-item">Email:<?php echo $row5['email'];?></li>
        <li class="list-group-item">Phone no:<?php echo $row5['phoneno'];?></li>
    
      </ul>
</p>

        </div>
      </div>
      
      
</div>

</div>

    </div>
  


</div>    



</body>
</html>
<?php 

mysqli_close($conn);}
else{header("Location:index.php");}