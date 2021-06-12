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

/* 投稿記事を投稿する時、aタグにクラス名を追加する */
function my_replace_to_custom_tags($postarr)
{
    $class = 'single__link';
    $postarr['post_content'] = str_replace('<a ', '<a class="' . $class . '" ', $postarr['post_content']);
    return $postarr;
}
add_filter('wp_insert_post_data', 'my_replace_to_custom_tags');

/* サムネ機能オン */
function theme_setup()
{
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

function change_posts_per_page($query)
{
    /* 管理画面,メインクエリに干渉しないために必須 */
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    /* アーカイブページの表示件数を6件にする
    アーカイブページは以下の項目｢すべて｣含まれるので注意
    カテゴリー、タグ、その他のタクソノミー項目、カスタム投稿タイプアーカイブ、作成者、日付別
    */
    if ($query->is_archive()) {
        $query->set('posts_per_page', '6');
    }
    if ($query->is_category()) {
        $query->set('posts_per_page', '4');
    }
}
add_action('pre_get_posts', 'change_posts_per_page');


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
            'taxonomies' => array('food-type',  'food-year')
        )
    );
    register_taxonomy(
        'food-type',   //カスタムタクソノミー名
        'food',   //このタクソノミーが使われる投稿タイプ
        array(
            'label' => '国別の食べ物',  //カスタムタクソノミーのラベル
            'labels' => array(
                'popular_items' => 'よく使うカテゴリー',
                'edit_item' => 'カテゴリーを編集',
                'add_new_item' => '新規カテゴリーを追加',
                'search_items' => 'カテゴリーを検索'
            ),
            'public' => true,  // 管理画面及びサイト上に公開
            'description' => '国別の説明です。',  //説明文
            'hierarchical' => true,  //カテゴリー形式
            'show_in_rest' => true  //Gutenberg で表示
        )
    );
    register_taxonomy(
        'food-year',   //カスタムタクソノミー名
        'food',  //このタクソノミーが使われる投稿タイプ
        array(
            'label' => '食べた年', //カスタムタクソノミーのラベル
            'labels' => array(
                'popular_items' => 'よく使うタグ',
                'edit_item' => '編集',
                'add_new_item' => '新規を追加',
                'search_items' => 'タグを検索'
            ),
            'public' => true,  // 管理画面及びサイト上に公開
            'description' => '食べた年です',  //説明文
            'hierarchical' => false, //タグ形式
            'update_count_callback' => '_update_post_term_count',
            'show_in_rest' => true //Gutenberg で表示
        )
    );
}
add_action('init', 'create_post_type');

/* 管理画面での表示項目追加 */
function add_custom_column($defaults)
{
    $defaults['food-type'] = '国別の食べ物'; //'blog_cat'はタクソノミー名
    $defaults['food-year'] = '食べた年'; //タクソノミーは複数可
    return $defaults;
}
function add_custom_column_id($column_name, $id)
{
    $terms = get_the_terms($id, $column_name);
    if ($terms && !is_wp_error($terms)) {
        $blog_cat_links = array();
        foreach ($terms as $term) {
            $blog_cat_links[] = $term->name;
        }
        echo join(", ", $blog_cat_links);
    }
}
add_filter('manage_food_posts_columns', 'add_custom_column'); //ここでの’blog’はカスタム投稿タイプ
add_action('manage_food_posts_custom_column', 'add_custom_column_id', 10, 2); //ここでの’blog’はカスタム投稿タイプ

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



//お問い合わせフォームの送信後にサンクスページへ飛ばす

$contact = 'contact';
$thanks = 'thanks';
function redirect_thanks_page()
{
    global $contact;
    global $thanks;

    if (is_page($contact)) {
?>
<script>
document.addEventListener('wpcf7mailsent', function(event) {
    location = '<?php echo home_url('/' . $thanks); ?>'; // 遷移先のURL
}, false);
</script>
<?php }
}
add_action('wp_footer', 'redirect_thanks_page');