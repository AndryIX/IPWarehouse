<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";

$selected = (int)$_GET['selected'];
?>
        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">
                        <h1>Доступы к приложениям</h1>
                        <form action="accesses.php" method="get">
                            <select name="selected" class="selection">
                                <?$search = $db -> query("select * from roles");
                                while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                        <option value="<?=$row->id_role?>" <?if($row -> id_role == $selected) echo 'selected';?>><?=$row->role_name?></option>
                                <?endwhile;?>
                            </select>
                            <button type="submit" class="btn__search" name="">Показать</button>
                        </form>
                        <a href="addAccess.php" class="inter">Добавление доступа</a>
                        <?$result = $db -> query("select accesses.id_role, role_name, accesses.id_app, app_name
                            from accesses, roles, apps 
                            where accesses.id_app = apps.id_app
                            and accesses.id_role = roles.id_role
                            and accesses.id_role = ". $select = $selected != 0 ? $selected : 1 ."
                            order by id_app asc");
                        

                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div class="info"><?= $row->app_name?></div>
                                    <div class="interaction">
                                        <a href="../handlers/h_moderation/delete_access.php?id_role=<?=$row->id_role?>&id_app=<?=$row->id_app?>">Удалить</a>
                                        <a href="updateAccess.php?id_role=<?=$row->id_role?>&id_app=<?=$row->id_app?>">Изменить</a>
                                    </div>
                                </li>
                            </ul>
                        <?endwhile;?>
                        
                    </div>
                </div>
            </div>
        </div>

<? require "../blocks/footer.php"; ?>