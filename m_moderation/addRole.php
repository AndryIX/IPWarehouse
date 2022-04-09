<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}
if($_SESSION['check_succ'])
    echo "<script>alert(\"".$_SESSION['check_succ']."\");</script>";
    unset($_SESSION['check_succ']);

require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/add_role.php" method="post" name="faddrole" onsubmit="return validateFormAddRole()">
                <h1 class="add__lab">Добавление роли</h1>
                <div class="add">
                    <input class="add__input" name="add_role" type="text" placeholder="Придумайте роль..">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>