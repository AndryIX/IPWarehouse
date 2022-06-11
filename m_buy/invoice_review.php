<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$number_invoice = $_GET['number_invoice'];
?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Накладная № <?= $number_invoice?></h1>
                <table class="table">
	<thead>
		<tr>
			<th>Номер накладной</th>
			<th>Дата накладной</th>
			<th>Наименование товара</th>
            <th>Контрагент</th>
            <th>Цена (руб.)</th>
            <th>Количество</th>
            <th>Сумма (руб.)</th>
		</tr>
	</thead>
    
	<tbody>

        <?
        $result = $db -> query("select (products_invoice.quantity * products_invoice.price) as sum, number_invoice, date_invoice, name_product, units.title, products_invoice.quantity, products_invoice.price, counterparties.counterparty_name
            from warehouse.invoices, warehouse.products, warehouse.units, warehouse.products_invoice, warehouse.counterparties
            where units.id_unit = products.id_unit 
            and products.id_product = products_invoice.id_product 
            and invoices.id_invoice = products_invoice.id_invoice
            and number_invoice = '$number_invoice'
            order by number_invoice asc");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
            <td><?= $row->number_invoice?></td>
            <td><?= $row->date_invoice?></td>
            <td><?= $row->name_product?></td>
            <td><?= $row->counterparty_name?></td>
            <td><?= $row->price?></td>
            <td><?= $row->quantity?></td>
            <td><?= $row->sum?></td>
            </tr>
            <?endwhile;?>
                    
                        
	</tbody>
</table>

            </div>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>