<?php get_header(); ?>
<article class="single">
    <div class="margin__page-top"></div>
    <div class="margin__box">
        <ul class="work-list">
            <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>
            <li class="work-list__item--singlepage">
                <?php the_post_thumbnail('large', array('class' => 'work-list__thumbnail')); ?>
                <div class="work-list__link">
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
                </div>
            </li>
        </ul>
        <p><?php the_content('Read more'); ?></p>
        <?php endwhile;
            endif; ?>
        <!--
        <?php previous_post_link('%link', '古い記事へ'); ?>
        <?php next_post_link('%link', '新しい記事へ'); ?>
 -->
        <ul class="single-nav">
            <li class="single-nav__item">
                <?php
        $prevPost = get_previous_post(true); //前の記事データを取得
        $prevThumbnail = get_the_post_thumbnail($prevPost->ID, array(360, 188), array('class' => 'single-nav__thumbnail')); //サムネイル取得
        echo $prevthumbnail;
        previous_post_link('%link', $prevThumbnail); //出力
        previous_post_link('%link', '%title'); //出力
        ?>
            </li>
            <li class="single-nav__item--right">
                <?php
        $nextPost = get_next_post(true); //次の記事データを取得
        $nextThumbnail = get_the_post_thumbnail($nextPost->ID, array(360, 188), array('class' => 'single-nav__thumbnail')); //サムネイル取得
        echo $nextthumbnail;
        next_post_link('%link', $nextThumbnail); //出力
        next_post_link('%link', '%title'); //出力
        ?>
            </li>
        </ul>
    </div>
</article>
<?php get_footer(); ?>