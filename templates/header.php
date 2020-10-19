<?php
require($_SERVER['DOCUMENT_ROOT'] . '/app/config.php');
require($_SERVER['DOCUMENT_ROOT'] . '/app/init.php');
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Library Bokks</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
     integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link href="/assets/css/singin.css" rel="stylesheet">
     <link href="/assets/css/main.css" rel="stylesheet" type="text/css">

     <!-- Подрубаем jquery -->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <head>
    <body>
    <header class ="main-header">
        <div class="container"> 
            <h1 class="header-title">Library Books</h1>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link custom-link" href="/">Books</a></li>
                <li class="nav-item"><a class="nav-link custom-link" href="#">Authors</a></li>
                <li class="nav-item"><a class="nav-link custom-link" href="#">Genre</a></li>
                <?php if (user()->isAuth()):?>
                    <li class="nav-item"><a class="nav-link custom-link" href="?profile=yes">Profile</a></li>
                    <li class="nav-item"><a class="nav-link custom-link" href="?auth=yes">Sign out</a></li>
                <?php else:?>
                     <li class="nav-item"><a class="nav-link custom-link" href="?auth=yes">Sign in</a></li>
                <?php endif;?>
            </ul>
        </div>
    </header>
    <main class="main-content">