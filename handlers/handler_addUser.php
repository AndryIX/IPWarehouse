<?session_start();
    require "db_connect.php";

    $add_user = $_POST['add_user'];
    $add_password = $_POST['add_password'];
    $confirm_pass = $_POST['confirm_pass'];


    if($add_password === $confirm_pass){
        $autoi = $db -> query("select * from users") -> rowCount();
        $result = $db -> prepare("INSERT INTO users VALUES(:id, :add_user, :add_password)");

        $result -> execute(['id' => $autoi+1, 'add_user' => $add_user, 'add_password' => sha1($add_password)]);

        header('Location: ../addUser.php');
    }else{    
        $_SESSION['error_pass'] = "Пароли не совпадают!";
        header('Location: ../addUser.php');
        exit;
    }

    

?>