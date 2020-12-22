<?php
session_start(); 

class AuthClass {
    public function auth($login, $password) {
        include 'connection.php';

        $sqlCheckPassword = "SELECT COUNT(*) 
                            FROM users u
                            WHERE u.login = '$login' AND u.password = '$password'";
        $result = mysqli_query($link, $sqlCheckPassword);

        if (mysqli_fetch_assoc($result)["COUNT(*)"] > 0) { 
            $_SESSION["is_auth"] = true; 
            $_SESSION["login"] = $login; 
            return true;
        }
        else { 
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
     
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { 
            return $_SESSION["is_auth"]; 
        }
        else return false; 
    }

    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
     
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
 
$auth = new AuthClass();
 
if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo "<h2 style='color:red;'>Логин и пароль введен не правильно!</h2>";
    }
}
 
if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        //header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
 
?>