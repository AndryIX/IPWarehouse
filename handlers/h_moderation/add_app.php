<?session_start();
    require "../db_connect.php";

    $add_app_name = trim($_POST['add_app_name']);
    $add_app_url = trim($_POST['add_app_url']);


    $autoi = AI($db, "apps", "id_app");
    $result = $db -> prepare("INSERT INTO apps VALUES(:id, :add_app, :url_address)");
    $result -> execute(['id' => $autoi, 'add_app' => $add_app_name, 'url_address' => $add_app_url]);
    header('Location: ../../m_moderation/apps.php');
    exit;
?>