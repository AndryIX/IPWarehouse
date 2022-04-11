<?session_start();
    require "../db_connect.php";

    $add_role = trim($_POST['add_role']);

    $result = $db -> query("select role_name from roles where role_name = '$add_role'");
    $check = $result -> rowCount();

    if($check == 0){
        $autoi = AI($db, "roles", "id_role");
        $result = $db -> prepare("INSERT INTO roles VALUES(:id, :add_role)");
        $result -> execute(['id' => $autoi, 'add_role' => $add_role]);
        header('Location: ../../m_moderation/roles.php');
        exit;
    }else {
        $_SESSION['check_succ'] = "Роль с таким названием уже существует!";
        header('Location: ../../m_moderation/addRole.php');
        exit;
    }
?>