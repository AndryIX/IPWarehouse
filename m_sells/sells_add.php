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
                    <h1>Создание накладной</h1>
                </div>
                <form action="../handlers/h_sells/add_product-in.php" method="post">
                    <div class="sells__add__body">
                        <select class="naklad__select" name="selected_naklad"> 
                        <?$search = $db -> query("select * from warehouse.invoices order by id_invoice asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_invoice?>" ><?=$row->number_invoice?></option>
                                    <?endwhile;?>
                        </select>
                        <select class="tovar__select" name="selected_product">
                        <?$search = $db -> query("select * from warehouse.products order by id_product asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_product?>" ><?=$row->name_product?></option>
                                    <?endwhile;?>
                        </select>
                        <input type="text"  name="count" placeholder="Введите кол-во" required>
                        <input type="text"  name="price" placeholder="Введите цену" required>
                        <select class="currency__select" name="selected_currency">
                        <?$search = $db -> query("select * from warehouse.currencies order by id_currency asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_currency?>" ><?=$row->currencies_name?></option>
                                    <?endwhile;?>
                        </select>
                    </div>
                    <input type="submit" name="btn_add" value="Создать" class="btn__add">
                </form>
                
            </div>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>