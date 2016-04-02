<?php
define('PAGE', 'staff');
include_once "header.php";
?>
    <form method="post">
        <fieldset>
            <legend>Добавить сотрудника</legend>
            <div> Фамилия<span>*</span><input type="text" name="last_name" placeholder="Фамилия *" required></div>
            <div> Имя<span>*</span><input type="text" name="first_name" placeholder="Имя *" required></div>
            <div>Должность<select name="position"></div>
            <option value="1" selected>Администратор</option>
            <option value="2">Менеджер</option>
            <option value="3">Разработчик</option>
            </select><br>
            <input class="button" type="submit" value="записать">
        </fieldset>
    </form>
<?php
if (!empty($_POST)) {
    $last_name = trim(htmlspecialchars($_POST['last_name']));
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $position = (int)$_POST['position'];

    mysqli_query($db, "INSERT INTO `staff` SET `last_name` = '$last_name', `first_name` = '$first_name',`position` = '$position';");

    if ((mysqli_errno($db) == 0) && ($first_name)) {
        if  ($position == 1){
            echo "Новый Админ: ". $last_name.  " ". $first_name;
        }  elseif ($position == 2) {
            echo "Новый Манагер: ". $last_name.  " ". $first_name;
        }  elseif ($position == 3) {
            echo "Новый Разраб: ". $last_name.  " ". $first_name;
        }
    } else {
        echo mysqli_error($db);
    }
}

include_once "footer.php";

