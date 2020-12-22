<?php 

function createAccount($login, $password, $mail)
{ 
    include 'connection.php';

    $sqlChangeText = "INSERT INTO users (login, password, mail)
                        VALUES('$login', '$password', '$mail')";
    
    if(!mysqli_query($link, $sqlChangeText)){
        echo("Error description: " . $link -> error);
    }
    echo '<br>'. $sqlChangeText;
}

echo ' логин ';
var_dump($_POST["login"]);
echo '<br> почта ';var_dump($_POST["mail"]);
echo '<br> пароль ';var_dump($_POST["password"]);
echo '<br> потдверждение ';var_dump($_POST["passwordConfirm"]);
echo '<br>';

var_dump(strlen($_POST["postText"]));

if (isset($_POST["login"]) and strlen($_POST["login"])>0 and
    isset($_POST["password"]) and strlen($_POST["password"])>0 and
    isset($_POST["passwordConfirm"]) and strlen($_POST["passwordConfirm"])>0 and
    isset($_POST["mail"]) and strlen($_POST["mail"])>0) 
{ 
    if($_POST["password"] != $_POST["passwordConfirm"])
        echo "<h2 style='color:red;'>Пароли не совпадают!</h2>";
    else
        createAccount(addslashes($_POST["login"]), addslashes($_POST["password"]), addslashes($_POST["mail"]));
}
else
    echo "<h2 style='color:red;'>Не все поля заполнены!</h2>";
?>