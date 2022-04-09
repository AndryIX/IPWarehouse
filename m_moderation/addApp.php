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
            <form class="add__form" action="../handlers/h_moderation/add_app.php" method="post" name="faddapp" onsubmit="return validateFormAddApp()">
                <h1 class="add__lab">Добавление приложения</h1>
                <div class="add">
                    <input class="add__input" name="add_app_name" type="text" placeholder="Название..">
                    <input class="add__input" name="add_app_url" type="text" placeholder="Ссылка..">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>