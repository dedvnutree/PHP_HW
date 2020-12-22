<?php
include 'connection.php';

$sql = 'SELECT  p.login as "Автор", p.text as "Пост", p.id
                    FROM posts p 
                    WHERE p.published > 0
                    ORDER BY p.id DESC';

$result = mysqli_query($link, $sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}

$tableColumns = ['Автор', "Пост"];

?> 

<div ><table>
    
<tr>
    <td style="width: 8%;"> Автор </td> 
    <td> Пост </td> 
</tr>

<?php 

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr class="posts">';
    foreach ($tableColumns as $field) {
        echo "<td>" . $row[$field] . "</td>";
    }
    echo "</tr>";
}
echo "</table></div>";
