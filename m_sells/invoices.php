<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>


    <div class="content">
        <div class="container">
            <div class="sells__header">
                <div class="sells__title">
                    <h1>Список реализованных товаров</h1>
                </div>

                <div class="sells__add">
                    <a href="sells_sort.php">Накладные за заданный период</a>
                    <a href="">Просмотр накладные по контрагенту</a>
                    <a href="">Просмотр накладные по товару</a>
                </div>

                <table class="table">
	<thead>
		<tr>
			<th>Номер накладной</th>
			<th>Дата накладной</th>
			<th>Номер договора</th>
			<th>Дата договора</th>
            <th></th>
		</tr>
	</thead>
    
	<tbody>

        <?$result = $db -> query("
select number_invoice, date_invoice, contacts.nomer_contract, contacts.date_contact, name_product, units.title, products_invoice.quantity, products_invoice.price, currencies.currencies_name
from warehouse.contacts, warehouse.currencies, warehouse.invoices, warehouse.products, warehouse.units, warehouse.products_invoice
where units.id_unit = products.id_unit and currencies.id_currency = products_invoice.id_currency and contacts.id_contract = invoices.id_contract and products.id_product = products_invoice.id_product and invoices.id_invoice = products_invoice.id_invoice");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                        <tr>
                        <td><?= $row->number_invoice?></td>
                        <td><?= $row->date_invoice?></td>
                        <td><?= $row->nomer_contract?></td>
                        <td><?= $row->date_contact?></td>
                        <td></td>
                        </tr>
                        <?endwhile;?>
	</tbody>
</table>
                </div>
            </div>
    </div>

<? require "../blocks/footer.php"; ?>