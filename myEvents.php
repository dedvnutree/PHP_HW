<?php
$sqlMyEvents = "SELECT p.description, p.id, p.date,
                    CASE 
                        WHEN p.published = 0
                        THEN 'НЕ ОПУБЛИКОВАНО'
                        ELSE 'ОПУБЛИКОВАНО'
                        END AS 'published'
                    FROM events p 
                    WHERE login = '$login'
                    ORDER BY p.id DESC";

$tableColumns = ['ДАТА И КОММЕНТАРИЙ', 'СОСТОЯНИЕ'];
$result = mysqli_query($link, $sqlMyEvents);

if(!mysqli_query($link, $sqlMyEvents))
    echo("Error description: " . $link -> error);

?> 

    <div > <div class='main' > Календарь </div>  <table>
    <tr>
        <td > ДАТА И КОММЕНТАРИЙ </td> 
        <td style="width: 10%;"> СОСТОЯНИЕ </td> 
    </tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr class="posts">';
    $id = $row['id'];
    $date = $row['date'];
    $color = $row['published'] == 'ОПУБЛИКОВАНО' ? 'greenSubmit' : 'redSubmit' ?>

    <td>
        <form method="post" action="/changeEvent.php">
            <input type="datetime-local" 
                    name="newDate"
                    value="<?php echo date('Y-m-d\TH:i:s', strtotime($date)) ?>" /> <br>
                    
            <textarea name="postText" style="height:100px; width:80%; font-size:12pt;">
                                <?php echo $row['description'] ?> 
                            </textarea>
            <br />

            <input type="text" hidden value="<?php echo $id ?>" name="idToChange">
            <input type="submit" value="Изменить событие" />
        </form>
        <form method="POST" action="/deletePost.php"> 
            <input type="text" hidden value="<?php echo $id ?>" name="idToChange">
            <input type="text" hidden value="events" name="tableName">
            <input type="submit" value="Удалить событие" />
        </form>
    </td>

    <td>
        <form method="POST" action="/changeStatus.php">
            <input type="text" hidden value="<?php echo $id ?>" name="idToChange">
            <input type="text" hidden value="events" name="tableName">

            <input name="changeStatus" type="submit" value=" <?php echo $row['published']; ?>" class="<?php echo $color ?>" />
        </form>
    </td>
<?php
    echo "</tr>";
}
echo "</table></div>";
?>