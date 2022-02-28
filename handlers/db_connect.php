<?php
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=IPWarehouse;user=postgres;password=veresen333");
    if(!$db){
        die("Error: failed connect to DataBase!");
    }

    function AI($db, $sql){
        $autoi = $db -> query("$sql") -> rowCount() + 1;
        return $autoi;
    }


?>
