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
                <h1>Пользователи</h1>
                <a href="addUser.php" class="inter">Добавить пользователя</a>
                <div class="view">
                    <?$result = $db -> query("select id_user, login, password from users order by id_user asc");
                        while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                            <ul>
                                <li>
                                    <div class="login"><?= $row->login?></div>
                                    <div class="interaction">
                                        <?if($row -> login != "admin"):?>
                                        <a href="../handlers/h_moderation/delete_user.php?id_user=<?=$row->id_user?>">Удалить</a>
                                        <a href="updateUser.php?id_user=<?=$row->id_user?>&login=<?=$row->login?>&password=<?=$row->password?>">Изменить</a>
                                        <?elseif($_SESSION['login'] == 'admin'):?>
                                        <a href="updateUser.php?id_user=<?=$row->id_user?>&login=<?=$row->login?>&password=<?=$row->password?>">Изменить</a>
                                        <?endif;?>
                                    </div>
                                </li>
                            </ul>
                    <?endwhile;?>

                </div>
            </div>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>