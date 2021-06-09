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
    add_theme_support('post-thumbnails', array('post', 'food'));
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
    register_post_type(
        'food', //投稿タイプ名（第1パラメータ）
        array(  //第2パラメータの配列
            'label' => '食べ物',  //カスタム投稿タイプのラベル（管理画面のメニューに表示される）
            'public' => true,  // 管理画面に表示しサイト上にも表示する
            'hierarchical' => false,  //★固定ページのように階層構造（親子関係）を持たせる
            'has_archive' => true,  //trueにすると投稿した記事の一覧ページを作成することができる
            'show_in_rest' => true,  //Gutenberg（REST API）を有効化
            'menu_position' => 5, //「投稿」の下に追加
            'supports' => array(  //記事編集画面に表示する項目を配列で指定
                'title',  //タイトル
                'editor',  //本文の編集機能
                'thumbnail',  //アイキャッチ画像
                'excerpt',  //抜粋
                'custom-fields', //カスタムフィールド
                'revisions',  //リビジョンを保存
            ),
            'taxonomies' => array('food_cat', 'food_tag', 'category', 'post_tag')
        )
    );
    /*     //カテゴリを投稿と共通設定にする
    共通すると思い通りの挙動にならないことがありそうなので、非推奨
    register_taxonomy_for_object_type('category', 'china-food');
    //タグを投稿と共通設定にする
    register_taxonomy_for_object_type('post_tag', 'china-food'); */
    register_taxonomy('food-type', 'result', array(
        'hierarchical' => true,
        'labels' => array( /*   表示させる文字 */
            'name' => 'カテゴリ',
            'singular_name' => 'カテゴリ',
            'search_items' =>  'カテゴリを検索',
            'all_items' => 'すべてのカテゴリ',
            'parent_item' => '親分類',
            'parent_item_colon' => '親分類：',
            'edit_item' => '編集',
            'update_item' => '更新',
            'add_new_item' => 'カテゴリを追加',
            'new_item_name' => '名前',
        ),
        'show_ui' => true, /* 管理画面にメニューを作る */
        'rewrite' => array(
            'slug' => 'foods', 'with_front' => true, 'hierarchical' => true
        ),
        'capabilities' => array(
            'assign_terms' => 'edit_guides',
            'edit_terms' => 'publish_guides'
        )
    ));
}
add_action('init', 'create_post_type');

//カテゴリーアーカイブにカスタム投稿タイプ food を含める（表示させる）
function add_my_post_category_archive($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        $query->set('post_type', array('post', 'food'));
    }
}
add_action('pre_get_posts', 'add_my_post_category_archive');

//タグアーカイブにカスタム投稿タイプ food を含める（表示させる）
function add_my_post_tag_archive($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_tag()) {
        $query->set('post_type', array('post', 'food'));
    }
}
add_action('pre_get_posts', 'add_my_post_tag_archive');