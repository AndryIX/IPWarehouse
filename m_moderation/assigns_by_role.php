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
                <h1>Назначения по ролям</h1>
                <form action="assigns_by_role.php" method="get">
                    <select name="selected" class="selection">
                        <?$search = $db -> query("select * from roles order by id_role asc");
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

                <a href="addAssign.php" class="inter">Назначить роль</a>

                <a href="assigns.php" class="inter">Просмотр ролей по пользователям</a>

                <?$result = $db -> query("select assignments.id_role, role_name, assignments.id_user, login 
                            from assignments, roles, users 
                            where assignments.id_user = users.id_user
                            and assignments.id_role = roles.id_role
                            and assignments.id_role = ". $select = $selected != 0 ? $selected : 1 ." 
                            order by id_user asc");

                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                <ul>
                    <li>
                        <div class="info"><?= $row->login?></div>
                        <div class="interaction">
                            <?if($row->login != "admin"):?>
                            <a
                                href="../handlers/h_moderation/delete_assign.php?id_role=<?=$row->id_role?>&id_user=<?=$row->id_user?>">Удалить</a>
                            <a
                                href="updateAssign.php?id_role=<?=$row->id_role?>&id_user=<?=$row->id_user?>">Изменить</a>
                            <?endif;?>
                        </div>
                    </li>
                </ul>
                <?endwhile;?>

            </div>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>