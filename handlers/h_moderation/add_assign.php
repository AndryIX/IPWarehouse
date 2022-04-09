<?session_start();
    require "../db_connect.php";

    $id_user = trim($_POST['select_user']);
    $id_role = trim($_POST['select_role']);

    $result = $db -> query("select id_user, id_role from assignments where id_user = '$id_user' and id_role = '$id_role'");
    $check = $result -> rowCount();

    if($check == 0){
        $result = $db -> prepare("INSERT INTO assignments VALUES(?, ?)");
        $result -> execute([$id_user, $id_role]);
        header('Location: ../../m_moderation/assigns.php');
        exit;
    }else {
        $_SESSION['check_succ'] = "У этого пользователя уже есть такая роль!";
        header('Location: ../../m_moderation/addAssign.php');
        exit;
    }
?>