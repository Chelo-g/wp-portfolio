<?php get_header(); ?>

<article class="service" id="service">
    <div class="margin__page-top"></div>
    <div class="service__box">
        <h1 class="service__title">Service</h1>
        <div class="service__items">
            <div class="service__items-left">
                <div class="service-item-left__title-box">
                    <h2 class="service-item-left__title">Coding</h2>
                    <img class="service-item-left__img"
                        src="<?php echo get_template_directory_uri(); ?>/img/service_code-img.png" alt="coading image">
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
</article>
<?php get_footer('white'); ?>