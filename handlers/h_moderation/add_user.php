<?session_start();
    require "../db_connect.php";

    $add_fio = (string)$_POST['add_fio'];
    $add_login = (string)$_POST['add_login'];
    $add_password = (string)sha1(trim($_POST['add_password']));
    $confirm_pass = (string)sha1(trim($_POST['confirm_pass']));
    
    $result = $db -> query("select login from users where login = '$add_login'");
    $check = $result -> rowCount();

    if($check == 0){
        $autoi = AI($db, "users", "id_user");
        $result = $db -> prepare("INSERT INTO users VALUES(:id, :add_login, :add_password, :add_fio)");
        $result -> execute(['id' => $autoi, 'add_login' => $add_login, 'add_password' => $add_password, 'add_fio' => $add_fio]);
        header('Location: ../../m_moderation/users.php');
        exit;
    } else {
        $_SESSION['check_succ'] = "Такой логин уже занят другим пользователем!";
        header('Location: ../../m_moderation/addUser.php');
        exit;
    }
?>