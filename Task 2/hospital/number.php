<?php
$title = 'Number Page';

include './layouts/header.php';
include("middlewares/auth.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST) {
    if (!empty($_POST['mobile-number'])) {
        if (strlen($_POST['mobile-number']) == 11) {
            $_SESSION['number'] = $_POST['mobile-number'];
            header('location:review.php');
            die;
        } else {
            $messageError = "your Mobile Number Must be 11 Digit";
        }
    } else {
        $messageError = "please Enter Your correct Mobile Number!";
    }
}
?>


    <div class="container py-5">
        <h3 class=" text-success">NTI Hospitals</h3>
        <div class="card w-50 m-auto p-3" style="background-color:transparent;border-color:#5f93ad;">
            <form action="" method="post">
                <div class="my-3 text-center">
                    <label for="number" class="form-label text-dark h1">Enter your Mobile Number</label>
                    <input type="number" class="form-control" name="mobile-number" id="number" value="<?= $_POST['mobile-number'] ?? "" ?>">
                    <small id="emailHelpId" class="fs-5 fw-bold text-danger"><?= $messageError ?? "" ?></small>
                </div>
                <div class="text-center">
                    <button class="btn btn-outline-dark w-27 my-2">Confirm</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php
include './layouts/footer.php';
include './layouts/scripts.php';

?>