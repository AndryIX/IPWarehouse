<?session_start();
    require "../db_connect.php";

    $upd_app_acc = (int)$_POST['upd_app_acc'];
    $upd_role_acc = (int)$_POST['upd_role_acc'];

    $id_role = (int)$_SESSION['upd_id_role'];
    $id_app = (int)$_SESSION['upd_id_app'];

    $result = $db -> prepare("update accesses set id_role=?, id_app=? where id_app=? and id_role = ?");
    $result -> execute([$upd_role_acc, $upd_app_acc, $id_app, $id_role]);

    unset($_SESSION['upd_id_app'], $_SESSION['upd_id_role']);

    header('Location: ../../m_moderation/accesses.php');
?>