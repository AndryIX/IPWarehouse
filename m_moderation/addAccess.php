<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}

if($_SESSION['check_succ'])
    echo "<script>alert(\"".$_SESSION['check_succ']."\");</script>";
    unset($_SESSION['check_succ']);

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/add_access.php" method="post">
            <div class="add">
                <h1 class="add__lab">Добавление доступа</h1>
                <label for="selectrole">Роль</label>
                <select name="select_role" id="selectrole" class="selection">
                    <?$search_role = $db -> query("select * from roles order by id_role asc");
                        while($row = $search_role -> fetch(PDO::FETCH_OBJ)):?>
                    <option value="<?=$row->id_role?>"><?=$row->role_name?></option>
                    <?endwhile;?>
                </select>

                <label for="selectapp">Приложение</label>
                <select name="select_app" id="selectapp" class="selection">
                    <?$search_user = $db -> query("select * from apps order by id_app asc");
                        while($row = $search_user -> fetch(PDO::FETCH_OBJ)):?>
                    <option value="<?=$row->id_app?>"><?=$row->app_name?></option>
                    <?endwhile;?>
                </select>

                <input class="btn__add" type="submit" name="btn_add" value="Добавить">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>