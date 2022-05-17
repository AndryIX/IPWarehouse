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
                <div class="add">
                    <h1 class="add__lab">Добавление пользователя</h1>
                    <label for="login">Логин</label>
                    <input class="add__input" id="login" name="add_login" type="text" placeholder="Введите логин..">
                    <label for="password">Пароль</label>
                    <input class="add__input" id="password" name="add_password" type="password" placeholder="Введите пароль..">
                    <label for="confirm_pass">Подтвердите пароль</label>
                    <input class="add__input" id="confirm_pass" name="confirm_pass" type="password" placeholder="Подтвердите пароль..">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>