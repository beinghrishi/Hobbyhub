
<?php 
include("connect.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
   header("Location:home.php");
   }
else {
    ?>
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
<link rel="stylesheet" href="serv.css">  
<link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("header.php") ?>
    

    <div id="searcharea" style="background-image:url('static/rec.png')">
        <div id="searchbar">
            <form method="GET" action="search.php">
                <div class="form-row align-items-center">
                  <div class="col-auto">
                      <select id="location" name="location" class="form-control mb-2">
                        <option value="ghy">Location</option>
                        <option value="pan">PAN India</option>
                        <option value="ghy">Guwahati</option>
                        
                      </select>
                  </div>
                  <div class="col-auto">
                    <select id="category" name="category" class="form-control mb-2">
                        <option value="any">Category</option>
                        <option value="art">Art</option>
                        <option value="crafts">Crafts</option>
                        <option value="bakery">Bakery</option>
                        <option value="fashion">Fashion</option>
                        <option value="Food-Service">Food Service</option>
                        <option value="photography">Photography</option>
                        <option value="make-up-artist">Make Up Artist</option>
                        <option value="gift_makers">Gift Makers</option>
                      </select>
                    </div>
                  <div class="col-auto">
                    <select id="subcategory" name="subcategory" class="form-control mb-2">
                    <option value="any">sub-Category</option>
                        <option value="art">Art</option>
                        <option value="crafts">Crafts</option>
                        <option value="bakery">Bakery</option>
                        <option value="fashion">Fashion</option>
                        <option value="photography">Photography</option>
                        <option value="make_up_artist">Make Up Artist</option>
                        <option value="gift-makers">Gift Makers</option>
                        
                      </select>
                  </div>
                  <div style="margin-left: 1vw;" class="col-auto ser_btn">
                    <button  type="submit" class="btn btn-warning mb-2 "><i  class="fa fa-search fa-2x animate__animated animate__infinite animate__pulse" aria-hidden="true"></i></button>
                  </div>
                </div>
              </form>

        </div>

    </div>
    <h1 class="bigHeading">Featured Freelancers</h1>

    <div style="margin:auto; padding:5%" class="main_box">
    <div class="card-deck" style="max-width:310px;">
    <?php 
include("connection.php");


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query20 = "SELECT * FROM freelancers WHERE fstatus LIKE 1";

$result20=mysqli_query($conn,$query20);



while($row=mysqli_fetch_array($result20)){?>
    <div class="card">
    <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTfPQDc8hLUPVKQjWNuCctUtKKTc8IW0sQSkw&usqp=CAU" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['fname'].' '.$row['lname'];?></h5>
      
     
    </div>
  </div>
 
<?php } ?>
</div>
     
    
     
    </div>
    <h1 class="bigHeading">Popular services</h1>

    <div class="main_box">
    <div class="container" >
          <div class="row" >
          <?php 
include("connection.php");


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query21 = "SELECT * FROM allservices WHERE fstatus LIKE 1";

$result21=mysqli_query($conn,$query21);



while($row=mysqli_fetch_array($result21)){?>
              <div class="col-lg-3 ser  " style="background-color:white"><div class="container" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicesart.php"><i class="<?php echo $row['image']?>"></a></i><h5><?php echo $row['servicename'];?></h5>

            </div>
      </div>
      <?php }?>
          </div>
      </div>
     
    </div>

    <!--  -->
 

    <!-- end -->
  
<!-- about us -->
<h1 id="about" style="text-align: center; margin:10% 0 5% 0">About us</h1>
<div class="container">
<div class="row ">
  <div class="col-lg-6 abt_content">
    <p class="but">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, 
    quis nostrum exercitationem ullam corporis suscipit laboriosam,
     nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit 
     qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
  </p></div>
     <div class="col-lg-6 abt_content">
       <div class="imageBox"></div>
</div>
    </div>
    <!-- services -->
    <h1 style="text-align: center; margin:10% 0 5% 0">Services</h1>

    <div class="container" >
          <div class="row" >
              <div class="col-lg-3 ser  " style="background-color:white"><div class="cotainer" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicesart.php"><i class="fas fa-palette"></a></i><h5>Art</h5>

</div></div>
              <div class="col-lg-3 ser  "  style="background-color:white">
              <div class="cotainer" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicescraft.php"><i class="fab fa-firstdraft"></i></a>

<h5>Craft</h5>

</div>
            </div>
              <div class="col-lg-3 ser  "  style="background-color:white">
              <div class="cotainer" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicesfood.php"><i class="fas fa-utensils"></i></a>

<h5>Food</h5>

</div></div>
              <div class="col-lg-3 ser  "  style="background-color:white">
              <div class="cotainer" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicesbakery.php"><i class="fas fa-birthday-cake"></i></a>

<h5>Bakery</h5>

</div></div>
              <div class="col-lg-3 ser  "  style="background-color:white">
              <div class="cotainer" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicesfashion.php"><i class="fas fa-tshirt"></i></a>



<h5>Fashion</h5>

</div></div>
              <div class="col-lg-3 ser  "  style="background-color:white">
              <div class="cotainer" style="font-size:7vw;text-align:center;color:#ED9D2B;"><a href="servicesphotography.php"><i class="fas fa-camera-retro"></i></a>

<h5>Photography</h5>

</div></div>
          </div>
      </div>
    <!-- testimonials -->
    <h1 style="text-align: center; margin:10% 0 5% 0">testimonials</h1>
    <div id="carouselExample" class="carousel slide testi" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
         
          <h5>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h5>
        </div>
        <div class="carousel-item">
          <h5>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h5>

        </div>
        <div class="carousel-item">
          <h5>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h5>

        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>










  <!-- footer -->
  
  
  
</div>
<script>
// dropdown

$(document).ready(function () {
    $("#category").change(function () {
        var val = $(this).val();
        if (val == "art") {
            $("#subcategory").html("<option value='illustration'>illustration</option><option value='portraitart'>Portrait art</option><option value='caricature'>Caricacature</option><option value='mandala'>Mandala</option><option value='line-art'>Line art</option><option value='sketching'>sketching</option><option value='calligraphy'>Calligraphy</option><option value='painting'>painting</option><option value='mix-media'>mix media</option><option value='ethnic art'>Ethnic art</option><option value='contemporary art'>contemporary art</option><option value='doodle'>Doodle</option><option value='grafitti'>Grafitti</option><option value=''>any</option>");
        } else if (val == "crafts") {
            $("#subcategory").html("<option value='print making'>Print making</option><option value='ceramic art'>Ceramic art</option><option value='home decoration'>Home decoration</option><option value='macrame'>macrame</option><option value='pottery'>Pottery</option><option value='bambooandcrane'>Bamboo and Crane</option><option value=''>any</option>");
        } else if (val == "Food-Service") {
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
        else if (val == "make-up-artist" || val=="gift-makers") {
            $("#subcategory").html("<option value=''></option>");
        }
    });
});
// Pan india delivery
$(document).ready(function(){
$("#location").change(function(){
var loc=$(this).val();
if(loc=="pan"){
  $("#category").html("<option>category</option><option>art</option><option>crafts</option><option>fashion</option><option>gift-makers</option>")
}else if(loc=="ghy"){
  $("#category").html("<option>category</option><option>art</option><option>crafts</option><option>Food-Service</option><option>fashion</option><option>gift-makers</option><option>bakery</option><option>make-up-artist</option><option>photography</option>")
}


})

  
})


// end



  $("#first-choice").change(function() {

var $dropdown = $(this);

$.getJSON("jsondata/data.json", function(data) {

  var key = $dropdown.val();
  var vals = [];
            
  switch(key) {
    case 'beverages':
      vals = data.beverages.split(",");
      break;
    case 'snacks':
      vals = data.snacks.split(",");
      break;
    case 'base':
      vals = ['Please choose from above'];
  }
  
  var $secondChoice = $("#second-choice");
  $secondChoice.empty();
  $.each(vals, function(index, value) {
    $secondChoice.append("<option>" + value + "</option>");
  });

});
});
</script>
<?php include('footer.php')?>
</body>
</html>




<?php } ?>