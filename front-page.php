<?php get_header(); ?>
<main class="main">
    <div class="top-view">
        <div class="top-view__img">
            <p class="top-view__message"><span class="top-view__message--first">熊</span>猫の手でも<br>
                借りたい<span class="top-view__message--you">あなた</span>へ</p>
        </div>
    </div>


    <div class="margin__article"></div>
    <div class="work-info">
        <div class="work-info__box">
            <h1 class="work-info__title"><a class="nav__link" href="<?php echo get_category_link(3); ?>">Works</a></h1>
            <div class="swiper-container fornt-page-swiper">
                <ul class="work-list swiper-wrapper">
                    <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                    <li class="work-list__item swiper-slide">
                        <?php the_post_thumbnail('large', array('class' => 'work-list__thumbnail')); ?>
                        <a class="work-list__link" href="<?php the_permalink(); ?>">
                            <div class="work-list__date">
                                <?php echo get_the_date('y.m.d'); ?>
                            </div>
                            <div class="work-list__category">
                                <?php $cat = get_the_category();
                                        echo $cat[0]->name; ?>
                            </div>
                            <div class="work-list__title">
                                <?php the_title(); ?>
                            </div>
                        </a>
                    </li>
                    <?php endwhile;
                    endif; ?>
                </ul>
                <!-- If we need pagination -->
                <div class="swiper-pagination fornt-page-swiper__pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev fornt-page-swiper__btn"></div>
                <div class="swiper-button-next fornt-page-swiper__btn"></div>
            </div>
        </div>
    </div>
    <div class="margin__box">
        <div class="food-info">
            <h1 class="food-info__title"><a class="nav__link" href="
            <?php
            echo get_category_link(get_cat_ID('Food')); ?>">
                    foods</a>
            </h1>
            <div class="swiper-container fornt-page-swiper">
                <ul class="work-list swiper-wrapper">
                    <?php
                    $news_query = new WP_Query(
                        array(
                            'post_type' => array('post', 'food'),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => 'Food',
                                ),
                            ),
                            'posts_per_page' => 6,
                        )
                    );
                    ?>
                    <?php if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) : $news_query->the_post(); ?>
                    <li class="work-list__item swiper-slide">
                        <?php the_post_thumbnail('large', array('class' => 'work-list__thumbnail')); ?>
                        <div class="work-list__link">
                            <div class="work-list__category">
                                <?php $cat = get_the_category();
                                        echo $cat[0]->name; ?>
                            </div>
                            <div class="work-list__title">
                                <?php the_title(); ?>
                            </div>
                        </div>
                    </li>
                    <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                </ul>
                <!-- If we need pagination -->
                <div class="swiper-pagination fornt-page-swiper__pagination"></div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev fornt-page-swiper__btn"></div>
                <div class="swiper-button-next fornt-page-swiper__btn"></div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>