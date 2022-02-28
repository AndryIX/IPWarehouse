<?session_start();
    require "db_connect.php";

    $add_user = $_POST['add_user'];
    $add_password = $_POST['add_password'];
    $confirm_pass = $_POST['confirm_pass'];


    if($add_password === $confirm_pass){
        $autoi = AI($db, "select * from users");
        $result = $db -> prepare("INSERT INTO users VALUES(:id, :add_user, :add_password)");
        $result -> execute(['id' => $autoi, 'add_user' => $add_user, 'add_password' => sha1($add_password)]);
        header('Location: ../apps/users.php');
        exit;
    }else{
        $_SESSION['error_pass'] = "Пароли не совпадают!";
        header('Location: ../apps/addUser.php');
        exit;
    }

    

?>