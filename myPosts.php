<?php
$sqlMyPosts = "SELECT p.text, p.id,
                    CASE 
                        WHEN p.published = 0
                        THEN 'НЕ ОПУБЛИКОВАНО'
                        ELSE 'ОПУБЛИКОВАНО'
                        END AS 'published'
                    FROM posts p 
                    WHERE login = '$login'
                    ORDER BY p.id DESC";

$tableColumns = ['ТЕКСТ', 'СОСТОЯНИЕ'];
$result = mysqli_query($link, $sqlMyPosts);

?> 
<div >  <div class='main' >Мои Посты </div>  <table>
<tr>
        <td> ТЕКСТ </td> 
        <td style="width: 10%;"> СОСТОЯНИЕ </td>
<!-- foreach ($tableColumns as $column) {
    echo '<td>' . $column . '</td>';
} -->
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr class="posts">';
    $id = $row['id'];
    $color = $row['published'] == 'ОПУБЛИКОВАНО' ? 'greenSubmit' : 'redSubmit' ?>
    <td>
        <form method="post" action="/changeText.php">
            <textarea name="postText" style="height:300px; width:80%; font-size:12pt;">
                            <?php echo $row['text'] ?> 
            </textarea>
            <br />

            <input type="text" hidden value="<?php echo $id ?>" name="idToChange">
            <input type="submit" value="Изменить текст" />
        </form>
        <form method="POST" action="/deletePost.php">
            <input type="text" hidden value="<?php echo $id ?>" name="idToChange">
            <input type="submit" value="Удалить текст" />
        </form>
    </td>

    <td>
        <form method="POST" action="/changeStatus.php">
            <input type="text" hidden value="<?php echo $id ?>" name="idToChange">
            <input type="text" hidden value="posts" name="tableName">
            <input name="changeStatus" type="submit" value=" <?php echo $row['published']; ?>" class="<?php echo $color ?>" />
        </form>
    </td>
<?php
    echo "</tr>";
}
echo "</table></div>";
