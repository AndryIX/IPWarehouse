<?session_start();
    require "../db_connect.php";

    
    $denomination = $_POST['denomination'];
    $footnote = $_POST['footnote'];
    
    // $result = $db -> query("select login from users where login = '$id_warehouse'");
    // $check = $result -> rowCount();

    // if($check == 0){
        $autoi = AI_warehouse($db, "warehouse", "id_warehouse");
        $result = $db -> prepare("INSERT INTO warehouse.warehouse VALUES(?, ?, ?)");
        $result -> execute([$autoi, "$denomination", "$footnote"]);
        header('Location: ../../m_warehouse/warehouses.php');
        exit;
    // } else {
    //     $_SESSION['check_succ'] = "Такой логин уже занят другим пользователем!";
    //     header('Location: ../../m_moderation/addUser.php');
    //     exit;
    // }

   

    

?>