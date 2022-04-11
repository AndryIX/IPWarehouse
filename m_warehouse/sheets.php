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


                        <h1>Прайсы</h1>
                        <a href="add_sheets.php" class="inter">Добавить прайс</a>
                        <a href="../warehouse.php" class="inter">назад</a>
                        
                        <?$result = $db -> query("select id_price, start_date, end_date from warehouse.sheets order by id_price asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->id_price?></div>
                                    <div><?= $row->start_date?></div>
                                    <div><?= $row->end_date?></div>
                                    <div class="interaction">
                                       
                                            <a href="..m_werehouse/delete_sheets.php?id_price=<?=$row->id_price?>">Удалить</a>
                                            <a href="update_sheets.php?id_price=<?=$row->id_price?>&id_price=<?=$row->id_price?>">Изменить</a>
                                       
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                   

                    </div>
                </div>
            </div>
        </div>

<? require "../blocks/footer.php"; ?>