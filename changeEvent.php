<?php 
function ChangeEvent($id, $description, $date)
{ 
    include 'connection.php';
    $sqlChangeEvent = "UPDATE events 
                    SET description = '$description', date = '$date' 
                    WHERE id = '$id'";
    
    if(!mysqli_query($link, $sqlChangeEvent)){
        echo("Error description: " . $link -> error);
    }
    echo '<br><br>'. $sqlChangeEvent;
}


var_dump(isset($_POST["idToChange"]));
echo '<br>';
var_dump($_POST["idToChange"]);
echo '<br>';
var_dump(isset($_POST["postText"]));
echo '<br>';
var_dump($_POST["postText"]);
echo '<br><br>';

if (isset($_POST["idToChange"]) AND $_POST["idToChange"]>0) { 
    ChangeEvent($_POST["idToChange"], addslashes($_POST["postText"]), $_POST["newDate"]);
}
?>