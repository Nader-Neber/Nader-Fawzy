<?php
// allow guests
// prevent authenticated 
if (!isset($_SESSION['number'])) {
    header("location:number.php");die;
}