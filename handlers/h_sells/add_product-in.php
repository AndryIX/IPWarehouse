<?session_start();
    require "../db_connect.php";

    $id_invoice = $_POST['selected_naklad'];
    $name_product = $_POST['selected_product'];
    $quantity = $_POST['count'];
    $price = $_POST['price'];
    $id_currency = $_POST['selected_currency'];

    $result = $db -> prepare("INSERT INTO warehouse.products_invoice VALUES(?, ?, ?, ?, ?)");
    $result -> execute([$id_invoice, $name_product,$quantity, $price, $id_currency]);
    header('Location: ../../m_sells/sells_add.php');
    exit;


    
?>