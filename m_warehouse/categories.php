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
                        <a href="add_sheets.php" class="inter">Добавить категорию</a>
                        <a href="../warehouse.php" class="inter">назад</a>
                        
                        <?$result = $db -> query("select id_categ, title_cat  from warehouse.сategories order by id_categ asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->title_cat?></div>
                                    
                                    <div class="interaction">
                                       
                                            <a href="..m_werehouse/delete_sheets.php?id_categ=<?=$row->id_categ?>">Удалить</a>
                                            <a href="update_sheets.php?id_categ=<?=$row->id_categ?>&id_categ=<?=$row->id_categ?>">Изменить</a>
                                       
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                   

                    </div>
                </div>
            </div>
        </div>

<? require "../blocks/footer.php"; ?>