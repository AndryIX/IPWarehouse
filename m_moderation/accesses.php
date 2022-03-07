<? session_start();
if($_SESSION['role'] != 'Администратор'){
    header('Location: ../auth.php');
    exit;
}


$selected = $_GET['selected'];

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>

        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">

                        <h1>Доступы к приложениям</h1>

                        <form action="accesses.php" method="get">
                            <select name="selected" class="selection">
                                <?$search = $db -> query("select * from roles");
                                while($row = $search -> fetch(PDO::FETCH_OBJ)):
                                    if($row -> id_role == $selected):?>
                                        <option value="<?=$row->id_role?>" selected><?=$row->role_name?></option>
                                    <?else:?>
                                        <option value="<?=$row->id_role?>"><?=$row->role_name?></option>
                                    <?endif;?>
                                <?endwhile;?>
                            </select>
                            <button type="submit" class="btn__search" name="">Показать</button>
                        </form>

                        <a href="addAccess.php" class="inter">Добавление доступа</a>
                        
                        <?if(isset($selected)){
                            $result = $db -> query("select accesses.id_role, role_name, accesses.id_app, app_name
                            from accesses, roles, apps 
                            where accesses.id_app = apps.id_app
                            and accesses.id_role = roles.id_role
                            and accesses.id_role = $selected
                            order by id_app asc");
                        }else{
                            $result = $db -> query("select accesses.id_role, role_name, accesses.id_app, app_name
                            from accesses, roles, apps 
                            where accesses.id_app = apps.id_app
                            and accesses.id_role = roles.id_role
                            and accesses.id_role = 1
                            order by id_app asc");
                        }

                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->app_name?></div>
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