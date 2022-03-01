<?session_start();
    require "../db_connect.php";

    $update_role = trim($_POST['update_role']);

    $id_role = $_SESSION['upd_id'];

    $result = $db -> prepare("update roles set id_role=?, role_name=? where id_role=?");
    $result -> execute([$id_role, $update_role, $id_role]);

    header('Location: ../../m_moderation/roles.php');
?>