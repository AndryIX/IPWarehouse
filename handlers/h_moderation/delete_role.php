<?
    require "../db_connect.php";

    $id_role = $_GET['id_role'];
    $result = $db -> prepare("delete from assignments where id_role = ?");
    $result -> execute([$id_role]);
    $result = $db -> prepare("delete from accesses where id_role = ?");
    $result -> execute([$id_role]);
    $result = $db -> prepare("delete from roles where id_role = ?");
    $result -> execute([$id_role]);

    header('Location: ../../m_moderation/roles.php');
?>