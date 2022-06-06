<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


$login = (string)$_GET['login'];
$fio = (string)$_GET['fio'];

$_SESSION['upd_id'] = $_GET['id_user'];
$_SESSION['upd_pass'] = $_GET['password'];

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/update_user.php" method="post">
            <div class="add">
                <h1 class="add__lab">Изменение пользователя</h1>

                <?if($login == "admin"):?>
                    <label for="updlogin">Логин</label>
                    <input class="add__input" id="updlogin" name="update_login" type="text" value="<?=$login?>" readonly placeholder="Логин.." required>
                <?elseif($login != "admin"):?>
                    <label for="updlogin">Логин</label>
                    <input class="add__input" id="updlogin" name="update_login" type="text" value="<?=$login?>" placeholder="Логин.." required>
                <?endif;?>
                <label for="fio">ФИО</label>
                <input class="add__input" id="fio" name="upd_fio" type="text" value="<?=$fio?>" placeholder="ФИО..">
                <label for="updpassword">Пароль</label>
                <input class="add__input" id="password" name="update_password" type="password" placeholder="Пароль..">
                <input class="btn__add" type="submit" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>