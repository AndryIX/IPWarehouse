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
                        <h1>Приложения</h1>
                        <a href="addApp.php" class="inter">Добавить приложение</a>
                        
                        <?$result = $db -> query("select id_app, app_name, url_address from apps order by id_app asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->app_name?></div>
                                    <div class="interaction">
                                        <a href="../handlers/h_moderation/delete_app.php?id_app=<?=$row->id_app?>">Удалить</a>
                                        <a href="updateApp.php?id_app=<?=$row->id_app?>&app_name=<?=$row->app_name?>&url_address=<?=$row->url_address?>">Изменить</a>
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                    </div>
                </div>
            </div>
        </div>

<? require "../blocks/footer.php"; ?>