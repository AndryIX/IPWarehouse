<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


$_SESSION['upd_id'] = (int)$_GET['id_app'];
$app_name = (string)$_GET['app_name'];
$url_address = (string)trim($_GET['url_address']);


require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/update_app.php" method="post">
            <div class="add">
                <h1 class="add__lab">Изменение приложения</h1>
                <label for="updapp">Приложение</label>
                <input class="add__input" id="updapp" name="update_app" type="text" value="<?=$app_name?>" placeholder="Логин.." required>
                <label for="updurl">URL адрес приложения</label>
                <input class="add__input" id="updurl" name="update_url" type="text" value="<?=$url_address?>" placeholder="Логин.." required>
                <input class="btn__add" type="submit" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>