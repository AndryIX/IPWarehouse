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
                <div class="add">
                    <h1 class="add__lab">Добавление роли</h1>
                    <label for="role">Роль</label>
                    <input class="add__input" id="role" name="add_role" type="text" placeholder="Придумайте роль..">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>