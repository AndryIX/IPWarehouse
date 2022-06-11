<?session_start();
    require "../db_connect.php";

    $id_invoice = $_POST['selected_naklad'];
    $id_product = $_POST['selected_product'];
    $quantity = $_POST['count'];
    $price = $_POST['price'];
    $id_currency = $_POST['selected_currency'];

    $result = $db -> query("select id_invoice, id_product, quantity, price, id_currency from warehouse.products_invoice
    where id_invoice = $id_invoice and id_product = $id_product and quantity = $quantity and price = $price and id_currency = $id_currency");
    $check = $result -> rowCount();

    if($check == 0){

    $result = $db -> prepare("INSERT INTO warehouse.products_invoice VALUES(?, ?, ?, ?, ?)");
    $result -> execute([$id_invoice, $id_product,$quantity, $price, $id_currency]);
    header('Location: ../../m_buy/buy_add.php');
    exit;

    }else {
        $_SESSION['check_succ'] = "Накладную, которую вы пытаетесь добавить уже существует!";
        header('Location: ../../m_buy/buy_add.php');
        exit;
    }
    
?>