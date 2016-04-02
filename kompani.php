<?php
    define('PAGE', 'kompani');
    include_once "header.php";
    include_once "footer.php";
?>

<form method="post">
    <fieldset>
        <legend>Добавить компанию</legend>
        <div> Название компании<span>*</span><input type="text" name="name" placeholder="Название компании " required></div>

        <input class="button" type="submit" value="записать">
    </fieldset>
</form>

<?php
if (!empty($_POST)) {
    $name = trim(htmlspecialchars($_POST['name']));

    mysqli_query($db, "INSERT INTO `compani` SET `name` = '$name';");
    if (mysqli_errno($db) == 0) {
        echo 'Добавлена новая компания: '.$name;
    } else {
        echo mysqli_error($db);
    }
}