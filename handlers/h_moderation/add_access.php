<?session_start();
    require "../db_connect.php";

    $id_role = trim($_POST['select_role']);
    $id_app = trim($_POST['select_app']);

    $result = $db -> prepare("INSERT INTO accesses VALUES(?, ?)");
    $result -> execute([$id_role, $id_app]);
    header('Location: ../../m_moderation/accesses.php');
    exit;
?>