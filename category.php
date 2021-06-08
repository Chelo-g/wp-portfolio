<?php get_header(); ?>


<article class="page">
    <div class="margin__page-top"></div>
    <div class="margin__box">
        <h1 class="work-info__title">
            <?php
            echo get_query_var('category_name');
            ?>
        </h1>
        <ul class="work-list--workpage">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
            <li class="work-list__item--workpage">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('large', array('class' => 'work-list__thumbnail')); ?>
                </a>
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
            <?php
                endwhile;
            endif;
            ?>
        </ul>
        <?php if (function_exists("the_pagination")) the_pagination(); ?>
        <div class="margin__pagination"></div>
    </div>
</article>
<?php get_footer(); ?>