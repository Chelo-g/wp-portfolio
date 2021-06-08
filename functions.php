<?php
function my_scripts()
{
    wp_register_style('reset_css', get_template_directory_uri() . '/css/destyle.css', array(), '1.0.0', 'all');

    //Swiper
    wp_enqueue_style('Swiper_css', 'https://unpkg.com/swiper/swiper-bundle.min.css', array('reset_css'), '1.0.0', 'all');
    wp_enqueue_script('Swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array('jquery'), '1.0.0', false);

    wp_enqueue_style('main_css', get_template_directory_uri() . '/css/style.css', array('reset_css'), '1.0.0', 'all');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');

function theme_setup()
{
    // アイキャッチ画像を有効化
    add_theme_support('post-thumbnails', array('post', 'china-food'));
}
add_action('after_setup_theme', 'theme_setup');

function the_pagination()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1)
        return;
    echo '<nav class="pagination">';
    $page_links = paginate_links(array(
        'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
        'format' => '',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3,
        'type' => 'array'
    ));
    echo '<ul class="page-number-list"><li>';
    echo join('</li><li>', $page_links);
    echo '</li></ul>';
    echo '</nav>';
}


function create_post_type()
{
    register_post_type('china-food', [ // 投稿タイプ名の定義
        'labels' => [
            'name'          => '中華料理', // 管理画面上で表示する投稿タイプ名
            'singular_name' => '中華料理',    // カスタム投稿の識別名
        ],
        'public'        => true,  // 投稿タイプをpublicにするか
        'has_archive'   => true, // アーカイブ機能ON/OFF
        'menu_position' => 5,     // 管理画面上での配置場所
        'show_in_rest'  => true,  // 5系から出てきた新エディタ「Gutenberg」を有効にする
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
            'excerpt',
            'custom-fields',
        )
    ]);
    /*     //カテゴリを投稿と共通設定にする
    register_taxonomy_for_object_type('category', 'china-food');
    //タグを投稿と共通設定にする
    register_taxonomy_for_object_type('post_tag', 'china-food'); */
}
add_action('init', 'create_post_type');