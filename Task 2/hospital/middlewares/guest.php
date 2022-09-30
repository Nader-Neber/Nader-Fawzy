<?php

if (!isset($_SESSION['number'])) {
    header("location:number.php");die;
}