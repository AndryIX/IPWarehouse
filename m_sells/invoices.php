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
                    <h1>Просмотр</h1>
                </div>
                <table class="table">
	<thead>
		<tr>
			<th>Номер накладной</th>
			<th>Дата накладной</th>
			<th>Номер договора</th>
			<th>Дата договора</th>
			<th>Наименование товара</th>
			<th>Единицы измерения</th>
			<th>Количество</th>
            <th>Цена</th>
            <th>Валюта</th>
		</tr>
	</thead>
    
	<tbody>

        <?$result = $db -> query("
select number_invoice, date_invoice, contacts.nomer_contract, contacts.date_contact, name_product, units.title, products_invoice.quantity, products_invoice.price, currencies.currencies_name
from warehouse.contacts, warehouse.currencies, warehouse.invoices, warehouse.products, warehouse.units, warehouse.products_invoice
where units.id_unit = products.id_unit and currencies.id_currency = products_invoice.id_currency and contacts.id_contract = invoices.id_contract and products.id_product = products_invoice.id_product");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                        <tr>
                        <td><?= $row->number_invoice?></td>
                        <td><?= $row->date_invoice?></td>
                        <td><?= $row->nomer_contract?></td>
                        <td><?= $row->date_contact?></td>
                        <td><?= $row->name_product?></td>
                        <td><?= $row->title?></td>
                        <td><?= $row->quantity?></td>
                        <td><?= $row->price?></td>
                        <td><?= $row->currencies_name?></td>
                        </tr>
                        <?endwhile;?>
	</tbody>
</table>
                </div>
            </div>
    </div>

<? require "../blocks/footer.php"; ?>