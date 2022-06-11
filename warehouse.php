<? session_start();



require "handlers/db_connect.php";
require "blocks/header.php";
?>

        <div class="content">
            <div class="container">
                <div class="content_text">
                    <div class="view">


                        <h1>Складской учёт</h1>
                        <a href="../m_warehouse/categories.php" class="inter">Склад 1</a> 
                        <a href="../m_warehouse/units.php" class="inter">Склад 2</a> 
                        <a href="../m_warehouse/products.php" class="inter">Склад 3</a>
                        <a href="../m_warehouse/sheets.php" class="inter">Склад 4</a>
                        <a href="../m_warehouse/warehouses.php" class="inter">Склад 5</a>
                        <a href="../m_warehouse/income_price.php" class="inter">цены по прайсу</a>
                        
                        
                        
                   

                    </div>
                </div>
            </div>
        </div>

<? require "blocks/footer.php"; ?>