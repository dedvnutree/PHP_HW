<div class = 'table'>
<h1 class = 'main'> Авторизация </h1>

<div class='main'>
    <form method="post" action="" >
        Логин: <input type="text" name="login"
        value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // Заполняем поле по умолчанию ?>" />
        <br/>
        Пароль: <input type="password" name="password" value="" /> <br/> <br/>
        <input type="submit" value="Войти" class='submitButton'/> <br/>
    </form>
    
    
        <button class='submitButton'
        onClick="MyWindow=window.open('registration.php','MyWindow','width=600,height=300');
                return false;"> Зарегистрироваться </button> 
    
</div>