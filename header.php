<nav class="navbar  navbar-expand-lg navbar-light bg-light" id="navbar">
        <a class="navbar-brand" href="index.php" id="logo"> <img class="log" src="images/logo.png" alt="">  </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
              </li>
          </ul>
          <span class="navbar-text">
           <?php 
           
           if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  
           ?>
            
                <!--Profile picture and logout button-->
                <img src="images/profile.jpg" class="rounded-circle" alt="profilepic" style="height:3.5vw;width:3.5vw;">
                <a href="logout.php"><button type="button" class="btn btn-light" id="sign">Logout</button></a>
         
          <?php } else{ ?>
             <button type="button" class="btn btn-warning" style="color: black;" id="join">Join</button>
             <button type="button" class="btn btn-light" id="sign">Sign In</button>

          <?php } ?>
          </span>
        </div>
      </nav>
<!--Modal-->
<div id="myModal" class="modal">

    
  <div class="modal-content first_Modal ">
      <div class="modal-inside new">
         <div style="margin-bottom:2vw"> <span class="close"><i class="fas fa-times-circle  fa-2x"></i></span></div>

      <button type="button" class="btn btn-warning hire "  style="color: black;" id="browse_more">Hire Freelancers </button><br>
      <button type="button" class="btn btn-warning work"  style="color: black;" id="browse_more">Work as Freelancer </button>
      
    
      
      </div>
      
    
  </div>
    <!-- register modal -->
  <div class="modal-content  registered ">
    <div class="modal-inside ">
      <form class="container" method="POST" action="newfreelancer.php">
        <h1 style="text-align: center;">Register as a Freelancer</h1>
       
        <div class="form-row">
    <div class="col">
    <label for="exampleInputEmail1"><b>First Name</b></label>
      <input type="email" class="form-control" placeholder="First name">
    </div>
    <div class="col">
    <label for="exampleInputEmail1"><b>Last Name</b></label>
      <input type="email" class="form-control" placeholder="Last name">
    </div>
  </div>
        <div class="form-group">
          
          <label for="exampleInputEmail1"><b>Email address</b></label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          
          <label for="exampleInputEmail1"><b>Mobile no</b></label>
          <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="phone">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Re-enter Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>      
        
     
    <button type="button" class="btn btn-outline-primary cancel" id="browse_more">Cancel </button>
    <button type="submit" class="btn btn-primary register" id="browse_more">Register </button>
  </form>
    
    
    
    </div>

</div>
<!-- customer modal -->
<div class="modal-content  customer">
  <div class="modal-inside">
    <form class="contaier" method="POST" action="newcustomer.php">
    <div class="form-group">
          <h1 style="text-align: center;">Hire Freelancer</h1>
          <div class="form-row">
    <div class="col">
    <label for="exampleInputEmail1"><b>First Name</b></label>
      <input type="email" class="form-control" placeholder="First name">
    </div>
    <div class="col">
    <label for="exampleInputEmail1"><b>Last Name</b></label>
      <input type="email" class="form-control" placeholder="Last name">
    </div>
  </div>
      <label for="exampleInputEmail1"><b>Email address</b></label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='email'>
    </div>
    <div class="form-group">
      
      <label for="exampleInputEmail1"><b>Mobile no</b></label>
      <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name='phone'>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='pass'>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Re-enter Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div> 

  <button type="button" class="btn btn-outline-primary cancel" id="browse_more">Cancel </button>
  <button type="submit" class="btn btn-primary continue" id="browse_more">Register as Customer </button>
</form>

  </div>

</div></div>
<!-- upload modal -->

<div id="myModal1" class="modal">
<form method="POST" action="login.php">
   <div class="modal-content  sign_in">
      <div style="margin-bottom:2vw"> <span class="close" id="close_signin"><i class="fas fa-times-circle fa-2x"></i></span></div>
      <div class="modal-inside">

        <form method="POST" action="login.php">
           <div class="form-group">
            <h1 style="text-align: center;">Login</h1>
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>   

        <button style="margin-left:auto ;"  type="submit" class="btn btn-primary btn-block continue" id="browse_more"><h5 style="color: white;">Log IN </h5></button>
      </form>
  
      </div>
    </div></div>
  
  </div></form></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous"></script>
<script>
  
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("join");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  // registration
  $(".work").click(function(){
    $(".registered").css("display","block")
    $(".first_Modal").css("display","none")
})
// cancel redirect to first modal
$(".cancel").click(function(){
    $(".registered").css("display","none")
    $(".first_Modal").css("display","block")
    $(".customer").css("display","none")
 
})
// customer modal appears
$(".hire").click(function(){
    $(".customer").css("display","block")
    $(".first_Modal").css("display","none")
    $(".registered").css("display","none")
})

// sign in modal
$("#sign").click(function(){
 
    $(".sign_in").css("display","block");
    $("#myModal1").css("display","block");


  
    $(".sign_in").css("display","")
  
})
$("#close_signin").click(function(){
  $(".sign_in").css("display","none");
    $("#myModal1").css("display","none");

})

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == myModal) {
      modal.style.display = "none";
    }
  }
 
window.onclick = function(event) {
    if (event.target == myModal1) {
      myModal1.style.display = "none";
    }
  }
  // scroll animation
  $(document).ready(function(){
$(".abt_content").waypoint(function(direction){
  $(".abt_content").addClass('animate__animated animate__zoomIn')
},{
  offset:'70%'
}

)
$(".serv").waypoint(function(direction){
  $(".serv").addClass('animate__animated animate__rollIn')
},{
  offset:'70%'
}


)
$(".testi").waypoint(function(direction){
  $(".testi").addClass('animate__animated animate__slideInLeft')
},{
  offset:'70%'
}

)

  })
 
  </script>