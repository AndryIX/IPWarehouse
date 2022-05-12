<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$date_first = $_POST['date_first'];
$date_second = $_POST['date_second'];
$product = $_POST['product'];

?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Список реализованных товаров по контрагенту</h1>
                <div class="information">
                    <form action="products.php" method="post">
                        <input type="date" name="date_first">
                        <input type="date" name="date_second">
                        <select class="naklad__select" name="product"> 
                        <?$search = $db -> query("select * from warehouse.products order by id_product asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_product?>" ><?=$row->name_product?></option>
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
			<th>Наименование товара</th>
            <th>Цена (руб.)</th>
            <th>Количество</th>
            <th>Сумма (руб.)</th>
            <th></th>
		</tr>
	</thead>
    
	<tbody>

    <?if(isset($date_first) || isset($date_second) || isset($product)){
        $result = $db -> query("select number_invoice, date_invoice, name_product, units.title, products_invoice.quantity, products_invoice.price
            from warehouse.invoices, warehouse.products, warehouse.units, warehouse.products_invoice
            where date_invoice BETWEEN '$date_first' AND '$date_second' 
            and products.id_product = $product
            and units.id_unit = products.id_unit 
            and products.id_product = products_invoice.id_product 
            and invoices.id_invoice = products_invoice.id_invoice");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
            <td><?= $row->number_invoice?></td>
            <td><?= $row->date_invoice?></td>
            <td><?= $row->name_product?></td>
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