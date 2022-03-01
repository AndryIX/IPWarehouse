<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}
require "blocks/header.php";
require "handlers/db_connect.php";
?>

        <div class="content">
            <div class="container">
               
                <div class="content_text">
                    <table class="table">
                        <thead class="tablehead">
                            <tr>
                                <th>Login</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">

                            <?
                            $result = $db -> query("select login from users");
                            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                                <tr>
                                    <td><?= $row->login?></td>
                                </tr>
                            <?endwhile;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<? require "blocks/footer.php"; ?>