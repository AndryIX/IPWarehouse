<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}
require "header.php";
require "handlers/db_connect.php";
?>

        <div class="content">
            <div class="container">
                <div class="showsidebar">
                    Меню пользователя
                </div>
                <div class="hidesidebar">
                    Скрыть меню
                </div>
                <div class="selctrole">
                    <p class="role_list">Выбрать роль</p>
                </div>
                <div class="sidebar">
                    <a href="#">Ссылка</a>
                    <a href="#">Ссылка</a>
                    <a href="#">Ссылка</a>
                    <a href="#">Ссылка</a>
                </div>
                <div class="content_text">

                
                    <table class="table">
                        <thead class="tablehead">
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">

                            <?$result = pg_query($db, "select id_user, login from users");
                            while($row = pg_fetch_assoc($result)):?>
                                <tr>
                                    <td><?= $row['id_user']?></td>
                                    <td><?= $row['login']?></td>
                                </tr>
                            <?endwhile;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<? require "footer.php"; ?>