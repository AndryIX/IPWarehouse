<?php
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=IPWarehouse;user=postgres;password=123");
    if(!$db){
        die("Error: failed connect to DataBase!");
    }

    function AI($db, $table, $id){
        $side = $db -> query("select max($id) as id from $table") -> fetch(PDO::FETCH_OBJ);
        $autoi = $side -> id + 1;
        return $autoi;
    }


?>
