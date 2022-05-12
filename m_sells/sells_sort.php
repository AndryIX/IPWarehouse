<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$date_first = $_POST['date_first'];
$date_second = $_POST['date_second'];

?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Список реализованных товаров за заданный период</h1>
                <div class="information">
                    <form action="sells_sort.php" method="post">
                        <input type="date" name="date_first">
                        <input type="date" name="date_second">
                        <input type="submit" name="btn_add" value="Просмотр" class="btn__add">
                    </form>
                </div>
                <table class="table">
	<thead>
		<tr>
			<th>Номер накладной</th>
			<th>Дата накладной</th>
			<th>Наименование товара</th>
			<th>Единица измерения</th>
            <th>Количество</th>
            <th>Цена (руб.)</th>
            <th>Сумма (руб.)</th>
            <th></th>
		</tr>
	</thead>
    
	<tbody>

        <?if(gettype($date_first)!= 'string' || gettype($date_second) != 'string'){
        $result = $db -> query("
select number_invoice, date_invoice, name_product, units.title, products_invoice.quantity, products_invoice.price
from warehouse.invoices, warehouse.products, warehouse.units, warehouse.products_invoice
where date_invoice BETWEEN '$date_first' AND '$date_second' and units.id_unit = products.id_unit and products.id_product = products_invoice.id_product and invoices.id_invoice = products_invoice.id_invoice");
                        
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                        <tr>
                        <td><?= $row->number_invoice?></td>
                        <td><?= $row->date_invoice?></td>
                        <td><?= $row->name_product?></td>
                        <td><?= $row->title?></td>
                        <td><?= $row->quantity?></td>
                        <td><?= $row->price?></td>
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