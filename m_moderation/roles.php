<? session_start();
if($_SESSION['role'] != 'Администратор'){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>

        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">
                        <h1>Роли</h1>
                        <a href="addRole.php" class="inter">Добавить роль</a>
                        
                        <?$result = $db -> query("select id_role, role_name from roles order by id_role asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div><?= $row->role_name?></div>
                                    <div class="interaction">
                                        <?if($row -> role_name != "Администратор"):?>
                                            <a href="../handlers/h_moderation/delete_role.php?id_role=<?=$row->id_role?>">Удалить</a>
                                            <a href="updateRole.php?id_role=<?=$row->id_role?>&role_name=<?=$row->role_name?>">Изменить</a>
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