<?session_start();
    require "../db_connect.php";

    $add_role = trim($_POST['add_role']);


    if($add_password === $confirm_pass){
        $autoi = AI($db, "roles", "id_role");
        $result = $db -> prepare("INSERT INTO roles VALUES(:id, :add_role)");
        $result -> execute(['id' => $autoi, 'add_role' => $add_role]);
        header('Location: ../../m_moderation/roles.php');
        exit;
    }else{
        $_SESSION['error_pass'] = "Пароли не совпадают!";
        header('Location: ../../m_moderation/addRole.php');
        exit;
    }

    

?>