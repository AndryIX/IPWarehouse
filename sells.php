<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "handlers/db_connect.php";
require "blocks/header.php";
?>

<div class="sells">
    <div class="content">
        <div class="container">
            <div class="sells__header">
                <div class="sells__title">
                    <h1>Продажи</h1>
                </div>
                <div class="sells__add">
                    <a href="../m_sells/sells_add.php">Оформить накладную</a>
                    <a href="../m_sells/invoices.php">Просмотр накладных</a>
            </div>
            <div class="sells__body">
                <div class="sells__row">
            </div>
        </div>
    </div>
</div>

<? require "blocks/footer.php"; ?>