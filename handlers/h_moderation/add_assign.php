<?session_start();
    require "../db_connect.php";

    $id_user = trim($_POST['select_user']);
    $id_role = trim($_POST['select_role']);

    $result = $db -> prepare("INSERT INTO assignments VALUES(?, ?)");
    $result -> execute([$id_user, $id_role]);
    header('Location: ../../m_moderation/assign.php');
    exit;
?>