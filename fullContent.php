<html> 
<head>
<link rel="stylesheet" href="styles.css">
<title> Сеть </title>
</head>

<body>
<header>
    <!-- <nav class = 'nav'>
        <a href="index.php?page=login">Авторизация</a>  | |
        <a href="index.php?page=mainPage">Главная страница</a> | |
        <a href="index.php?page=myPage">Моя страница</a> 
    </nav> -->
</header>

<?php 
include 'Auth.php';
if($auth->isAuth()) include 'personalPanel.php';

$page = ($auth->isAuth()? (isset($_GET['page']) ? $_GET['page'] : 'main') : 'login');

include basename($page).'.php'; ?>

<footer class= 'footer'>
   <?php include 'config.php';
    echo $city .$year?>
</footer> 
</body>
</html>