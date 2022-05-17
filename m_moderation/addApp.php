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
                <div class="add">
                    <h1 class="add__lab">Добавление приложения</h1>
                    <label for="appname">Название приложения</label>
                    <input class="add__input" id="appname" name="add_app_name" type="text" placeholder="Введите название..">
                    <label for="appurl">URL адрес приложения</label>
                    <input class="add__input" id="appurl" name="add_app_url" type="text" placeholder="Введите ссылку..">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>