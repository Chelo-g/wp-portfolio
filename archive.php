<?php get_header(); ?>


<article class="page">
    <div class="margin__page-top"></div>
    <div class="margin__box">
        <h1 class="work-info__title">
            <?php echo get_query_var('post_type'); ?> Archive
        </h1>
        <ul class="work-list--workpage">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
            <li class="work-list__item--workpage">
                <?php the_post_thumbnail('large', array('class' => 'work-list__thumbnail')); ?>
                <div class="work-list__link">
                    <div class="work-list__date">
                        <?php the_terms($post->ID, 'food-year') ?>
                    </div>
                    <div class="work-list__category">
                        <?php the_terms($post->ID, 'food-type') ?>
                    </div>
                    <div class="work-list__title">
                        <?php the_title(); ?>
                    </div>
                </div>
            </li>
            <?php
                endwhile;
            endif;
            ?>
        </ul>
        <?php if (function_exists("the_pagination")) the_pagination(); ?>
        <div class="margin__pagination"></div>
        <?php
        wp_reset_postdata();
        ?>
    </div>
</article>
<?php get_footer(); ?>