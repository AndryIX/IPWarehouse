<?session_start();
    require "../db_connect.php";

    $login = (string)$_POST['update_login'];
    $fio = (string)$_POST['upd_fio'];



    if(trim($_POST['update_password']) == ''){
        $password = (string)$_SESSION['upd_pass'];
    }else{
        $password = (string)sha1($_POST['update_password']);
    }

    $id_user = (int)$_SESSION['upd_id'];
    $result = $db -> prepare("update users set login=?, password=?, fio=? where id_user=?");
    $result -> execute([$login, $password, $fio, $id_user]);
    
    unset($_SESSION['upd_id'], $_SESSION['upd_pass']);

    header('Location: ../../m_moderation/users.php');
?>