<? session_start();
if ($_SESSION['role'] != 'Администратор'){
    header('Location: ../auth.php');
}

$id_app = trim($_GET['id_app']);
$app_name = trim($_GET['app_name']);
$url_address = trim($_GET['url_address']);

$_SESSION['upd_id'] = $id_app;

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/update_app.php" method="post">
            <h1 class="add__lab">Изменение роли</h1>
            <div class="add">
                <input class="add__input" name="update_app" type="text" value="<?=$app_name?>" placeholder="Логин.." required>
                <input class="add__input" name="update_url" type="text" value="<?=$url_address?>" placeholder="Логин.." required>
                <input class="btn__add" type="submit" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>