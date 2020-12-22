<h1 class = 'main'> Новый пост </h1>
<?php 
    $login = $auth->getLogin();
?>

<script type="text/javascript">
        function show() { document.getElementById('dateInput').style.display = 'block'; }
        function hide() { document.getElementById('dateInput').style.display = 'none'; }
</script>

<div class="table">
    <form method="post" action="/createPost.php">
        Пост <input type="radio" name="postOrEvent" value="Пост" onclick="hide();" checked> 
        Событие <input type="radio" name="postOrEvent" value="Событие" onclick="show();">

        <input type="datetime-local" id="dateInput" name="date"  hidden>
        <textarea name="postText" placeholder="Начните вводить текст поста" style="height:300%; width:100%; font-size:12pt; resize:none"></textarea>
        <input type="text" hidden value="<?php echo $login ?>" name="login">               
        <input type="submit" class="submitButton" value="Сохранить">
    </form>
</div>