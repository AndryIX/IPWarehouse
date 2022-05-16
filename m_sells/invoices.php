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
                    <h1>Список накладных</h1>
                </div>

                <div class="sells__add">
                    <a href="sells_sort.php">Накладные за заданный период</a>
                    <a href="counterparties.php">Просмотр накладные по контрагенту</a>
                    <a href="products.php">Просмотр накладные по товару</a>
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

        <?$result = $db -> query("select number_invoice, date_invoice, contacts.nomer_contract, contacts.date_contact
            from warehouse.invoices, warehouse.contacts
            where warehouse.invoices.id_contract = warehouse.contacts.id_contract
            order by number_invoice asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                        <tr>
                        <td><?= $row->number_invoice?></td>
                        <td><?= $row->date_invoice?></td>
                        <td><?= $row->nomer_contract?></td>
                        <td><?= $row->date_contact?></td>
                        <td><div class="interaction">
                    <a href="invoice_review.php?number_invoice=<?=$row->number_invoice?>">Просмотр</a>
                </div></td>
                        </tr>
                        <?endwhile;?>
	</tbody>
</table>
                </div>
            </div>
    </div>

<? require "../blocks/footer.php"; ?>