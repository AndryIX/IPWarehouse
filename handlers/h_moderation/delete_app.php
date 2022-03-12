<?
    require "../db_connect.php";

    $id_app = $_GET['id_app'];

    $result = $db -> prepare("delete from accesses where id_app = ?");
    $result -> execute([$id_app]);
    $result = $db -> prepare("delete from apps where id_app = ?");
    $result -> execute([$id_app]);
    
    header('Location: ../../m_moderation/apps.php');
?>