<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


$id_role = trim($_GET['id_role']);
$role_name = trim($_GET['role_name']);

$_SESSION['upd_id'] = $id_role;

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/update_role.php" method="post">
            <div class="add">
                <h1 class="add__lab">Изменение роли</h1>
                <label for="updrole">Роль</label>
                <input class="add__input" id="updrole" name="update_role" type="text" value="<?=$role_name?>" placeholder="Логин.." required>
                <input class="btn__add" type="submit" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>