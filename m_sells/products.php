<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$date_first = $_GET['date_first'];
$date_second = $_GET['date_second'];
$product = $_GET['product'];

?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Список реализованных товаров по контрагенту</h1>
                <div class="information">
                    <form action="products.php" method="get">
                        <input type="date" name="date_first" value="<?=$date_first?>">
                        <input type="date" name="date_second" value="<?=$date_second?>">
                        <select class="naklad__select" name="product"> 
                        <?$search = $db -> query("select * from warehouse.products order by id_product asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_product?>" <?if($row -> id_product == $product) echo 'selected';?>><?=$row->name_product?></option>
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
            <th></th>
		</tr>
	</thead>
    
	<tbody>

    <?if(isset($date_first) || isset($date_second) || isset($product)){
        $result = $db -> query("select number_invoice, date_invoice, contacts.nomer_contract, products.name_product
        from warehouse.invoices, warehouse.contacts, warehouse.products
        where date_invoice BETWEEN '$date_first' AND '$date_second'
        and warehouse.invoices.id_contract = warehouse.contacts.id_contract
        and products.id_product = $product
        order by number_invoice asc");
                        
            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
            <tr>
            <td><?= $row->number_invoice?></td>
            <td><?= $row->date_invoice?></td>
            <td><?= $row->name_product?></td>
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