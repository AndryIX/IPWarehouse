<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}

$_SESSION['upd_id_role'] = $_GET['id_role'];
$_SESSION['upd_id_app'] = $_GET['id_app'];

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/update_access.php" method="post">
                <div class="add">
                    <h1 class="add__lab">Переопределение приложения</h1>
                    <label for="updrole">Роль</label>
                    <select name="upd_role_acc" id="updrole" class="selection">
                        <?$search_role = $db -> query("select * from roles order by id_role asc");
                        while($row = $search_role -> fetch(PDO::FETCH_OBJ)):
                            if($row->id_role == "$id_role"):?>
                                <option value="<?=$row->id_role?>" selected><?=$row->role_name?></option>
                            <?else:?>
                                <option value="<?=$row->id_role?>"><?=$row->role_name?></option>
                            <?endif;?>
                        <?endwhile;?>
                    </select>

                    <label for="updapp">Приложение</label>
                    <select name="upd_app_acc" id="updapp" class="selection">
                        <?$search_app = $db -> query("select * from apps order by id_app asc");
                        while($row = $search_app -> fetch(PDO::FETCH_OBJ)):
                            if($row->id_app == "$id_app"):?>
                                <option value="<?=$row->id_app?>" selected><?=$row->app_name?></option>
                            <?else:?>
                                <option value="<?=$row->id_app?>"><?=$row->app_name?></option>
                            <?endif;?>
                        <?endwhile;?>
                    </select>

                    <input class="btn__add" type="submit" value="ОК">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>