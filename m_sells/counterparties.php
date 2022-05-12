<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$date_first = $_POST['date_first'];
$date_second = $_POST['date_second'];
$counterparty = $_POST['counterparty'];

?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Список реализованных товаров по контрагенту</h1>
                <div class="information">
                    <form action="counterparties.php" method="post">
                        <input type="date" name="date_first">
                        <input type="date" name="date_second">
                        <select class="naklad__select" name="counterparty"> 
                        <?$search = $db -> query("select * from warehouse.counterparties order by id_counterparty asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_counterparty?>" ><?=$row->counterparty_name?></option>
                                    <?endwhile;?>
                        </select>
                        <input type="submit" name="btn_add" value="Просмотр" class="btn__add">
                    </form>
                </div>
                <table class="table">
	<thead>
		<tr>
			<th>Номер накладной</th>
			<th>Дата накладной</th>
            <th>Контрагент</th>
			<th>Наименование товара</th>
			<th>Единица измерения</th>
            <th>Цена (руб.)</th>
            <th>Количество</th>
            <th>Сумма (руб.)</th>
            <th></th>
		</tr>
	</thead>
    
	<tbody>

    <?if(isset($date_first) || isset($date_second) || isset($counterparty)){
        $result = $db -> query("select counterparty_name,number_invoice, date_invoice, name_product, units.title, products_invoice.quantity, products_invoice.price
            from warehouse.invoices, warehouse.products, warehouse.units, warehouse.products_invoice, warehouse.counterparties
            where date_invoice BETWEEN '$date_first' AND '$date_second' 
            and id_counterparty = $counterparty
            and units.id_unit = products.id_unit 
            and products.id_product = products_invoice.id_product 
            and invoices.id_invoice = products_invoice.id_invoice");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
            <td><?= $row->number_invoice?></td>
            <td><?= $row->date_invoice?></td>
            <td><?= $row->counterparty_name?></td>
            <td><?= $row->name_product?></td>
            <td><?= $row->title?></td>
            <td><?= $row->price?></td>
            <td><?= $row->quantity?></td>
            <td>СУММА</td>
            <td></td>
            </tr>
            <?endwhile;}?>
                    
                        
	</tbody>
</table>

            </div>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>