<? session_start();
if ($_SESSION['role'] != 'Администратор'){
    header('Location: ../auth.php');
}
require "../handlers/db_connect.php";
require "../blocks/header.php";?>

<div class="content">
    <div class="container">
        <div class="sells__header">
            <div class="sells__title">
                 <h1>Создание накладной</h1>
            </div>
        </div>
        <div class="sells__add__body">
            <select class="naklad__select"></select>

            <select class="tovar__select"></select>

            <input type="text" class="count">

            <input type="text" class="price">

            <select class="currency__select"></select>
            <br>
            <a href="#">Создать</a>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>