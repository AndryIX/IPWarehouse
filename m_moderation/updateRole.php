<? session_start();
if ($_SESSION['login'] != "admin"){
    header('Location: ../auth.php');
}

$id_role = trim($_GET['id_role']);
$role_name = trim($_GET['role_name']);

$_SESSION['upd_id'] = $id_role;

require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/update_role.php" method="post">
            <h1 class="add__lab">Изменение пользователя</h1>
            <div class="add">
                <input class="add__input" name="update_role" type="text" value="<?=$role_name?>" placeholder="Логин.." required>
                <input class="btn__add" type="submit" name="btn_update" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>