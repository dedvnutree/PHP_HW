<?php
$sqlActualEvents = 'SELECT  e.login as "Автор", e.date as "Дата" ,e.description as "Комментарий", e.id
                    FROM events e
                    WHERE e.published > 0 AND e.date >= CURDATE()
                    ORDER BY e.date 
                    LIMIT 10';

include 'connection.php';

    $result = mysqli_query($link, $sqlActualEvents);
    if (!$result ) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }
?>

    <div ><table>
    <tr><td style="width: 8%;"> Автор </td> <td style="width: 13%;"> Дата </td> <td> Комментарий </td> </tr>

<?php
    $tableColumns = ['Автор', 'Дата',"Комментарий"];

    while ($row = mysqli_fetch_assoc($result)){
        echo '<tr class="posts">';
        foreach( $tableColumns as $field) {
            echo "<td>" . $row[$field]. "</td>";
        }
        echo "</tr>";
    }
    echo "</table></div>";
?>