<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}
if($_SESSION['error_pass'])
    echo "<script>alert(\"".$_SESSION['error_pass']."\");</script>";
    unset($_SESSION['error_pass']);

if($_SESSION['check_succ'])
    echo "<script>alert(\"".$_SESSION['check_succ']."\");</script>";
    unset($_SESSION['check_succ']);



require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/add_user.php" method="post" name="fadduser" onsubmit="return validateFormAddUser()">
                <h1 class="add__lab">Добавление пользователя</h1>
                <div class="add">
                    <input class="add__input" name="add_login" type="text" placeholder="Придумайте логин..">
                    <input class="add__input" name="add_password" type="password" placeholder="Придумайте пароль..">
                    <input class="add__input" name="confirm_pass" type="password" placeholder="Подтвердите пароль..">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>