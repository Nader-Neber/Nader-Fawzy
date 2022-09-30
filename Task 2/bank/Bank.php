<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) {
  $user = $_POST['user'];
  $amount = $_POST['amount'];
  $year = $_POST['year'];
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

  <div class="container mt-5">
    <div class="row">
      <div class="col">

        <form method="post" style="width:50%;">


          <div class="form-group">
            <label for="exampleInputEmail1">Enter User Name</label>
            <input type="text" class="form-control" name="user" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">The Loan Amount</label>
            <input type="int" class="form-control" name="amount" id="exampleInputPassword1">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">The Loan Year</label>
            <input type="int" class="form-control" name="year" id="exampleInputPassword1">
          </div>

          <button type="submit" class="btn btn-success">Calculate</button>
        </form>
      </div>
    </div>
  </div>



  <div class="container">
    <div class="row">
      <div class="col">

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">User Name</th>
              <th scope="col">Interest Rate</th>
              <th scope="col">Loan after interst</th>
              <th scope="col">monthly</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST) { ?>
              <tr>
                <th scope="row"><?php echo $user ?></th>

                <td><?php if ($year <= 3) {
                      echo $rate = $amount * (10 / 100);
                    } else if ($year > 3) {
                      echo $rate = $amount * (15 / 100);
                    } else {
                      echo "no rate";
                    } ?></td>
                <td><?php echo $total = $amount + ($rate * $year) ?></td>
                <td>
                  <?php
                  $yearly = $total / $year;
                  echo  $monthly = $yearly / 12;
                  ?></td>
              </tr>

            <?php    } ?>

          </tbody>
        </table>


      </div>
    </div>
  </div>

  <form action="/action_page.php">
    <input type="checkbox">

  </form>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>