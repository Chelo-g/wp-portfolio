<?php get_header(); ?>

<main>
    <div class="margin__page-top"></div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
    <p><?php the_category(', '); ?></p>
    <p><?php the_content('Read more'); ?></p>

    <?php endwhile;
    endif; ?>

    <?php previous_post_link('%link', '古い記事へ'); ?>
    <?php next_post_link('%link', '新しい記事へ'); ?>

</main>

<?php get_footer(); ?>