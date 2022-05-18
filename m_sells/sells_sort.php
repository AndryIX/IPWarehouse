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
                        <input type="date" name="date_first" value="<?=$date_first?>">
                        <input type="date" name="date_second" value="<?=$date_second?>">
                        <input type="submit" name="btn_add" value="Показать" class="btn__add">
                    </form>
                </div>
                <table class="table">
	<thead>
		<tr>
			<th>Номер накладной</th>
			<th>Дата накладной</th>
            <th>Номер контракта</th>
            <th>Контрагент</th>
            <th></th>
		</tr>
	</thead>
    
	<tbody>

        <?if(isset($date_first) || isset($date_second)){
        $result = $db -> query("select number_invoice, date_invoice, contacts.nomer_contract, counterparties.counterparty_name
            from warehouse.invoices, warehouse.contacts, warehouse.counterparties
            where date_invoice BETWEEN '$date_first' AND '$date_second'
            and warehouse.invoices.id_contract = warehouse.contacts.id_contract
            and contacts.id_status = 2
            order by number_invoice asc");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
            <td><?= $row->number_invoice?></td>
            <td><?= $row->date_invoice?></td>
            <td><?= $row->nomer_contract?></td>
            <td><?= $row->counterparty_name?></td>
            <td><div class="interaction">
                    <a href="invoice_review.php?number_invoice=<?=$row->number_invoice?>">Просмотр</a>
                </div></td>
            </tr>
            <?endwhile;}?>
                    
                        
	</tbody>
</table>

            </div>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>