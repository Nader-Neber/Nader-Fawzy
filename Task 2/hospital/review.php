<?php
$title = 'Review Page';

include './layouts/header.php';
include("middlewares/guest.php");
include './layouts/navbar.php';

$content = [
    'Questions' => [
        'Are you satisfied with the level of cleanliness',
        'Are you satisfied with the service prices',
        'Are you satisfied with the nursing service',
        'Are you satisfied with the level of the doctor',
        'Are you satisfied with the calmness in the hospital',
    ]
];
// $rates=['Bad','Good','Very Good','Excellent'];
$_SESSION['rates']=[];
for ($f=1; $f <= count($content['Questions']); $f++) { 
  if(isset($_POST["q{$f}"])){
      array_push($_SESSION['rates'],$_POST["q{$f}"]);
      if(count($_SESSION['rates'])===count($content['Questions'])){
        header("location:result.php");die;
      }
      // else{
      //   $errorMessage="You are forget to Enter some Answers";
// }
    }elseif(!isset($_POST["q{$f}"])){ 
      $errorMessage="You have to Enter options";
    }
}

// echo $_SESSION['number'];
// if(empty($content)){
//     return false;
// }
// print_r($_POST);

?>
<div class="container my-5">
  <form action="" method="post">
    <div class="row justify-content-center align-items-center">
      <div class="col-6">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
              <tr>
                <?php foreach ($content as $property => $value) { ?>
                <th class="text-center"><?=$property?></th>
                <?php  } ?>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php foreach ($content as $contentKey => $contentValues) {
                    foreach ($contentValues as $contentValue) { ?>
              <tr>
                <td><?= $contentValue?></td>
                <?php  } ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-6">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
              <tr>
                <th class="text-center">Rate</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php foreach ($content as $contentKey => $contentValues) {
                                for ($i = 1; $i <= count($contentValues);$i++) { ?>
              <tr>
                <td>
                  <div class="d-flex justify-content-between">
                    <input class="form-check-input" type="radio" name="q<?= $i ?>" value="0">
                    <label class="form-check-label" for="bad">Bad</label>
                    <input class="form-check-input" type="radio" name="q<?= $i ?>" value="3">
                    <label class="form-check-label" for="good">Good</label>
                    <input class="form-check-input" type="radio" name="q<?= $i ?>" value="5">
                    <label class="form-check-label" for="veryGood">Very Good</label>
                    <input class="form-check-input" type="radio" name="q<?= $i ?>" value="10">
                    <label class="form-check-label" for="excellent">Excellent</label>
                </td>
                <?php  } ?>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <p class="text-danger text-center"><?=$errorMessage ?? "" ?></p>
    <button class="btn btn-primary d-block m-auto" type="submit">Send Reviews</button>
  </form>
</div>



<?php
// unset($_SESSION['rates']);
// print_r($_SESSION['rates']);
include './layouts/footer.php';
include './layouts/scripts.php';

?>