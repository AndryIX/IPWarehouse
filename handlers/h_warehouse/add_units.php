<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


require "handlers/db_connect.php";
require "blocks/header.php";
?>

        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">
                        <h1>Роли</h1>
                        <a href="add_units.php" class="inter">Добавить единицу измерения</a>
                        
                        <?$result = $db -> query("select id_unit, unit_name, designation from warehouse.units order by id_unit asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->unit_name?></div>
                                    <div class="interaction">
                                       
                                            <a href="..m_werehouse/delete_unit.php?id_unit=<?=$row->id_unit?>">Удалить</a>
                                            <a href="update_unit.php?id_unit=<?=$row->id_unit?>&unit_name=<?=$row->unit_name?>">Изменить</a>
                                       
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                    </div>
                </div>
            </div>
        </div>

<? require "blocks/footer.php"; ?>