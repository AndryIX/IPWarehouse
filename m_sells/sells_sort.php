<? session_start();
if(!$_SESSION['login']){
    header('Location: ../auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>

<div class="content">
    <div class="container">
        <div class="content_text">
            <div class="view">
                <h1>Накладные</h1>
                
            </div>
        </div>
    </div>
</div>

<? require "../blocks/footer.php"; ?>