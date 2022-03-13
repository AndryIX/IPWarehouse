<? session_start();
if(!$_SESSION['role']){
    header('Location: auth.php');
}

require "handlers/db_connect.php";
require "blocks/header.php";
?>

        <div class="content">
            <div class="container">
                            <?
                            $result = $db -> query("select login from users");
                            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                                    <div class="employ"><p><?= $row->login?></p></div>
                            <?endwhile;?>
            </div>
        </div>

<? require "blocks/footer.php"; ?>