<?php 

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['usertype']==2) { 
    ?>
    <?php 
   
    include("connection.php");
    $tbl2="services";
    $serviceid=$_GET['id'];
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $query = "SELECT * FROM $tbl2 WHERE id LIKE '%{$serviceid}'";
    
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $title=$row['title'];
    $email=$row['email'];
    $description=$row['description'];
    $charges=$row['cost'];
    $category=$row['category'];
    $subcategory=$row['subcategory'];
    


    
    ?>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hobbyhub</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fdashstyle.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">  
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
    </head>
    <?php include("header.php");?>
    <body>
     <a href="index.php"><h5  style="margin-left: 4vw;">&#8592 Back to dashboard  </h5></a>
    <div class="row">
        <div class="col-lg-6"><h1 style="margin:4vw;" ><?php echo $title;?></h1>
        <small style="font-size:20px ;">New service by <?php echo $email;?></small>
        
        <img style="margin-left:4vw;" class="img-fluid" src="images/services/<?php echo $serviceid;?>.jpg" alt="">    
        
        
        
        
        
        
        </div>
        <div class="col-lg-6">
        
            <h3 style="margin-top:4vw;" >Description
                <span class="badge badge-secondary"><?php echo $category;?></span> <span class="badge badge-warning"><?php echo $subcategory;?></span>
        </h3>
        
          <p>
           <?php echo $description;?></p>
            <h3>Minimum price charged by the freelancer</h3>
            <div class="charges"><?php echo $charges;?></div>
            <div class="container11">
            <a href="adminserviceaccept.php?id=<?php echo $serviceid;?>"><button class="btn btn-primary">Approve</button></a>
                <a href="adminservicedecline.php?id=<?php echo $serviceid;?>"><button class="btn btn-warning">Decline</button></a>
    
    
    
            
        </div>
    </div>
    
        
    </body>
    </html>
<?php }
else{header("Location:index.php");}