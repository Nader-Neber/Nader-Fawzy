<?php
$title = 'Result Page';

include './layouts/header.php';
include("middlewares/guest.php");
include './layouts/navbar.php';


// echo $_SESSION['number'];
// print_r($_SESSION['rates']) ;
$total=0;
foreach ($_SESSION['rates'] as $value) {
    $total+=$value;
}
// echo $total;


?>
<div class="container my-5">
    <div class="w-50 text-center m-auto">
        <?php
        if($total >= 25){$message="Thanks!"?>
        <div class="alert alert-success py-5"><?=$message?></div>
        <?php }else{  $message="We will call you later on this phone : {$_SESSION['number']}";  ?>
        <div class="alert alert-danger py-5"><?=$message?></div>
        <?php } ?>
    </div>
</div>










<?php
include './layouts/footer.php';
include './layouts/scripts.php';
unset($_SESSION['number']);

?>