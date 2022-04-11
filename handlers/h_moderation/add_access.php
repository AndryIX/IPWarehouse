<?session_start();
    require "../db_connect.php";

    $id_role = trim($_POST['select_role']);
    $id_app = trim($_POST['select_app']);

    $result = $db -> query("select id_role, id_app from accesses where id_role = $id_role and id_app = $id_app");
    $check = $result -> rowCount();

    if($check == 0){
        $result = $db -> prepare("INSERT INTO accesses VALUES(?, ?)");
        $result -> execute([$id_role, $id_app]);
        header('Location: ../../m_moderation/accesses.php');
        exit;
    }else {
        $_SESSION['check_succ'] = "У выбранной роли уже имеется доступ к данному приложению!";
        header('Location: ../../m_moderation/addAccess.php');
        exit;
    }
?>