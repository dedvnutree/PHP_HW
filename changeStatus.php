<?php 
function ChangeStatus($id, $tableName)
{ 
    include 'connection.php';
    $sqlChangeStatus = "UPDATE $tableName
                        SET published = NOT published
                        WHERE id = '$id'";
    
    if(!mysqli_query($link, $sqlChangeStatus)){
        echo("Error description: " . $link -> error);
    }
    echo '<br>'. $sqlChangeStatus;
}
var_dump(isset($_POST["idToChange"]));
echo '<br>';
var_dump($_POST["idToChange"]);
echo '<br>';

if (isset($_POST["idToChange"]) AND $_POST["idToChange"]>0) { 
    ChangeStatus($_POST["idToChange"], $_POST["tableName"]);
}
?>