<?session_start();
require 'db_connect.php';

$login = $_POST['login'];
$password = $_POST['password'];

$result = $db -> query("select * from users where login = '$login' and password = '".md5($password)."'");
$num_rows = $result -> rowCount();

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