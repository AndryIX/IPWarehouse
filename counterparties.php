<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}

require "handlers/db_connect.php";
require "blocks/header.php";
?>

        <div class="content">
            <div class="container">
                            <?
                            $result = $db -> query("select * from warehouse.counterparties, warehouse.countries
                                                    where counterparties.id_country = countries.id_country");
                            while($row = $result -> fetch(PDO::FETCH_OBJ)):?>
                                    <div class="employ">
                                        <div>
                                            <?="Контрагент: ". $row->counterparty_name?><br>
                                            <?="ИНН/КПП: ". $row->INN."/".$row->KPP?><br>
                                            <?="ОГРН: ". $row->OGRN?><br>
                                            <?="ОКПО: ". $row->OKPO?><br>
                                            <?="Адрес: ". $row->address?><br>
                                            <?="Телефон: ". $row->phone?><br>
                                            <?="E-mail адрес: ". $row->email?><br>
                                            <?="БИК: ". $row->BIK?><br>
                                            <?="Банк: ". $row->bank?><br>
                                            <?="К/с: ". $row->KS?><br>
                                            <?="Р/с: ". $row->RS?><br>
                                            <?="ФИО директора: ". $row->FIO?><br>
                                            <?="Ответственный: ". $row->FIO_otv?><br>
                                            <?="Страна: ". $row->country_name?>
                                        </div>
                                    </div>
                            <?endwhile;?>
            </div>
        </div>

<? require "blocks/footer.php"; ?>