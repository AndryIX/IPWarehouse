<?session_start();
if(isset($_POST['btn_exit'])){
    unset($_SESSION['role']);
    header("Location: ../auth.php");
}

if(!$_SESSION['role']){
    header('Location: ../auth.php');
    exit;
}
    $role = $_SESSION['role'];
    $menu = $db -> query("select role_name, app_name, url_address
                            from accesses, apps, roles
                            where accesses.id_app = apps.id_app
                            and accesses.id_role = roles.id_role
                            and role_name = '$role'");
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Бургер</title>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Fira+Sans:wght@200&family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.scss">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header_body">
                <a href="/index.php" class="logo">
                    <img src="../img/logo.svg" alt="Логотип" width="60px">
                </a>
                <div class="showsidebar">
                                <p>＋</p>
                                </div>
                                <div class="hidesidebar">
                                <p>ー</p>
                                </div>
                                <div class="sidebar">
                                    <?if($_SESSION['role'] == 'Администратор'):?>
                                        <h1>Аадминистрирование</h1>
                                        <div>
                                            <?while($link = $menu -> fetch(PDO::FETCH_OBJ)):?>
                                                <a href="<?=$link->url_address?>"><?=$link->app_name?></a>
                                            <?endwhile;?>
                                            <a href="../m_moderation/accesses.php">Доступы к приложениям</a>
                                        </div>
                                    <?endif;?>
                                </div>
                <div class="burger">
                    <span></span>
                </div>
                
                    <nav class="menu">
                            <ul class="header_list">
                                <li>
                                    <a href="../index.php" class="header_link">Главная</a>
                                </li>
                                <li>
                                    <a href="../work.php" class="header_link">Сотрудники</a>
                                </li>
                                <li>
                                    <a href="#" class="header_link">Контакты</a>
                                </li>
                                    <li>
                                    <form class="form__exit" method="post">
                                        <button type="submit" name="btn_exit" class="btn__exit">Выйти</button>
                                    </form>
                                </li>
                        </ul>
                    
                    </nav>
                </div>
            </div>
        </header>