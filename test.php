<?php
include_once "globals.php";

$query = "SELECT name FROM compani";
if ($result = mysqli_query($db, $query)) {

    $r = array();
    while($row = mysqli_fetch_array($result))
    {
        $r[] = $row;
    }
    mysqli_free_result($result);
}
?>
<table border="1">
    <tr>
        <td>Название компании</td>
    </tr>
    <?php foreach($r as $row) : ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
