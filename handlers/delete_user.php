<?
    require "../handlers/db_connect.php";

    $id_user = $_GET['id_user'];
    $result = $db -> prepare("delete from users where id_user = ?");
    $result -> execute([$id_user]);

    header('Location: ../apps/users.php');
?>