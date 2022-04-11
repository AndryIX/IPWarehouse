<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}


require "handlers/db_connect.php";
require "blocks/header.php";
?>

        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">


                        <h1>Складской учёт</h1>
                        <a href="../m_warehouse/categories.php" class="inter">Категории товаров</a> 
                        <a href="../m_warehouse/units.php" class="inter">Единицы измерения</a> 
                        <a href="../m_warehouse/products.php" class="inter">Товары</a>
                        <a href="../m_warehouse/sheets.php" class="inter">Прайсы</a>
                        <a href="../m_warehouse/warehouses.php" class="inter">Склады</a>
                        <a href="../m_warehouse/income_price.php" class="inter">цены по прайсу</a>
                        
                        
                        
                   

                    </div>
                </div>
            </div>
        </div>

<? require "blocks/footer.php"; ?>