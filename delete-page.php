<?php

require_once './blog-page.php';

if (isset($_GET['id'])) {
    $indexValue = $_GET['id'];
    unset($_SESSION['blogs'][$indexValue]);
    header('location:./home-page.php');
}
?>

