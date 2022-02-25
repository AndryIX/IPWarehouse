<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}

require "header.php";?>

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
                                <th>Заголовок1</th>
                                <th>Заголовок1</th>
                                <th>Заголовок1</th>
                                <th>Заголовок1</th>
                                <th>Заголовок1</th>
                                <th>Заголовок1</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">
                            <tr>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                            </tr>
                            <tr>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                                <td>Текст</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<? require "footer.php"; ?>