<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

if($_SESSION['check_succ'])
    echo "<script>alert(\"".$_SESSION['check_succ']."\");</script>";
    unset($_SESSION['check_succ']);

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>


    <div class="content">
        <div class="container">
            <div class="sells__header">
                <div class="sells__title">
                    <h1 class="add__lab">Создание накладной</h1>
                </div>
                <form action="../handlers/h_sells/add_product-in.php" class="add__form" method="post" name="f_add_invoice" onsubmit="return validateFormSells()"> 
                    <div class="add">
                        <select class="add__input" name="selected_naklad"> 
                        <?$search = $db -> query("select id_invoice, number_invoice, date_invoice, contacts.id_contract, id_status from warehouse.invoices, warehouse.contacts
                          where id_status = 1 and contacts.id_contract = invoices.id_contract
                          order by id_invoice asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_invoice?>" ><?=$row->number_invoice?></option>
                                    <?endwhile;?>
                        </select>
                        <select class="add__input" name="selected_product">
                        <?$search = $db -> query("select * from warehouse.products order by id_product asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_product?>" ><?=$row->name_product?></option>
                                    <?endwhile;?>
                        </select>
                        <input type="text" class="add__input" name="count" placeholder="Введите кол-во">
                        <input type="text" class="add__input" name="price" placeholder="Введите цену">
                        <select class="add__input" name="selected_currency">
                        <?$search = $db -> query("select * from warehouse.currencies order by id_currency asc");
                                    while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                            <option value="<?=$row->id_currency?>" ><?=$row->currencies_name?></option>
                                    <?endwhile;?>
                        </select>
                    <input type="submit" name="btn_add" value="Создать" class="btn__add">
                    </div>
                </form>
                
            </div>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>