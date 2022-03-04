<?session_start();
    require "../db_connect.php";

    $add_login = trim($_POST['add_login']);
    $add_password = trim($_POST['add_password']);
    $confirm_pass = trim($_POST['confirm_pass']);


    if($add_password === $confirm_pass){
        $autoi = AI($db, "users", "id_user");
        $result = $db -> prepare("INSERT INTO users VALUES(:id, :add_login, :add_password)");
        $result -> execute(['id' => $autoi, 'add_login' => $add_login, 'add_password' => sha1($add_password)]);
        header('Location: ../../m_moderation/users.php');
        exit;
    }else{
        $_SESSION['error_pass'] = "Пароли не совпадают!";
        header('Location: ../../m_moderation/addUser.php');
        exit;
    }

    

?>