<?session_start();
    require "../db_connect.php";

    $add_app_name = $_POST['add_app_name'];
    $add_app_url = trim($_POST['add_app_url']);

    $result = $db -> query("select app_name, url_address from apps where app_name = '$add_app_name' and url_address = '$add_app_url'");
    $check = $result -> rowCount();

    if($check == 0){
        $autoi = AI($db, "apps", "id_app");
        $result = $db -> prepare("INSERT INTO apps VALUES(:id, :add_app, :url_address)");
        $result -> execute(['id' => $autoi, 'add_app' => $add_app_name, 'url_address' => $add_app_url]);
        header('Location: ../../m_moderation/apps.php');
        exit;
    }else {
        $_SESSION['check_succ'] = "Приложение, которое вы пытаетесь добавить уже существует!";
        header('Location: ../../m_moderation/addApp.php');
        exit;
    }
        
?>