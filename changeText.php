<?php 
function ChangeText($id, $text)
{ 
    include 'connection.php';
    $sqlChangeText = "UPDATE posts
                        SET text = '$text'
                        WHERE id = '$id'";
    
    if(!mysqli_query($link, $sqlChangeText)){
        echo("Error description: " . $link -> error);
    }
    echo '<br>'. $sqlChangeText;
}


var_dump(isset($_POST["idToChange"]));
echo '<br>';
var_dump($_POST["idToChange"]);
echo '<br>';
var_dump(isset($_POST["postText"]));
echo '<br>';
var_dump($_POST["postText"]);
echo '<br>';

if (isset($_POST["idToChange"]) AND $_POST["idToChange"]>0) { 
    ChangeText($_POST["idToChange"], addslashes($_POST["postText"]));
}
?>