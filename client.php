<?php
define('PAGE', 'client');
include_once "header.php";
?>
    <form method="post">
        <fieldset>
            <legend>Добавить клиента</legend>
            <div>Фамилия<span>*</span><input type="text" name="last_name" placeholder="Фамилия *" required></div>
            <div> Имя<span>*</span><input type="text" name="first_name" placeholder="Имя *" required></div>
            <div>Компания
                <select name="company" required>
                    <?php foreach ($company_r as $row) : ?>
                        <option value="<?php echo $row['id'];  ?>">
                            <?php echo $row['name']; ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <br>
            <input class="button" type="submit" value="записать">
        </fieldset>
    </form>
<?php

if (!empty($_POST)) {
    $last_name = trim(htmlspecialchars($_POST['last_name']));
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $company = trim(htmlspecialchars($_POST['company']));

    mysqli_query($db, "INSERT INTO `client` SET `last_name` = '$last_name', `first_name` = '$first_name',`id_compani` = '$company';");

    if ((mysqli_errno($db) == 0)) {
        echo 'Добавлен новй клиент: ' . $last_name ." ".$first_name ;
    } else {
        echo mysqli_error($db);
    }
}

include_once "footer.php";