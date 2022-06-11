<?session_start();
require 'db_connect.php';

$login = (string)$_POST['login'];
$password = (string)$_POST['password'];

$result = $db -> query("select role_name, login, password  
                        from assignments, users, roles
                        where assignments.id_role = roles.id_role
                        and assignments.id_user = users.id_user
                        and login = '$login' 
                        and password = '".sha1($password)."'");

$num_rows = $result -> rowCount();

$login = $result -> fetch(PDO::FETCH_OBJ) -> login;

if($num_rows > 0){
    $_SESSION['login'] = $login;
    header('Location: ../index.php');
    exit;
}else{
    $_SESSION['error'] = "Неправильно введён логин или пароль!";
    header("Location: ../auth.php");
    exit;
}
?>