<?php

if (isset($_SESSION['number'])) {
    header("location:review.php");die;
}