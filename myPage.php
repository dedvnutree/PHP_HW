<h1 class = 'main'> Моя страница </h1>

<?php
    include 'connection.php';
    $login = $auth->getLogin();
?>

<div class='table'>
    <?php
        include 'tables/myPosts.php';
        include 'tables/myEvents.php';
    ?>
</div> 