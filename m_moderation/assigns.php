<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}



require "../handlers/db_connect.php";
require "../blocks/header.php";

$selected = $_GET['selected'];
?>

        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">
                        <h1>Назначения</h1>
                        <form action="assigns.php" method="get">
                            <select name="selected" class="selection">
                                <?$search = $db -> query("select * from users order by id_user asc");
                                while($row = $search -> fetch(PDO::FETCH_OBJ)):?>
                                        <option value="<?=$row->id_user?>" <?if($row -> id_user == $selected) echo 'selected';?>><?=$row->login?></option>
                                <?endwhile;?>
                            </select>
                            <button type="submit" class="btn__search" name="">Показать</button>
                        </form>

                        <a href="addAssign.php" class="inter">Назначить роль</a>

                        <a href="assigns_by_role.php" class="inter">Просмотр пользователей по ролям</a>
                        
                        <?if(isset($selected)){
                            $result = $db -> query("select assignments.id_role, role_name, assignments.id_user, login 
                            from assignments, roles, users 
                            where assignments.id_user = users.id_user
                            and assignments.id_role = roles.id_role
                            and assignments.id_user = $selected
                            order by id_role asc");
                        }else{
                            $result = $db -> query("select assignments.id_role, role_name, assignments.id_user, login 
                            from assignments, roles, users 
                            where assignments.id_user = users.id_user
                            and assignments.id_role = roles.id_role
                            and assignments.id_user = 1 
                            order by id_role asc");
                        }

                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->role_name?></div>
                                    <div class="interaction">
                                        <?if($row->role_name != "Администратор"):?>
                                            <a href="../handlers/h_moderation/delete_assign.php?id_role=<?=$row->id_role?>&id_user=<?=$row->id_user?>">Удалить</a>
                                            <a href="updateAssign.php?id_role=<?=$row->id_role?>&id_user=<?=$row->id_user?>">Изменить</a>
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