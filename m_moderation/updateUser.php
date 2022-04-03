<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


$login = $_GET['login'];

$id_user = trim($_GET['id_user']);
$password = trim($_GET['password']);

$_SESSION['upd_id'] = $id_user;
$_SESSION['upd_pass'] = $password;

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/h_moderation/update_user.php" method="post">
            <h1 class="add__lab">Изменение пользователя</h1>
            <div class="add">
                <?if($login == "admin"):?>
                    <input class="add__input" name="update_login" type="text" value="<?=$login?>" readonly placeholder="Логин.." required>
                <?elseif($login != "admin"):?>
                    <input class="add__input" name="update_login" type="text" value="<?=$login?>" placeholder="Логин.." required>
                <?endif;?>
                <input class="add__input" name="update_password" type="password" placeholder="Пароль..">
                <input class="btn__add" type="submit" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>