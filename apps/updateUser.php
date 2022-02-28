<? session_start();
if (!$_SESSION['login'] == "admin"){
    header('Location: ../auth.php');
}

$id_user = trim($_GET['id_user']);
$login = trim($_GET['login']);
$password = trim($_GET['password']);

$_SESSION['upd_id'] = $id_user;
$_SESSION['upd_pass'] = $password;

require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <form class="add__form" action="../handlers/update_user.php" method="post">
            <h1 class="add__lab">Изменение пользователя</h1>
            <div class="add">
                <input class="add__user" name="update_login" type="text" value="<?=$login?>" placeholder="Логин.." required>
                <input class="add__user" name="update_password" type="password" placeholder="Пароль..">
                <input class="btn__add" type="submit" name="btn_update" value="ОК">
            </div>
        </form>
    </div>
</div>

<? require "../blocks/footer.php"; ?>