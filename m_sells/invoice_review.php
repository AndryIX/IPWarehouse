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
			<th>Наименование товара</th>
            <th>Контрагент</th>
            <th>Цена (руб.)</th>
            <th>Количество</th>
            <th>Сумма (руб.)</th>
		</tr>
	</thead>
    
	<tbody>

        <?
        $result = $db -> query("select number_invoice, name_product, title, quantity, price, counterparty_name, (quantity * price) as sum
        from warehouse.products_invoice, warehouse.products,warehouse.invoices,warehouse.counterparties, warehouse.units, warehouse.contacts
        where number_invoice = '$number_invoice'
        and products_invoice.id_invoice = invoices.id_invoice
        and products_invoice.id_product = products.id_product
        and units.id_unit = products.id_unit
        and invoices.id_contract = contacts.id_contract
        and counterparties.id_counterparty = contacts.id_counterparty");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
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