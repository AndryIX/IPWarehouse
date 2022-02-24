<?
$db = pg_connect("host=localhost port=5432 dbname=IPWarehouse user=postgres password=veresen333");
if(!$db){
    die("Error: failed connect to DataBase!");
}
?>