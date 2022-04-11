<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "handlers/db_connect.php";
require "blocks/header.php";
?>

<div class="sells">
    <div class="content">
        <div class="container">
            <div class="sells__header">
                <div class="sells__title">
                    <h1>Покупка</h1>
                </div>
                <div class="sells__add">
                    <a href="../m_sells/sells_add.php">Оформить накладную</a>
                    <a href="../m_sells/invoices.php">Просмотр накладных</a>
            </div>
            <div class="sells__body">
                <div class="sells__row">
                    <div class="sells__items">

                    <?$result = $db -> query("SELECT id_product, name_product, condition, units.title, warehouse.denomination
	FROM warehouse.products, warehouse.warehouse, warehouse.units
	Where warehouse.id_warehouse = products.id_warehouse and units.id_unit = products.id_unit");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>

                        <div class="sells__column">
                            <div class="sells__item">
                                <div class="sells__item__title">
                                <?= $row->name_product?>
                                </div>
                                <div class="sells__item__count">
                                <?= $row->condition?>
                                </div>
                                <div class="sells__item__price">
                                <?= $row->denomination?>
                                </div>
                            </div>
                        </div>

                        <?endwhile;?>
                </div>
            </div>
        </div>
    </div>
</div>

<? require "blocks/footer.php"; ?>