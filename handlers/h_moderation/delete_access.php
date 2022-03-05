<?
    require "../db_connect.php";

    $id_role = $_GET['id_role'];
    $id_app = $_GET['id_app'];

    $result = $db -> prepare("delete from accesses where id_role = ? and id_app = ?");
    $result -> execute([$id_role, $id_app]);

    header('Location: ../../m_moderation/accesses.php');
?>