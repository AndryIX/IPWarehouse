<?
    require "../db_connect.php";

    $id_warehouse = $_GET['id_warehouse'];
    $result = $db -> prepare("delete from warehouse.products where id_warehouse = ?");
    $result -> execute([$id_warehouse]);
    $result = $db -> prepare("delete from warehouse.warehouse where id_warehouse = ?");
    $result -> execute([$id_warehouse]);

    header('Location: ../../m_warehouse/warehouses.php');
?>