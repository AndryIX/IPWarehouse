<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


require "../handlers/db_connect.php";
require "../blocks/header.php";
?>

<div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">


                        <h1>Товары</h1>
                        <a href="add_sheets.php" class="inter">Добавить товар</a>
                        <a href="../warehouse.php" class="inter">назад</a>
                        
                        <?$result = $db -> query("select id_product, name_product  from warehouse.products order by id_product asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                  
                                    <div><?= $row->name_product?></div>
                                   
                                    
                                    <div class="interaction">
                                       
                                            <a href="..m_werehouse/delete_sheets.php?id_product=<?=$row->id_product?>">Удалить</a>
                                            <a href="update_sheets.php?id_product=<?=$row->id_product?>&id_product=<?=$row->id_product?>">Изменить</a>
                                       
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                   

                    </div>
                </div>
            </div>
        </div>

<? require "../blocks/footer.php"; ?>