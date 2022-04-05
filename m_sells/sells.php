<? session_start();
if(!$_SESSION['role']){
    header('Location: auth.php');
}

require "../handlers/db_connect.php";
require "../blocks/header.php";
?>



<div class="sells">
    <div class="content">
        <div class="container">
            <div class="sells__header">
                <div class="sells__title">
                    <h1>Продажи</h1>
                </div>
                <div class="sells__add">
                    <a href="../m_sells/sells__add.php">Оформить накладную</a>
                </div>
            </div>
            <div class="sells__body">
                <div class="sells__row">
                    <div class="sells__items">


                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 ₽.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 ₽.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 ₽.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 Р.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 Р.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 Р.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 Р.
                            </div>
                        </div>

                        <div class="sells__item">
                            <div class="sells__item__title">
                                Компьютер
                            </div>
                            <div class="sells__item__count">
                                Количество на складе: 13шт.
                            </div>
                            <div class="sells__item__price">
                                Цена товара: 17'000 ₽.
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>