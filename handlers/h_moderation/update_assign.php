<?session_start();
    require "../db_connect.php";

    $upd_user_ass = trim($_POST['upd_user_ass']);
    $upd_role_ass = trim($_POST['upd_role_ass']);

    $id_user = $_SESSION['upd_id_user'];
    $id_role = $_SESSION['upd_id_role'];

    $result = $db -> prepare("update assignments set id_role=?, id_user=? where id_user=? and id_role = ?");
    $result -> execute([$upd_role_ass, $upd_user_ass, $id_user, $id_role]);

    unset($_SESSION['upd_id_user'], $_SESSION['upd_id_role']);

    header('Location: ../../m_moderation/assigns.php');
?>