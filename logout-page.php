<?php

session_start();

if (isset($_GET['logout'])) {
    $_SESSION['is_logged_in'] = false;
    unset($_SESSION['is_logged_in']);
    header("location:./home-page.php"); 
}
