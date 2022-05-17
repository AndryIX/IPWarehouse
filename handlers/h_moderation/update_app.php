<?session_start();
    require "../db_connect.php";

    $update_app = (string)$_POST['update_app'];
    $update_url = (string)$_POST['update_url'];  

    $id_app = (int)$_SESSION['upd_id'];

    $result = $db -> prepare("update apps set id_app=?, app_name=?, url_address=? where id_app=?");
    $result -> execute([$id_app, $update_app, $update_url, $id_app]);

    unset($_SESSION['upd_id']);

    header('Location: ../../m_moderation/apps.php');
?>