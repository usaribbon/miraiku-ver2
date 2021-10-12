<?php
/*
function load_script(){
  if ( !is_admin() ){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1');
  }
}
add_action('init', 'load_script');
*/

/* ===================================================================
 管理画面
=================================================================== */
// エディタスタイルの追加
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

// アイキャッチの有効化
add_theme_support('post-thumbnails');
add_image_size( 'image830x630', 830, 630, true );
add_image_size( 'image1560x800', 1560, 800, true );
add_image_size( 'image312x312', 312, 312, true );
add_image_size( 'image740x570', 740, 570, true );
add_image_size( 'image1560x800', 1560, 800, true );
add_image_size( 'image740x570', 740, 570, true );
add_image_size( 'image580x470', 580, 470, true );
add_image_size( 'image2480x800', 2480, 800, true );
add_image_size( 'image870x630', 870, 630, true );
add_image_size( 'image328x328', 328, 328, true );
add_image_size( 'image2030x800', 2030, 800, true );
add_image_size( 'image1000x700', 1000, 700, true );
add_image_size( 'image490x460', 490, 460, true );
add_image_size( 'image1000x490', 1000, 490, true );
add_image_size( 'image430x430', 430, 430, true );
add_image_size( 'image700x360', 700, 360, true );
add_image_size( 'newspaper', 700, 9999);
add_image_size( 'newspaper_l', 1400, 9999);
add_image_size( 'history', 800, 9999);


/* ===================================================================
 タイトル
=================================================================== */
function my_title_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'my_title_setup' );

/* ===================================================================
 layout(body tag)
=================================================================== */
function my_get_body_id() {
		if ( is_smart_phone() ) {
			$data = 'class="l-sp"';
		} elseif ( is_tablet() ) {
			$data = 'class="l-pc"';
		} else {
			$data = 'class="l-pc"';
		}
		return $data;
}

/* ===================================================================
 viewport
=================================================================== */
function my_get_viewport() {
    if ( is_smart_phone() ) {
        $data = '<meta name="viewport" content="width=375">';
    } elseif ( is_tablet() ) {
        $data = '<meta name="viewport" content="width=1100">';
    } else {
        $data = '<meta name="viewport" content="width=1100">';
    }
    return $data;
}

/* ===================================================================
 description
 ディスクリプションは１記事の抜粋、２本体のディスクリプションの順番で取得する
=================================================================== */
function my_get_description() {
    global $post;
    if (is_single()) {
        $description = wp_html_excerpt($post->post_content, 100, '');
    }
    
    if (empty($description)) {
        $description = bloginfo('description');
    }
    
    return $description;
}


/* ===================================================================
 タイプの取得（OGP）
=================================================================== */
function my_get_og_type() {
	if (is_single()) {
		$type = 'article';
	}
	
	if (empty($type)) {
		$type = 'website';
	}
	
	return $type;
}


/* ===================================================================
 概要の文字数調整
=================================================================== */
function my_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');

//　省略文字
function my_excerpt_more($more) {
	return '…';
}
add_filter('excerpt_more', 'my_excerpt_more');


/* ===================================================================
 モバイルチェック
=================================================================== */
//スマートフォンの判別
function is_smart_phone() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if (   strpos($ua, 'iPhone') 							// iPhone
		|| strpos($ua, 'iPod') 								// iPod touch
		||(strpos($ua, 'Android') && strpos($ua, 'Mobile'))	// Android搭載スマホ
		||(strpos($ua, 'Windows') && strpos($ua, 'Mobile')) // Windows Phone
		||(strpos($ua, 'firefox') && strpos($ua, 'Mobile')) // firefox製ブラウザ
		|| strpos($ua, 'Opera Mini')						// Androidで人気のブラウザ
		|| strpos($ua, 'Opera Mobi')						// Androidで人気のブラウザ
		|| strpos($ua, 'webmate') 							// その他の Other iPhone browser
		|| strpos($uat,'incognito') 						// その他の iPhone browser
	) {
		return true;
	} else {
		return false;
	}
}

//タブレットの判別
function is_tablet() {
	$uat = $_SERVER['HTTP_USER_AGENT'];
	if ( strpos($uat, 'iPad') // iPad
		||(strpos($uat, 'Android') && strpos($uat, 'Mobile')=== false ) // Android搭載タブレット
		|| strpos($uat, 'windows touch') //windows touch
		|| strpos($uat, 'Kindle') // Kindle
		|| strpos($uat, 'Silk') // Kindle に付属の Amazon 製ブラウザ
		|| strpos($uat, 'firefox tablet') //firefox tablet
		|| strpos($uat, 'WebOS') // Palm
	) {
		return true;
	} else {
		return false;
	}
}


/* ===================================================================
　プライマリカテゴリを取得
=================================================================== */
function my_get_the_primary_category($post_id = false) {
    $category = array();
    
    $categories = get_the_category($post_id);
    if ( isset($categories, $categories[0])) {
        $category = $categories[0];
    }
    
    return $category;
}


/* ===================================================================
　取得件数の変更
=================================================================== */
function my_change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }
    
    // 検索ページ/5件
    if ( $query->is_search() ) {
        $query->set( 'posts_per_page', '10' );
    }
    
    // itemページ/5件
    if ( $query->is_archive('item') ) {
        $query->set( 'posts_per_page', '10' );
    }
    
    /*
    // アーカイブページの時に表示件数を10件にセット
    if ( $query->is_archive() ) {
        $query->set( 'posts_per_page', '10' );
    }
    
    // ポストアーカイブの時に表示件数を30件にセット
    if ( $query->is_post_type_archive('post_type') ) {
        $query->set( 'posts_per_page', '10' );
    }
    
    if ( $query->is_tax('photo_category') ) {
        $query->set( 'posts_per_page', '20' );
    }

    */
}
add_action( 'pre_get_posts', 'my_change_posts_per_page' );


/* ===================================================================
　ウィジェット追加
=================================================================== */
register_sidebar(
    array(
        'name' => 'ヘッダウィジェット',
        'id' => 'widget_header',
        'description' => 'ヘッダウィジェット',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => 'フッタウィジェット',
        'id' => 'widget_footer',
        'description' => 'フッタウィジェット',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);

register_sidebar(
    array(
        'name' => 'サイドバーウィジェット',
        'id' => 'widget_sidebar',
        'description' => 'サイドバーウィジェット',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    )
);

/* ===================================================================
TinyMCE Advancedのフォントサイズ変更
=================================================================== */
function tinymce_custom_fonts($setting){
	$setting['fontsize_formats'] = "9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 34px 36px";
	return $setting;
}
add_filter('tiny_mce_before_init','tinymce_custom_fonts',5);

/* ===================================================================
　パンくずリスト
=================================================================== */
function breadcrumb(){
    global $post;
    $str = '';
    $pNum = 2;
    $str.= '<ul class="p-pankuzu">';
    $str.= '<li ><a href="'.home_url('/').'" class="home"><span>HOME</span></a></li>';

    /* 通常の投稿ページ    */
    if(is_singular('post')){
        $categories = get_the_category($post->ID);
        $cat = $categories[0];

        if($cat->parent != 0){
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
            foreach($ancestors as $ancestor){
                $str.= '<li><a href="'. get_category_link($ancestor).'"><span>'.get_cat_name($ancestor).'</span></a></li>';
            }
        }
        $str.= '<li><a href="'. get_category_link($cat-> term_id). '"><span>'.$cat->cat_name.'</span></a></li>';
        $str.= '<li><span>'.$post->post_title.'</span></li>';
    }

    /* カスタムポスト */
    elseif(is_single() && !is_singular('post')){
        $cp_name = get_post_type_object(get_post_type())->label;
        $cp_url = home_url('/').get_post_type_object(get_post_type())->name;
    
        $str.= '<li><a href="'.$cp_url.'"><span>'.$cp_name.'</span></a></li>';
        $str.= '<li><span>'.$post->post_title.'</span></li>';
    }

    /* 固定ページ */
    elseif(is_page()){
        $pNum = 2;
        if($post->post_parent != 0 ){
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach($ancestors as $ancestor){
                $str.= '<li><a href="'. get_permalink($ancestor).'"><span>'.get_the_title($ancestor).'</span></a></li>';
            }
        }
        $str.= '<li><span>'. $post->post_title.'</span></li>';
    }

    /* カテゴリページ */
    elseif(is_category()) {
        $cat = get_queried_object();
        $pNum = 2;
        if($cat->parent != 0){
            $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
            foreach($ancestors as $ancestor){
                $str.= '<li><a href="'. get_category_link($ancestor) .'"><span>'.get_cat_name($ancestor).'</span></a></li>';
            }
        }
        $str.= '<li><span>'.$cat->name.'</span></li>';
    }

    /* タグページ */
    elseif(is_tag()){
        $str.= '<li><span>'. single_tag_title('', false). '</span></li>';
    }

    /* 時系列アーカイブページ */
    elseif(is_date()){
        if(get_query_var('day') != 0){
            $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
            $str.= '<li><a    href="'.get_month_link(get_query_var('year'), get_query_var('monthnum')).'"><span>'.get_query_var('monthnum').'月</span></a></li>';
            $str.= '<li><span>'.get_query_var('day'). '</span>日</li>';
        } elseif(get_query_var('monthnum') != 0){
            $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
            $str.= '<li><span>'.get_query_var('monthnum'). '</span>月</li>';
        } else {
            $str.= '<li><span>'.get_query_var('year').'年</span></li>';
        }
    }

    /* 投稿者ページ */
    elseif(is_author()){
        $str.= '<li><span>投稿者 : '.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
    }

    /* 添付ファイルページ */
    elseif(is_attachment()){
        $pNum = 2;
        if($post -> post_parent != 0 ){
            $str.= '<li><a href="'.get_permalink($post-> post_parent).'"><span>'.get_the_title($post->post_parent).'</span></a></li>';
        }
        $str.= '<li><span>'.$post->post_title.'</span></li>';
    }

    /* 検索結果ページ */
    elseif(is_search()){
        $str.= '<li><span>「'.get_search_query().'」で検索した結果</span></li>';
    }

    /* 404 Not Found ページ */
    elseif(is_404()){
        $str.= '<li><span>お探しの記事は見つかりませんでした。</span></li>';
    }

    /* その他のページ */
    else{
        $str.= '<li><span>'.wp_title('', false).'</span></li>';
    }
    $str.= '</ul>';

    echo $str;
}

/* エディタ関係の処理についてのファイル */
require_once(dirname(__FILE__) . '/inc-admin-extrastyle.php');


add_filter( 'wp_image_editors', 'change_graphic_lib' );
function change_graphic_lib($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}


/* カスタム投稿タイプ１ページあたりの表示件数を変える */
function change_posts_per_page($query)
{
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }
    if ( $query->is_post_type_archive('history') ) {
        $query->set( 'posts_per_page', 10 );
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );