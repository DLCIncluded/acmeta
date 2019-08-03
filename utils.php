<?PHP
ini_set('display_errors', '1');
include_once("includes/dbConn.php");
include_once("includes/accountChecker.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <title>AC Meta Tracker</title>

</head>
<body>
    <div id="menu" class="menu">
            <a href="javascript:void(0)" class="closebtn" onclick="closeMenu()">&times;</a>
            
            <a href="index.php" data-ajax="false">Home</a>
            <?php 
            
            if($loggedIn=="true"){
                ?>
            <a href="logout.php" data-ajax="false">Logout</a>
                <?php
                if($rank >= 2){
                ?>
                <a href="#" data-ajax="false">Admins Only</a>
                <a href="newtoon.php" data-ajax="false">New Toon</a>
                <?php
                }
            }else{
            ?>
            <a href="login.php" data-ajax="false">Login</a>
            <a href="register.php" data-ajax="false">Register</a>
            <?php
            }
            ?>
            
    </div>
    <a href="javascript:void(0)" onclick="openMenu()"><img src="img/assets/circle-menu.png" alt="menu" class="menu-icon"/></a>
