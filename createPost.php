<?php 

var_dump(isset($_POST["postText"]));
echo '<br>';
var_dump($_POST["login"]);
echo '<br>';
var_dump(strlen($_POST["postText"]));
echo '<br>';
var_dump($_POST["date"]);
echo '<br>';

if (isset($_POST["postText"]) and strlen($_POST["postText"])>0 or $_POST["postOrEvent"] == "Событие") 
{ 
    $login = $_POST["login"];
    $text = $_POST["postText"];
    if($_POST["postOrEvent"] == "Пост")
    {
        echo 'POST <br>';

        $sql = "INSERT INTO posts (login, text, published)
            VALUES('$login', '$text', 0)";
    }
    else
    {
        echo 'EVENT <br>';

        $date = $_POST["date"];
        $sql = "INSERT INTO events(login, date, description, published)
            VALUES('$login', '$date', '$text', 0)";  
    }

    include 'connection.php';

    if(!mysqli_query($link, $sql)){
        echo("Error description: " . $link -> error);
    }
    echo '<br><br>SQL:<br>'. $sql;
}
?>