<? session_start();


require "../handlers/db_connect.php";
require "../blocks/header.php";?>

    <div class="content">
        <div class="container">
            <form class="add__form" action="../handlers/h_warehouse/add_warehouse.php" method="post" name="fadduser">
                <h1 class="add__lab">Добавление склада</h1>
                <div class="add">
                 
                    <input class="add__input" name="denomination"  placeholder="">
                    <input class="add__input" name="footnote"      placeholder="">
                    <input class="btn__add" type="submit" name="btn_add" value="Добавить">
                </div>
            </form>
        </div>
    </div>

<? require "../blocks/footer.php"; ?>