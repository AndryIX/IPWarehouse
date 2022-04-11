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


                        <h1>Склады</h1>
                        <a href="addwarehouses.php" class="inter">Добавить склад</a>
                        <a href="../warehouse.php" class="inter">назад</a>
                        
                        <?$result = $db -> query("select id_warehouse, denomination, footnote  from warehouse.warehouse order by id_warehouse asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                  
                                    <div><?= $row->denomination?></div>
                                    <div><?= $row->footnote?></div>
                                    
                                    <div class="interaction">
                                       
                                            <a href="../handlers/h_warehouse/delete_werehouse.php?id_warehouse=<?=$row->id_warehouse?>">Удалить</a>
                                            <a href="update_sheets.php?id_warehouse=<?=$row->id_warehouse?>&id_warehouse=<?=$row->iid_warehouse?>">Изменить</a>
                                       
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                   

                    </div>
                </div>
            </div>
        </div>

<? require "../blocks/footer.php"; ?>