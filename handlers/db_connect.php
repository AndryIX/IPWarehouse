<?php

    try{
        $db = new PDO("pgsql:host=localhost;port=5432;dbname=IPWarehouse;user=postgres;password=123");
    }catch (PDOException $e){
        echo "Ошибка: не удалось установить соединение с базой данных: ".$e -> getMessage();
    }

    function AI($db, $table, $id){
        $result = $db -> query("select max($id) as id from $table") -> fetch(PDO::FETCH_OBJ);
        $autoi = $result -> id + 1;
        return $autoi;
    }

