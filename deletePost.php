<?php 
function DeletePost($id, $tableName)
{ 
    include 'connection.php';
    $sqlChangeStatus = "DELETE FROM $tableName
                        WHERE id = '$id'";
    
    mysqli_query($link, $sqlChangeStatus);

    if(!mysqli_query($link, $sqlChangeStatus)){
        echo("Error description: " . $link -> error);
    }

}
var_dump(isset($_POST["idToChange"]));
echo '<br>';
var_dump($_POST["idToChange"]);
echo '<br>';

if (isset($_POST["idToChange"]) and $_POST["idToChange"]>0) { 
    DeletePost($_POST["idToChange"], $_POST["tableName"]);
}
?>