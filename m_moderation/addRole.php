<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_moderation/add_role.php" method="post">
                <h1 class="add__lab">Добавление роли</h1>
                <div class="add">
                    <input class="add__input" name="add_role" type="text" placeholder="Придумайте роль.." required>
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>