<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>


    <div class="content">
        <div class="container">
            <div class="sells__header">
                <div class="sells__title">
                    <h1>Создание накладной</h1>
                </div>
                <div class="sells__add__body">
                    <select class="naklad__select" required></select>
                    <select class="tovar__select" required></select>
                    <input type="text" class="count" placeholder="Введите кол-во" required>
                    <input type="text" class="price" placeholder="Введите цену" required>
                    <select class="currency__select" required></select>
                </div>
                <input type="submit" name="btn_add" value="Создать" class="btn__add">
            </div>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>