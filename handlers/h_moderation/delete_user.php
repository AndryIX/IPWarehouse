<?
    require "../db_connect.php";

    $id_user = $_GET['id_user'];
    $result = $db -> prepare("delete from assignments where id_user = ?");
    $result -> execute([$id_user]);
    $result = $db -> prepare("delete from users where id_user = ?");
    $result -> execute([$id_user]);

    header('Location: ../../m_moderation/users.php');
?>