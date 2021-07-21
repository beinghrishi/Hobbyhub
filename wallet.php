<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
    if($_SESSION['usertype']==0){?>
<?php} 
else{ header("Location:index.php");
}?>

<?php
}
}
else{header("Location:index.php");
}?>

    