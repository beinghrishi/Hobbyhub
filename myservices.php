<?php 

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
    if($_SESSION['usertype']==0){?>
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
    <link rel="stylesheet" href="myse.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">

  </head>
         
         
         
        <body>
    <?php include("header.php");?>

      <h1 style="text-align: center; font-size: 7vh;margin-top:3vh ;">Hi!  <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>  </h1> 

     
 
   <h1 style="text-align: center; color:goldenrod" >your services</h1>
       <div class="service1">
           <div class="btn"  data-toggle="modal" data-target="#exampleModalCenter" id="newCreate"><h4 style="text-align: center;margin:auto;">Create services</h4> <h1 style="font-size:6vw;">+</h1>
          </div>
          <?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hobbyhub";
$tbl2="services";
$approved=1;
$notapproved=0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM $tbl2 WHERE servicestatus LIKE '%{$approved}' and email LIKE '%{$_SESSION['email']}'";

$result=mysqli_query($conn,$query);



while($row=mysqli_fetch_array($result)){?> 
        <div class="create" style="background-image:url('images/services/<?php echo $row['id'];?>.jpg');background-size:cover;">      <a href="viewservice.php?id=<?php echo $row['id'];?>"><button class="btn btn-info ">View</button></a></div>
           

        <?php } ;
?>




       </div>


 
       <div class="orders">
        <h3 style="text-align: ;">Services still to be approved by Hobbyhub</h3>
        <div class="service1">
           <?php 
           $query2 = "SELECT * FROM $tbl2 WHERE servicestatus LIKE '%{$notapproved}' and email LIKE '%{$_SESSION['email']}'";

          $result2=mysqli_query($conn,$query2);


         
while($row2=mysqli_fetch_array($result2)){?> 
        
        <div class="create" style="background-image:url('images/services/<?php echo $row2['id'];?>.jpg');background-size:cover;">      
          <a href="viewservice.php?id=<?php echo $row2['id'];?>">
              <button class="btn btn-info ">
                View

              </button>
          </a>
        </div>


        <?php } ;
mysqli_close($conn);?>

</div>






       </div>







      <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">New Service</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="createservice.php"  enctype="multipart/form-data">
                <div class="form-group">
                  <label for="servicetitle">Title</label>
                  <input type="text" class="form-control" id="servicetitle" aria-describedby="e" placeholder="Write something creative" name="title">
        
                </div>
                <div class="form-group">
                  <label for="servicecategory">Category</label>
                  <select id="category" name="category" class="form-control mb-2">
                        <option value="any">Category</option>
                        <option value="art">Art</option>
                        <option value="crafts">Crafts</option>
                        <option value="bakery">Bakery</option>
                        <option value="fashion">Fashion</option>
                        <option value="photography">Photography</option>
                        <option value="make_up_artist">Make Up Artist</option>
                        <option value="gift_makers">Gift Makers</option>
                      </select>
        
                </div>
                <div class="form-group">
                  <label for="servicesubcategory">Subcategory</label>
                  <select id="subcategory" name="subcategory" class="form-control mb-2">
                    <option value="any">sub-Category</option>
                        <option value="art">Art</option>
                        <option value="crafts">Crafts</option>
                        <option value="bakery">Bakery</option>
                        <option value="fashion">Fashion</option>
                        <option value="photography">Photography</option>
                        <option value="make_up_artist">Make Up Artist</option>
                        <option value="gift_makers">Gift Makers</option>
                        
                      </select>
        
                </div>
                
                <div class="form-group">
                  <label for="servicedescription">Description</label>
                  <textarea class="form-control" id="servicedescription" aria-describedby="e" placeholder="" name="description">
                 </textarea>
                </div>
                <div class="form-group">
                  <label for="servicelocation">Location</label>
                  <select id="location" name="location" class="form-control mb-2">
                        <option value="any">Location</option>
                        <option value="any">PAN India</option>
                        <option value="Guwahati">Guwahati</option>
                        
                      </select>
                </div>
                <div class="form-group">
                  <label for="image">Thumbnail(Better thumbnail attracts more customers)</label>
                  <small>Select image to upload(only jpg images are accepted)</small>
                  <input type="file" class="form-control" id="image" placeholder="" name="image">
                </div>
                <div class="form-group">
                  <label for="servicecost">Charge(in Rs.)</label>
                  <input type="number" class="form-control" id="servicecost" placeholder="" name="cost">
                </div>
                <button type="submit" class="btn btn-info">Create</button>
              </form>
        </div>
      </div>
    </div>
  </div>






  <script>
  $(document).ready(function () {
    $("#category").change(function () {
        var val = $(this).val();
        if (val == "art") {
            $("#subcategory").html("<option value='illustration'>illustration</option><option value='portraitart'>Portrait art</option><option value='caricature'>Caricacature</option><option value='mandala'>Mandala</option><option value='line-art'>Line art</option><option value='sketching'>sketching</option><option value='calligraphy'>Calligraphy</option><option value='painting'>painting</option><option value='mix-media'>mix media</option><option value='ethnic art'>Ethnic art</option><option value='contemporary art'>contemporary art</option><option value='doodle'>Doodle</option><option value='grafitti'>Grafitti</option><option value=''>any</option>");
        } else if (val == "crafts") {
            $("#subcategory").html("<option value='print making'>Print making</option><option value='ceramic art'>Ceramic art</option><option value='home decoration'>Home decoration</option><option value='macrame'>macrame</option><option value='pottery'>Pottery</option><option value='bambooandcrane'>Bamboo and Crane</option><option value=''>any</option>");
        } else if (val == "foodservices") {
            $("#subcategory").html("<option value='indian'>indian</option><option value='chinese'>chinese</option><option value='southindian'>south indian</option><option value='continental'>continental</option><option value='italian'>italian</option><option value='icecream'>ice cream</option><option value='sweets'>sweets</option><option value=''>any</option>");
        } else if (val == "bakery") {
            $("#subcategory").html("<option value='cakes'>cakes</option><option value='cookies'>cookies</option><option value='dougnut'>Dougnut</option><option value='pies-cupcakes'>pies cupcakes</option><option value=''>any</option>");
        }
        else if (val == "fashion") {
            $("#subcategory").html("<option value='clothing'>clothing</option><option value='accessories'>accessories</option><option value=''>any</option>");
        }
        else if (val == "photography") {
            $("#subcategory").html("<option value='photo editing'>Photo editing</option><option value='videography'>videography</option><option value='video editing'>Video editing</option><option value='photography'>photography</option><option value=''>any</option>");
        }
        else if (val == "make_up_artist" || val=="gift_makers") {
            $("#subcategory").html("<option value=''></option>");
        }
    });
});</script>

</body>
</html>


    
      
    <?php} 
else{ echo "You don't have permission to access this page";?>

<?php
}
}
else{header("Location:index.php");}?>
  