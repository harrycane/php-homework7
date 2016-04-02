<?php
define('PAGE', 'dogovor');
include_once "header.php";

?>

    <form method="post">
        <fieldset>
            <legend>Добавить договор</legend>
            <div>
                Сотрудник
                <select name="last_name first_name" required>
                    <?php foreach($staff_name_r as $row) : ?>
                        <option><?php echo ($row['last_name'])." ".($row['first_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>Компания
                <select name="name" required>
                    <?php foreach ($company_r as $row) : ?>
                        <option>
                            <td><?php echo $row['name']; ?></td>
                        </option>
                    <?php endforeach; ?>
                    <?php echo $row;?>
                </select>
            </div>

            <input class="button" type="submit" value="записать">
        </fieldset>
    </form>

<?php
if (!empty($_POST)) {
    $name = trim(htmlspecialchars($_POST['name']));

    mysqli_query($db, "INSERT INTO `compani` SET `name` = '$name';");
    if (mysqli_errno($db) == 0) {
        echo 'Добавлена новая компания: ' . $name;
    } else {
        echo mysqli_error($db);
    }
}

include_once "footer.php";