<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


$id_user = $_GET['id_user'];
$id_role = $_GET['id_role'];


$_SESSION['upd_id_user'] = $id_user;
$_SESSION['upd_id_role'] = $id_role;

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/update_assign.php" method="post">
                <div class="add">
                    <h1 class="add__lab">Переопределение роли</h1>
                    <label for="upduser">Пользователь</label>
                    <select name="upd_user_ass" id="upduser" class="selection">
                        <?$search_user = $db -> query("select * from users order by id_user asc");
                        while($row = $search_user -> fetch(PDO::FETCH_OBJ)):
                            if($row->id_user == "$id_user"):?>
                                <option value="<?=$row->id_user?>" selected><?=$row->login?></option>
                            <?else:?>
                                <option value="<?=$row->id_user?>"><?=$row->login?></option>
                            <?endif;?>
                        <?endwhile;?>
                    </select>

                    <label for="updrole">Роль</label>
                    <select name="upd_role_ass" id="updrole" class="selection">
                        <?$search_role = $db -> query("select * from roles order by id_role asc");
                        while($row = $search_role -> fetch(PDO::FETCH_OBJ)):
                            if($row->id_role == "$id_role"):?>
                                <option value="<?=$row->id_role?>" selected><?=$row->role_name?></option>
                            <?else:?>
                                <option value="<?=$row->id_role?>"><?=$row->role_name?></option>
                            <?endif;?>
                        <?endwhile;?>
                    </select>
                    <input class="btn__add" type="submit" value="ОК">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>