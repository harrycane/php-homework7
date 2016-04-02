<?php
define('PAGE', 'staff');
include_once "header.php";
?>
    <form method="post">
        <fieldset>
            <legend>Регистрация</legend>
            <div>login <input type="text" name="login" required></div>
            <div>Password <input type="password" name="password" required></div>
            <input type="submit" value="Записать">
        </fieldset>
    </form>
<?php
if (!empty($_POST)) {
    $login = trim(htmlspecialchars($_POST['login']));
    $password = md5($_POST['password']);

    $query = mysqli_query($db, "
      SELECT `id` FROM `user`
      WHERE `login` = '$login'
      AND `password` = '$password';
       ");
    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);
        setcookie('id', $user['id']);
        header("location:home.php");
    } else {
        echo '<p>Неверный пароль или логин</p>';
    }
}
include_once "footer.php";
