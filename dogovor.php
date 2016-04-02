<?php
define('PAGE', 'dogovor');
include_once "header.php";

?>

    <form method="post">
        <fieldset>
            <legend>Добавить договор</legend>
            <div>
                Сотрудник
                <select name="staffName" required>
                    <?php foreach($staff_name_r as $row_Staff) : ?>
                        <option value="<?php echo $row_Staff['id'];?>"><?php echo ($row_Staff['last_name'])." ".($row_Staff['first_name']); ?></option>
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

            <div>
                Клиент
                <select name="clientName" required>
                    <?php foreach($client_name_r as $row_Client) : ?>
                        <option value="<?php echo $row_Client['id'];?>"><?php echo ($row_Client['last_name'])." ".($row_Client['first_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div> № Договора<span>*</span><input type="number" name="dogovor" placeholder="25856*" required></div>
            <div> Сумма заказа<span>*</span><input type="number" name="sum"  required></div>
            <div>Статус заказа<select name="status">
                    <option value="0" selected>Предворительная заявка</option>
                    <option value="1" >Выполняется</option>
                    <option value="2" >Выполнен</option>
                </select></div>
            <br>
            <input class="button" type="submit" value="записать">
        </fieldset>
    </form>
<?php
if (!empty($_POST)){
    $staff =(int)$_POST['staffName'];
    $client = (int)$_POST['clientName'];
    $dogovor = (int)$_POST['dogovor'];
    $sum = (float)$_POST['sum'];
    $status = (int)$_POST['status'];

    mysqli_query($db,"
    INSERT INTO `order`
    SET 
    `id_staff` = $staff,
    `id_client` = $client,
    `sum` = $sum,
    `status` = $status;");

    if (mysqli_errno($db) == 0){
        echo 'Новый договор';
    }
    else {
        echo mysqli_error($db);
    }

}
include_once "footer.php";
?>

     

