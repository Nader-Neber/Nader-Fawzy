<?php
$total="";
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST){

  $num1 = $_POST['first_number'];
  $num2 = $_POST['second_number'];
  $operation = $_POST['operation'];

  if(isset($_POST['Result'])){
    if($operation == "plus")
    {
    $total = $num1 + $num2; 
    }
    else if($operation == "minus")
    {
    $total = $num1 - $num2; 
    }
    else if($operation == "multi")
    {
    $total = $num1 * $num2; 
    }
    else if($operation == "division")
    {
    $total = $num1 / $num2; 
    }
    else if($operation == 'moduls'){
      echo $num1 % $num2 ;
    }
   
  }
  }
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
                <h1 style="color:green">Calculater </h1>
            </div>
            <div class="col-4 offset-4">
                <form method="post">
                    <div class="form-group">
                      <label for="first_number" style="color:red">1st Number</label>
                      <input type="text" name="first_number" id="first_number"> <br>
                      <select name="operation">
                          <option value="plus">+</option>
                          <option value="minus">-</option>
                          <option value="multi">*</option>
                          <option value="division">/</option>
                          <option value="moduls">%</option>
                     </select> <br>
                      <label for="second_number" style="color:red">2nd Number</label>
                      <input type="text" name="second_number" id="second_number"> <br>
                      <small id="helpId" class="text-muted">please enter 2 numbers to calculation</small>

                    </div>
                    <button class="btn btn-outline-danger form-control my-3" style="color:blue" name="Result"> Result </button>
                  
                </form>
                <?php 
                echo " the result = ". $total ;
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
