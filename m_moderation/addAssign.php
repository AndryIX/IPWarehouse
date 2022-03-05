<? session_start();
if ($_SESSION['role'] != 'Администратор'){
    header('Location: ../auth.php');
}
require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/add_assign.php" method="post">
                <h1 class="add__lab">Назначение роли</h1>
                <div class="add">
                    <select name="select_user" class="selection">
                        <?$search_user = $db -> query("select * from users order by id_user asc");
                        while($row = $search_user -> fetch(PDO::FETCH_OBJ)):?>
                                <option value="<?=$row->id_user?>"><?=$row->login?></option>
                        <?endwhile;?>
                    </select>

                    <select name="select_role" class="selection">
                        <?$search_role = $db -> query("select * from roles order by id_role asc");
                        while($row = $search_role -> fetch(PDO::FETCH_OBJ)):?>
                            <option value="<?=$row->id_role?>"><?=$row->role_name?></option>
                        <?endwhile;?>
                    </select>

                    <input class="btn__add" type="submit" name="btn_add" value="Назначить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>