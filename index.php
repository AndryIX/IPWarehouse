<? session_start();
if(!$_SESSION['role']){
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
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur temporibus labore aspernatur
                    asperiores ipsa molestiae numquam unde nulla magni illo. Id molestiae blanditiis fuga obcaecati nesciunt
                    numquam ad. Voluptatum, fugit?
                </p>
                <a href="#" class="more-news">
                    <span></span>
                </a>
            </div>


            <div class="news-item">
                <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur temporibus labore aspernatur
                    asperiores ipsa molestiae numquam unde nulla magni illo. Id molestiae blanditiis fuga obcaecati nesciunt
                    numquam ad. Voluptatum, fugit?
                </p>
                <a href="#" class="more-news">
                    <span></span>
                </a>
            </div>


            <div class="news-item">
                <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur temporibus labore aspernatur
                    asperiores ipsa molestiae numquam unde nulla magni illo. Id molestiae blanditiis fuga obcaecati nesciunt
                    numquam ad. Voluptatum, fugit?
                </p>
                <a href="#" class="more-news">
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