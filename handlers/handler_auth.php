<?session_start();
require 'db_connect.php';

$login = $_POST['login'];
$password = $_POST['password'];
$_SESSION = [];

$result = pg_query($db, "select * from users where login = '$login' and password = '".md5($password)."'");
if(pg_num_rows($result) > 0){
    $_SESSION['login'] = $login;
    header('Location: ../index.php');
    exit;
}else{
    $_SESSION['error'] = "Неправильно введён логин или пароль!";
    header("Location: ../auth.php");
    exit;
}
?>