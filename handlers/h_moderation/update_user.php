<?session_start();
    require "../db_connect.php";

    $login = $_POST['update_login'];

    if(trim($_POST['update_password']) == ''){
        $password = $_SESSION['upd_pass'];
    }else{
        $password = sha1($_POST['update_password']);
    }

    $id_user = $_SESSION['upd_id'];


    $result = $db -> prepare("update users set id_user=?, login=?, password=? where id_user=?");
    $result -> execute([$id_user, $login, $password, $id_user]);
    
    unset($_SESSION['upd_id'], $_SESSION['upd_pass']);

    header('Location: ../../m_moderation/users.php');
?>