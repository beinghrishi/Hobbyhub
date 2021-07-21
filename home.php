
<?php 

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==0) { 
    ?>
      <!--freelancer-->
      <!DOCTYPE html>
      <html lang="en">
       <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>HobbyHub</title>
         <link rel="stylesheet" href="css/bootstrap.min.css">
          <link
          rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
          />

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="css/bootstrap.min.css">    
         <link rel="stylesheet" href="homestyle.css">
         <link rel="stylesheet" href="static/fdashstyle.css">
         <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
        </head>
      <body>
         <?php include("header.php") ?>
         <?php 
         include("connection.php");
         $neworder=0;
         $pendingorder=1;
         $freelancercompleted=2;
         $customercompleted=3;
         $declinedorder=4;
         $email=$_SESSION['email'];
         $con=mysqli_connect("$servername","$username","$password","$dbname");
         $sql="SELECT * FROM $tbl3 WHERE email='$email'";
         $result=mysqli_query($con,$sql);
         
         $row=mysqli_fetch_array($result);
         
         $_SESSION['fname']=$row['fname'];
         $_SESSION['lname']=$row['lname'];
         $_SESSION['earnings']=$row['earnings'];
         $_SESSION['wallet']=$row['wallet'];
         $_SESSION['profilepic']=$row['profileic'];
         $_SESSION['address']=$row['address'];

         
         $query4 = "SELECT * FROM $tbl5 WHERE freelanceremail LIKE '%{$email}' and status LIKE '%{$pendingorder}'";
         $result4=mysqli_query($con,$query4);
         $query5 = "SELECT * FROM $tbl5 WHERE freelanceremail LIKE '%{$email}' and status LIKE '%{$customercompleted}'";
         $result5=mysqli_query($con,$query5);
         
         
         $pendingorders=mysqli_fetch_array($result4);
         $completedorders=mysqli_fetch_array($result5);
         ?>
         
         
         <div class="container">
    <table>

        <td>
            <h4 style="margin-top: 2vw;">Total earnings:Rs.<?php echo $_SESSION['earnings'];?> <b></b></h4>
            <div ><img class="profile-img"src="https://static1.squarespace.com/static/5283d33fe4b065af7e0f0f97/528ac1abe4b000f9c70bd010/5461c80ee4b0efbe94330465/1482514728236/YvesBehar-20141010-051.JPG?format=1500w" alt=""></div>
            
        </td>
        <td>
           <h1><?php echo $_SESSION['fname']." ". $_SESSION['lname'] ?> </h1>
           <a href="myservices.php"><button class="btn btn-default" style="color: black;">My Services</button></a>
           
        </td>


    </table>
</div>

<div class="container">
<div class="row mt-2">
<div class="col-lg-4">
<button id="work" class="btn btn-block btn-outline-warning">New order </button>

</div> 

<div class="col-lg-4">
  <button id="pend" class="btn btn-block btn-outline-warning">Pending order</button>
  
  </div>

  <div class="col-lg-4">
    <button id="done" class="btn btn-block btn-outline-warning">completed</button>
    
    </div>
</div>
</div>

<div class="container order" style="display:block">
<hr>
<?php
$query3 = "SELECT * FROM $tbl5 WHERE freelanceremail LIKE '%{$email}' and status LIKE '%{$neworder}'";
$result3=mysqli_query($con,$query3);
 while($neworders=mysqli_fetch_array($result3)){?>
<div class="row">
  <?php 
  
  $serviceid=$neworders['serviceid'];
  $query10 = "SELECT * FROM $tbl2 WHERE id LIKE '%{$serviceid}'";
  $result10=mysqli_query($con,$query10);
  $row10=mysqli_fetch_array($result10);
  $servicetitle=$row10['title'];
  
  ?>

  <div class="col-lg-6"><h4>You have received a new order for the service titled '<?php echo $servicetitle;?>'</h4></div>
  <div class="col-lg-6"><a href="freelancerorderview.php?id=<?php echo $neworders['orderid'];?>"><button class="btn btn-info">View</button></a> <a href="freelanceracceptorder.php?id=<?php echo $neworders['orderid'];?>"><button class="btn btn-primary">Accept</button> </a><button class="btn btn-warning">Decline</button></div>
</div>
<hr>
<?php } 
mysqli_close($con);?> 
</div>

<!-- pending -->
<div class="container pending" style="display:none">

<?php
$con=mysqli_connect("$servername","$username","$password","$dbname");
$query4 = "SELECT * FROM $tbl5 WHERE freelanceremail LIKE '%{$email}' and status LIKE '%{$pendingorder}'";
$result4=mysqli_query($con,$query4);
 while($pendingorders=mysqli_fetch_array($result4)){?>
 <hr>
  <div class="row">
    <div class="col-lg-6"><h4> Order by <?php echo $pendingorders['customeremail'];?>,ordered at <?php echo $pendingorders['time'];?></h4></div>
    <div class="col-lg-6"><a href="freelancerorderview.php?id=<?php echo $pendingorders['orderid'];?>"><button class="btn btn-info">View</button></a><a href="freelancerordercompleted.php?id=<?php echo $pendingorders['orderid'];?>" ><button class="btn btn-primary">Mark as done</button></a> </div>
  </div>
  <hr>
  <?php } 
mysqli_close($con);?> 
  

  
  


</div>
<!-- completed -->
<div class="container comp" style="display:none">

<?php
$con=mysqli_connect("$servername","$username","$password","$dbname");
$query5 = "SELECT * FROM $tbl5 WHERE freelanceremail LIKE '%{$email}' and status LIKE '%{$customercompleted}'";
$result5=mysqli_query($con,$query5);
 while($completedorders=mysqli_fetch_array($result5)){?>
 <hr>
  <div class="row">
    
    <div class="col-lg-6"><h4>Order by <?php echo $completedorders['customeremail'];?>,ordered at <?php echo $completedorders['time'];?></h4></div>
    <div class="col-lg-6"><<a href="freelancerorderview.php?id=<?php echo $completedorders['orderid'];?>"><button class="btn btn-info">View</button></a>   </div>
  </div><hr>
 
  <?php } 
mysqli_close($con);?> 
  

  
  


</div>


<script>
  $("#work").click(function(){
    $(".order").css("display","block")
    $(".comp,.pending").css("display","none")
  })
  $("#pend").click(function(){
    $(".pending").css("display","block")
    $(".comp,.order").css("display","none")
  })
  $("#done").click(function(){
    $(".comp").css("display","block")
    $(".pending,.order").css("display","none")
  })

</script>

<?php include("footer.php");?>


</body>
</html>


    
      
<?php }elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==1) { 
    ?>   <!DOCTYPE html>
    <html lang="en">
     <head>
      <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>HobbyHub</title>
       <link rel="stylesheet" href="css/bootstrap.min.css">
        <link
        rel="stylesheet"
       href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">    
       <link rel="stylesheet" href="homestyle.css">
       <link rel="stylesheet" href="static/fdashstyle.css">
       <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
      </head>
    <body>
      <?php include("header.php");?>
      <div class="container">
    <table>

        <td>
            <h4 style="margin-top: 2vw;">Hi  <b></b></h4>
            <div ><img class="profile-img"src="https://static1.squarespace.com/static/5283d33fe4b065af7e0f0f97/528ac1abe4b000f9c70bd010/5461c80ee4b0efbe94330465/1482514728236/YvesBehar-20141010-051.JPG?format=1500w" alt=""></div>
        </td>
        <td>
           
        </td>


    </table>
      
      <div class="container">
<div class="row mt-2">
<div class="col-lg-2">
<button id="work" class="btn btn-block btn-outline-warning">Present orders </button>

</div> 

<div class="col-lg-2">
  <button id="pend" class="btn btn-block btn-outline-warning">Order History</button>
  
  </div>

  
</div>


<div class="container order" style="display:none;">
<?php 
         include("connection.php");
         $neworder=0;
         $pendingorder=1;
         $freelancercompleted=2;
         $customercompleted=3;
         $declinedorder=4;
         $email=$_SESSION['email'];
         $con=mysqli_connect("$servername","$username","$password","$dbname");
$query1 = "SELECT * FROM $tbl5 WHERE customeremail LIKE '%{$email}' and status LIKE '%{$neworder}'";
$result1=mysqli_query($con,$query1);
 while($neworders=mysqli_fetch_array($result1)){ ?>

<hr>
<div class="row">
  <div class="col-lg-6"><h4>Ordered at <?php echo $neworders['time'];?></h4></div>
  <div class="col-lg-6"><a href=""><button class="btn btn-info">View</button> </a></div>
</div>
<?php };
mysqli_close($con);?>


</div>
<!-- pending -->
<div class="container pending" style="display:none;>

<?php 
         include("connection.php");
         
         $con=mysqli_connect("$servername","$username","$password","$dbname");
$query1 = "SELECT * FROM $tbl5 WHERE customeremail LIKE '%{$email}' and status LIKE '%{$freelancercompleted}'";
$result1=mysqli_query($con,$query1);
 while($orders=mysqli_fetch_array($result1)){?>
  <hr>
  <div class="row">
    <div class="col-lg-6"><h4>Ordered at <?php echo $orders['time'];?></h4></div>
    <div class="col-lg-6">
      <a href=""><button class="btn btn-info">View</button> </a>
      <a href="customerordercompleted.php?id=<?php echo $orders['orderid'];?>"><button class="btn btn-primary">Mark as Done</button> </a>
    </div>
  </div>
  <?php };
mysqli_close($con);?>
  
  
  
  
</div>
<!-- completed -->

<script>

  $("#work").click(function(){
    $(".order").css("display","block")
    $(".comp,.pending,.capsule2,.capsule3,.capsule1").css("display","none")
  })
  $("#pend").click(function(){
    $(".pending").css("display","block")
    $(".comp,.order,.capsule2,.capsule3,.capsule1").css("display","none")
  })
  


</script>
</div>
</div>
</div>
<?php include("footer.php");?>

</body>
</html>
<
<?php }elseif (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==2) { 
    ?>  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HobbyHub</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <linkrel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="homestyle.css">
    <link rel="stylesheet" href="fdashstyle.css">

    </head>
<body>
    <!-- css is same as of freelance Dbord -->
    <?php include("header.php");?>
      <!-- names -->
  

<div class="container">
<div class="row mt-2">
<div class="col-lg-2">
<button id="work" class="btn btn-block btn-outline-warning">New Orders <span class="badge badge-danger"></span></button>

</div> 

<div class="col-lg-2">
  <button id="pend" class="btn btn-block btn-outline-warning">Pending Orders<span class="badge badge-danger"></span></button>
  
  </div>

  <div class="col-lg-2">
    <button id="done" class="btn btn-block btn-outline-warning">Completed Orders</button>
    
    </div>
    <div class="col-lg-2">
        <button id="tab1" class="btn btn-block btn-outline-warning">New Services</button>
        
        </div>
        <div class="col-lg-2">
            <button id="tab2" class="btn btn-block btn-outline-warning">Services</button>
            
            </div>
            <div class="col-lg-2">
                <button id="tab3" class="btn btn-block btn-outline-warning">Freelancers</button>
                
            </div>
</div>
</div>

<div class="container order">
<?php 
include("connection.php");

$neworder=0;
$pendingorder=1;
$freelancercompleted=2;
$customercompleted=3;
$declinedorder=4;
$email=$_SESSION['email'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query2 = "SELECT * FROM $tbl5 WHERE status LIKE '%{$neworder}'";


$result2=mysqli_query($conn,$query2);



while($row2=mysqli_fetch_array($result2)){?><div class="row">
  <div class="col-lg-6"><h4>Ordered at <?php echo $row2['time'];?></h4></div>
  <div class="col-lg-6"><a href="adminorderview.php?id=<?php echo $row2['orderid'];?>"><button class="btn btn-info">View</button></a> </div>
</div>
<hr>


<?php } ;
mysqli_close($conn);?>

</div>
<!-- pending -->
<div class="container pending">

<?php 
         
         
         $con=mysqli_connect("$servername","$username","$password","$dbname");
$query10= "SELECT * FROM $tbl5 WHERE status LIKE '%{$pendingorder}'";
$result10=mysqli_query($con,$query10);
 while($orders=mysqli_fetch_array($result10)){?>
  <hr>
  <div class="row">
    <div class="col-lg-6"><h4>Ordered at <?php echo $orders['time'];?> by <?php echo $orders['customeremail'];?> to <?php echo $orders['freelanceremail'];?></h4></div>
    <div class="col-lg-6">
      <a href=""><a href="adminorderview.php?id=<?php echo $row2['orderid'];?>"><button class="btn btn-info">View</button></a></a>
      
    </div>
  </div>
  <?php };
mysqli_close($con);?>
  
  


</div>
<!-- completed -->
<div class="container comp">

<?php 
         
         
         $con=mysqli_connect("$servername","$username","$password","$dbname");
$query10= "SELECT * FROM $tbl5 WHERE status LIKE '%{$customercompleted}'";
$result10=mysqli_query($con,$query10);
 while($orders=mysqli_fetch_array($result10)){?>
  <hr>
  <div class="row">
    <div class="col-lg-6"><h4>Ordered at <?php echo $orders['time'];?> by <?php echo $orders['customeremail'];?> to <?php echo $orders['freelanceremail'];?></h4></div>
    <div class="col-lg-6">
      <a href="adminorderview.php?id=<?php echo $orders['orderid'];?>"><button class="btn btn-info">View</button></a> 
      
    </div>
  </div>
  <?php };
mysqli_close($con);?>
  
  


</div>
<!-- tb1 -->
<?php 
include("connection.php");
$tbl2="services";
$notcomplete=0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM $tbl2 WHERE servicestatus LIKE '%{$notcomplete}'";

$result=mysqli_query($conn,$query);



while($row=mysqli_fetch_array($result)){?>
    <div class="container capsule1" style="display:none;">
           <div class="col-lg-6" style="margin-top:100px;"><h5>New Service created by <?php echo $row['email'];?> in <?php echo $row['subcategory'];?> subcateogory of <?php echo $row['category'];?> category</h5></div>
           <div class="col-lg-6" style="margin-bottom:100px;">
                <a href="adminserviceview.php?id=<?php echo $row['id'];?>"><button class="btn btn-info">View</button> </a>
                <a href="adminserviceaccept.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary">Approve</button></a>
                <a href="adminservicedecline.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning">Decline</button></a>
            </div>
    
  
      </div>
<?php } ;
mysqli_close($conn);?>
  <!-- tab2 -->
<div class="container capsule2" style="display:none;height:auto;">
<?php 
include("connection.php");


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query20 = "SELECT * FROM $tbl6";

$result20=mysqli_query($conn,$query20);



while($row=mysqli_fetch_array($result20)){?>
<hr>
  
    <div class="col-lg-6"><h4> <?php echo $row['servicename'];?></h4></div>
    <div class="col-lg-6">
    <?php 
           
           if ($row['fstatus']==0) {
  
           ?>
            
               
                <a href="featservice.php?servicename=<?php echo $row['servicename'];?>"><button type="button" class="btn btn-dark" id="sign">Make featured</button></a>
         
          <?php } else{ ?>
             
             <a href="removefeatservice.php?servicename=<?php echo $row['servicename'];?>"><button type="button" class="btn btn-danger" id="sign">Remove from featured</button></a>

          <?php } ?>
    </div>

  
  
<?php };
mysqli_close($conn);?>
  <!-- tab -->

  </div>
  <div class="container capsule3" style="display:none;height:auto;">
<?php 
include("connection.php");


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM $tbl3";

$result=mysqli_query($conn,$query);



while($row=mysqli_fetch_array($result)){?>
   
           <div class="col-lg-6" style="margin-top:100px;"><h5><?php echo $row['fname']." ".$row['lname']."-".$row['email'];?></h5></div>
           <div class="col-lg-6" style="margin-bottom:100px;">
           <?php 
           
           if ($row['fstatus']==0) {
  
           ?>
            
               
                <a href="makefreelancerfeatured.php?id=<?php echo $row['freelancerid'];?>"><button type="button" class="btn btn-dark" id="sign">Make featured</button></a>
         
          <?php } else{ ?>
             
             <a href="removefreelancerfeatured.php?id=<?php echo $row['freelancerid'];?>"><button type="button" class="btn btn-danger" id="sign">Remove from featured</button></a>

          <?php } ?>
                
                
            </div>
    
  
      
<?php } ;
mysqli_close($conn);?>

</div>
 

<script>

  $("#work").click(function(){
    $(".order").css("display","block")
    $(".comp,.pending,.capsule2,.capsule3,.capsule1").css("display","none")
  })
  $("#pend").click(function(){
    $(".pending").css("display","block")
    $(".comp,.order,.capsule2,.capsule3,.capsule1").css("display","none")
  })
  $("#done").click(function(){
    $(".comp").css("display","block")
    $(".pending,.order,.capsule2,.capsule3,.capsule1").css("display","none")
  })
  $("#tab1").click(function(){
    $(".capsule1").css("display","block")
    $(".pending,.order,.capsule2,.capsule3,.comp").css("display","none")
  })
  $("#tab2").click(function(){
    $(".capsule2").css("display","block")
    $(".pending,.order,.capsule1,.capsule3,.comp").css("display","none")
  })
  $("#tab3").click(function(){
    $(".capsule3").css("display","block")
    $(".pending,.order,.capsule2,.capsule1,.comp").css("display","none")
  })


</script>

<?php include("footer.php");?>
</body>
</html>
<?php
}

else{header("Location:index.php");}?> 
  