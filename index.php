<?php get_header(); ?>
<main class="main">
    <div class="top-view">
        <div class="top-view__img">
            <p class="top-view__message"><span class="top-view__message--first">熊</span>猫の手でも<br>
                借りたい<span class="top-view__message--you">あなた</span>へ</p>
        </div>
    </div>
    <div class="margin__article"></div>
    <article class="about" id="about">
        <div class="about__box">
            <h1 class="about__title">About</h1>
            <div class="about__message-block">
                <div class="about__left-block">
                    <p class="about__message">
                        兵庫県で生まれ、<br>
                        大分県で育ち、<br>
                        福岡県の工業大学に通い、<br>
                        岡山県の会社に勤務し、<br>
                        現在は中国に出向中。<br>
                        <br>
                        出身地を聞かれた時に困る30過ぎ。<br>
                        毎日楽しく生活しています。<br>
                        パンダさん。かわいいですよね。
                    </p>
                </div>
                <div class="about__right-block">
                    <img class="about__img"
                        src="<?php echo get_template_directory_uri(); ?>/img/about_ride-on-panda.png" alt="Ride ON!!">
                    <img class="about__img" src="<?php echo get_template_directory_uri(); ?>/img/about_spring-panda.png"
                        alt="Spring now!!">
                    <img class="about__img"
                        src="<?php echo get_template_directory_uri(); ?>/img/about_doraemon-panda.png"
                        alt="I'm Doraemon!!">
                </div>
            </div>
        </div>
        <div class="margin__article"></div>
    </article>
    <article class="service" id="service">
        <div class="margin__article"></div>
        <div class="service__box">
            <h1 class="service__title">Service</h1>
            <div class="service__items">
                <div class="service__items-left">
                    <div class="service-item-left__title-box">
                        <h2 class="service-item-left__title">Coding</h2>
                        <img class="service-item-left__img"
                            src="<?php echo get_template_directory_uri(); ?>/img/service_code-img.png"
                            alt="coading image">
                    </div>
                    <p class="service-item-left__sub-title">デザインデータをコーディングします</p>
                    <p class="service-item-left__message">
                        レスポンシブデザインに対応したコーディングを行います<br>
                        バーガーメニュー等の単純な動作であれば実装致します</p>
                </div>
                <div class="service-item-right">
                    <div class="service-item-right__title-box">
                        <h2 class="service-item-right__title">VBA Macro</h2>
                        <img class="service-item-right__img"
                            src="<?php echo get_template_directory_uri(); ?>/img/service_excel-img.png"
                            alt="Excel VBA image">
                    </div>
                    <p class="service-item-right__sub-title">Excelマクロによる自動化をお手伝いします</p>
                    <p class="service-item-right__message">
                        マクロの作成や修正、お悩み相談を承ります<br>
                        ルーチン作業はパソコン君に処理してもらい、定時に帰ろう</p>
                </div>
            </div>
            <div class="margin__article"></div>
    </article>
    <article class="work" id="work">
        <div class="margin__article"></div>
        <div class="work__box">
            <h1 class="work__title">Work</h1>
            <div class="portfolio">
                <div class="portfolio__box">
                    <div class="portfolio__pc">
                        <div class="portfolio__pc-img"></div>
                    </div>
                    <div class="portfolio__sp">
                        <div class="portfolio__sp-img"></div>
                    </div>
                </div>
                <p class="portfolio__message"><a class="portfolio__template-link" href="https://usagidesign-e.com/"
                        target="_blank" rel="noopener noreferrer"> USAGI DESIGIN -emi-
                        様</a>のテンプレートを使用しております。</p>
            </div>
        </div>
        <div class="margin__article"></div>
    </article>
    <article class="contact" id="contact">
        <div class="margin__article"></div>
        <div class="contact__box">
            <h1 class="contact__title">Contact</h1>
            <p class="contact__message">
                お仕事の依頼や相談、不明な点等、お気軽にご連絡下さい。
            </p>
            <p class="contact__notice">3日以内にご連絡致します。</p>
            <a href="https://forms.gle/XoUQNt9g2LAJRztj8" target="_blank" rel="noopener noreferrer"
                class="btn-contact"><i class="btn-contact__icon fab fa-wpforms"></i>問い合わせはこちら
            </a>
        </div>
        <div class="margin__article"></div>
    </article>
</main>
<?php get_footer(); ?>