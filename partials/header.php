<?php
require 'config/database.php';
//to fetch current user from database
if(isset($_SESSION['user-id'])){
    $id=filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result=mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel= "stylesheet" href="<?= ROOT_URL ?>css/styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<nav>
        <div class="container nav_container">
            <a href="<?= ROOT_URL ?>" class="nav_logo">Home</a>
            <ul class="nav_items">
                <li>  <a href="<?= ROOT_URL ?>blog.php" class="nav_logo">Blog</a></li>
                <li>  <a href="<?= ROOT_URL ?>" class="nav_logo">About</a></li>
                <li>  <a href="<?= ROOT_URL ?>" class="nav_logo">Services</a></li>
                <li>  <a href="<?= ROOT_URL ?>" class="nav_logo">Contact</a></li>
                <?php if(isset($_SESSION['user-id'])): ?>
                    <li class="nav_profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                    </ul>
                </li> 
                <?php else :?>
                <li>  <a href="<?= ROOT_URL ?>signin.php" class="nav_logo">Signin</a></li>
                <?php endif ?>
            </ul>
            <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
</nav>
