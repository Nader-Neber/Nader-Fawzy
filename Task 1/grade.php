<?php
$percentage ="";
$grade ="";
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST){

    $first_subjects   = $_POST['first_subjects'];
    $second_subjects  = $_POST['second_subjects'];
    $third_subjects   = $_POST['third_subjects'];
    $fourth_subjects  = $_POST['fourth_subjects'];
    $fifth_subjects   = $_POST['fifth_subjects'];
    
if(isset($_POST['Result'])){

    $total = $first_subjects + $second_subjects + $third_subjects + $fourth_subjects + $fifth_subjects;
    $average = $total / 5.0;
    $percentage = ($total / 500.0) * 100;
    
    
    if ($average >= 90 && $average <= 100)
        $grade = "A";
    else if ($average >= 80 && $average < 90)
        $grade = "B";
    else if ($average >= 70 && $average < 80)
        $grade = "C";
    else if ($average >= 60 && $average < 70)
        $grade = "D";
    else if ($average >= 40 && $average < 60)
        $grade = "E";
    else
        $grade = "F";

}};
      
    
    
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-danger my-5">
                <h1>input marks of five subjects</h1>
            </div>
            <div class="col-4 offset-4">
                <form action="grade.php" method="post">
                    <div class="form-group">
                      <label for="first_subjects">Input Physics Marks</label>
                      <input type="text" name="first_subjects" id="first_subjects" class="form-control" placeholder="" aria-describedby="helpId">
                      <br>
                      <label for="second_subjects">Input Chemistry Marks</label>
                      <input type="text" name="second_subjects" id="second_subjects" class="form-control" placeholder="" aria-describedby="helpId">
                      <br>
                      <label for="third_subjects">Input Biology Marks</label>
                      <input type="text" name="third_subjects" id="third_subjects" class="form-control" placeholder="" aria-describedby="helpId">
                      <br>
                      <label for="fourth_subjects">Input Mathematics Marks</label>
                      <input type="text" name="fourth_subjects" id="fourth_subjects" class="form-control" placeholder="" aria-describedby="helpId">
                      <br>
                      <label for="fifth_subjects">Input Computer Marks</label>
                      <input type="text" name="fifth_subjects" id="fifth_subjects" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <button class="btn btn-outline-danger form-control my-3" style="color:blue" name="Result"> Result </button>
                </form>
   <?php
         echo "The Percentage    = " . $percentage . "%<br>";
         echo "The Grade         = " . $grade . "<br>";
   ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>