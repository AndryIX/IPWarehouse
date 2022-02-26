<? session_start();
if (!$_SESSION['login'] == "admin"){
    header('Location: index.php');
}

if($_SESSION['error_pass']){
    echo "<script>alert(\"".$_SESSION['error_pass']."\");</script>";
}
unset($_SESSION['error_pass']);

require "blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="handlers/handler_addUser.php" method="post">
                <h1 class="add__lab">Добавление пользователя</h1>
                <div class="add">
                    <input class="add__user" name="add_user" type="text" placeholder="Придумайте логин.." required>
                    <input class="add__user" name="add_password" type="password" placeholder="Придумайте пароль.." required>
                    <input class="add__user" name="confirm_pass" type="password" placeholder="Подтвердите пароль.." required>
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "blocks/footer.php"; ?>