<?session_start();
    require "../db_connect.php";

    $add_login = $_POST['add_login'];
    $add_password = sha1(trim($_POST['add_password']));
    $confirm_pass = sha1(trim($_POST['confirm_pass']));
    
    $result = $db -> query("select login from users where login = '$add_login'");
    $check = $result -> rowCount();

    if($check == 0){
        $autoi = AI($db, "users", "id_user");
        $result = $db -> prepare("INSERT INTO users VALUES(:id, :add_login, :add_password)");
        $result -> execute(['id' => $autoi, 'add_login' => $add_login, 'add_password' => $add_password]);
        header('Location: ../../m_moderation/users.php');
        exit;
    } else {
        $_SESSION['check_succ'] = "Такой логин уже занят другим пользователем!";
        header('Location: ../../m_moderation/addUser.php');
        exit;
    }

   

    

?>