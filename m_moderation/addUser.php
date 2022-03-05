<? session_start();
if ($_SESSION['role'] != 'Администратор'){
    header('Location: ../auth.php');
}

if($_SESSION['error_pass']){
    echo "<script>alert(\"".$_SESSION['error_pass']."\");</script>";
}
unset($_SESSION['error_pass']);

require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/add_user.php" method="post">
                <h1 class="add__lab">Добавление пользователя</h1>
                <div class="add">
                    <input class="add__input" name="add_login" type="text" placeholder="Придумайте логин.." required>
                    <input class="add__input" name="add_password" type="password" placeholder="Придумайте пароль.." required>
                    <input class="add__input" name="confirm_pass" type="password" placeholder="Подтвердите пароль.." required>
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>