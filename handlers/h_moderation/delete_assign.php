<?
    require "../db_connect.php";

    $id_role = (int)$_GET['id_role'];
    $id_user = (int)$_GET['id_user'];

    $result = $db -> prepare("delete from assignments where id_role = ? and id_user = ?");
    $result -> execute([$id_role, $id_user]);

    header('Location: ../../m_moderation/assigns.php');
?>