<?session_start();
    require "../handlers/db_connect.php";

    $login = trim($_POST['update_login']);

    if(trim($_POST['update_password']) == ''){
        $password = $_SESSION['upd_pass'];
    }else{
        $password = $_POST['update_password'];
    }

    $id_user = $_SESSION['upd_id'];

    $result = $db -> prepare("update users set id_user=?, login=?, password=? where id_user=?");
    $result -> execute([$id_user, $login, sha1($password), $id_user]);

    header('Location: ../apps/users.php');
?>