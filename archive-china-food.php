<?php get_header(); ?>


<article class="page">
    <div class="margin__page-top"></div>
    <div class="margin__box">
        <h1 class="work-info__title">
            Chinese Food
        </h1>
        <ul class="work-list--workpage">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
            <li class="work-list__item--workpage">
                <?php the_post_thumbnail('large', array('class' => 'work-list__thumbnail')); ?>
                <div class="work-list__link">
                    <div class="work-list__category">
                        <?php
                                if (mb_strlen($post->post_title, 'UTF-8') > 20) {
                                    $title = mb_substr($post->post_title, 0, 20, 'UTF-8');
                                    echo $title . '……';
                                } else {
                                    echo $post->post_title;
                                }
                                ?>
                    </div>
                    <div class="work-list__title">
                        <?php
                                if (mb_strlen($post->post_content, 'UTF-8') > 200) {
                                    $content = str_replace('\n', '', mb_substr(strip_tags($post->post_content), 0, 200, 'UTF-8'));
                                    echo $content . '……';
                                } else {
                                    echo str_replace('\n', '', strip_tags($post->post_content));
                                }
                                ?>
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