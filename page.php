<?php get_header(); ?>
<article class="page">
    <div class="margin__page-top"></div>
    <div class="margin__box">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post();
                the_content();
            endwhile;
        endif; ?>
    </div>
</article>
<?php get_footer(); ?>