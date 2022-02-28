<?session_start();
require 'db_connect.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);

$result = $db -> query("select * from users where login = '$login' and password = '".sha1($password)."'");
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