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
<link rel="stylesheet" href="fdashstyle.css">



</head>

<?php 
session_start();
include('header.php');
include("razorpay-php/Razorpay.php");

use Razorpay\Api\Api;



$serviceid=$_GET['serviceid'];
$femail=$_GET['femail'];
$instruction=$_POST['instruction'];
$cname='Mr';
$cemail=$_SESSION['email'];
$charge=$_POST['charge'];
$PAY_AMT=($charge/2)*100;

$keyId='rzp_live_QwNaiw8UXWZ7Cn';
$secretKey='qF7S7b5Fo5p8l29UTF6z59ei';
$api=new Api($keyId,$secretKey);


$order=$api->order->create(array(
    'receipt' => rand(1000,9999).'ORD',
    'amount'=>$PAY_AMT,
    'payment_capture' =>1,
    'currency'=>'INR',


    )
);


?>

<form action="createorder.php" method="POST">
    <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $keyId;?>"
    data-amount="<?php echo $order->amount;?>"
    data-currency="INR"
    data-order_id="<?php echo $order->id;?>"
    data-buttontext="Proceed to pay"
    data-description=""
    data-image="images/logo.png"
    data-name="Hobbyhub"
    data-prefill.name="<?php echo $cname;?>"
    data-prefill.email="<?php echo $cemail;?>"
    data-theme.color="#f0a43c"

    >
    </script>
    <input type="hidden" custom="Hidden Element" name="hidden">
    <input type="text" style="display:none" value="<?php echo $serviceid;?>" name="serviceid">
    <input type="text" style="display:none" value="<?php echo $femail;?>" name="femail">
    <input type="text" style="display:none" value="<?php echo $instruction;?>" name="instruction">
    <input type="text" style="display:none" value="<?php echo $PAY_AMT;?>" name="paid">
    

    

   
</form>

   </body>
</html>