<?php
// allow authenticated
// prevent guests


if (isset($_SESSION['number'])) {
    header("location:review.php");die;
}