<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$date_first = $_GET['date_first'];
$date_second = $_GET['date_second'];
$counterparty = $_GET['counterparty'];

?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Список реализованных товаров по контрагенту</h1>
                <div class="information">
                    <form action="counterparties.php" method="get">
                        <input type="date" name="date_first" value="<?=$date_first?>">
                        <input type="date" name="date_second" value="<?=$date_second?>">
                        <select class="naklad__select" name="counterparty"> 
                        <?$search = $db -> query("select * from warehouse.counterparties order by id_counterparty asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_counterparty?>" <?if($row -> id_counterparty == $counterparty) echo 'selected';?>><?=$row->counterparty_name?></option>
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
            <th></th>
		</tr>
	</thead>
    
	<tbody>

    <?if(isset($date_first) || isset($date_second) || isset($counterparty)){
        $result = $db -> query("select number_invoice, date_invoice, contacts.nomer_contract, counterparties.counterparty_name
        from warehouse.invoices, warehouse.contacts, warehouse.counterparties
        where date_invoice BETWEEN '$date_first' AND '$date_second'
        and warehouse.invoices.id_contract = warehouse.contacts.id_contract
		and contacts.id_counterparty = counterparties.id_counterparty
        and counterparties.id_counterparty = $counterparty
        and contacts.id_status = 2
        order by number_invoice asc");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
            <td><?= $row->number_invoice?></td>
            <td><?= $row->date_invoice?></td>
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