<?session_start();
if(isset($_POST['btn_exit'])){
    unset($_SESSION['login']);
    header("Location: auth.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Fira+Sans:wght@200&family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css.css">
    <title>Бургер</title>
</head>
<body>
        <header class="header">
            <div class="container">
                <div class="header_body">
                <a href="#" class="logo">
                    <img src="img/logo.svg" alt="Логотип" width="60px">
                </a>
                <div class="burger">
                    <span></span>
                </div>
                <nav class="menu">
                    <ul class="header_list">
                        <li>
                            <a href="#" class="header_link">Главная</a>
                        </li>
                        <li>
                            <a href="#" class="header_link">О нас</a>
                        </li>
                        <li>
                            <a href="#" class="header_link">Клиентам</a>
                        </li>
                        <li>
                            <a href="#" class="header_link">Контакты</a>
                        </li>
                        <?if($_SESSION['login']): ?>
                            <form class=form__exit method="post">
                                <button type="submit" name="btn_exit" class="btn__exit"><?echo 'Выйти из: '.$_SESSION['login'];?></button>
                            </form>
                        <?endif;?>
                    </ul>
                   
                </nav>
            </div>
            </div>
        </header>