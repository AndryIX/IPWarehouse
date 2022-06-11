<? session_start();
if(!$_SESSION['login']){
    header('Location: auth.php');
}

require "handlers/db_connect.php";
require "blocks/header.php";?>

<div class="content">
    <div class="container">
        <div class="title">
            <p>
                «КуйбышевАзот» — одна из ведущих российских химических компаний, лидер в производстве капролактама и
                продуктов его переработки, входит в число крупнейших производителей азотных удобрений. Активная
                инвестиционная политика обеспечивает «КуйбышевАзоту» быстрый и эффективный рост и устойчивое развитие.
            </p>
        </div>
        <div class="news-icon">
            <img src="/img/news-ico.svg" alt="Новости">
        </div>
        <div class="news-title">
            <a href="https://www.kuazot.ru/news">Новости</a>
        </div>
        <div class="news-content">

            <div class="news-item">
            «КуйбышевАзот» объявил конкурс на разработку новой архитектурной концепции яхт-клуба «Дружба».
                <a href="https://www.kuazot.ru/news/418-kuybyshevazot-obyavil-konkurs-na-razrabotku-novoy-/" class="more-news">
                    <span></span>
                </a>
            </div>


            <div class="news-item">
            «КуйбышевАзот» подвел итоги работы за I квартал 2022 года
                <a href="https://www.kuazot.ru/news/417-kuybyshevazot-podvel-itogi-raboty-za-i-kvartal-202/" class="more-news">
                    <span></span>
                </a>
            </div>


            <div class="news-item">
            «КуйбышевАзот» продолжает восстанавливать лес
                <a href="https://www.kuazot.ru/news/416-kuybyshevazot-prodolzhaet-vosstanavlivat-les/" class="more-news">
                    <span></span>
                </a>
            </div>
        </div>


        <div class="content_carousel">
            <div class="carousel">
               
            </div>
        </div>
    </div>
</div>

<? require "blocks/footer.php"; ?>