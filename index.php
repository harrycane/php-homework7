<form method="post">
    <fieldset>
        <legend>Регистрация</legend>
        <div>login <input type="text" name="login" required></div>
        <div>Password <input type="password" name="password" required></div>
        <input type="submit" value="Записать">
    </fieldset>
    <fieldset>
        <legend>Авторизация</legend>
        <a href="reg.php">Войти в систему</a>
    </fieldset>

</form>


<?php
if (!empty($_POST)) {
    include_once "globals.php";
    $login = trim(htmlspecialchars($_POST['login']));
    $password = md5($_POST['password']);

    $login_user_query = mysqli_query($db, "
    SELECT `id` FROM `user`
    WHERE `login` = '$login';
    ");
    if (mysqli_num_rows($login_user_query) > 0) {
        echo '<p>Логин занят</p>';
    } else {
        mysqli_query($db, "
    INSERT INTO `user`
    SET `login` = '$login' , `password` = '$password';
    ");
        if (mysqli_errno($db) == 0) {
            setcookie('id', mysqli_insert_id($db));
            header("location: home.php");
        } else {
            echo '<p>Ошибка регистрации</p>';
        }
    }
}
?>