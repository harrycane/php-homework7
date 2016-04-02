<?php
if (!isset($_COOKIE['id']) || $_COOKIE['id']<0){
header('location:index.php');
}   $id = $_COOKIE['id'];
?>

<div class="row">
    <nav>
        <ul>
            <li <?php if (PAGE == 'staff') echo 'class="active"'; ?>><a href="staff.php">Сотрудники</a></li>
            <li <?php if (PAGE == 'client') echo 'class="active"'; ?>><a href="client.php">Клиенты</a></li>
            <li <?php if (PAGE == 'kompani') echo 'class="active"'; ?>><a href="kompani.php">Компании</a></li>
            <li <?php if (PAGE == 'dogovor') echo 'class="active"'; ?>><a href="dogovor.php">Договора</a></li>
        </ul>
    </nav>
</div>