<?php
/* ショートコートプラグインの読込 */
add_filter( 'mce_external_plugins', 'add_add_shortcode_button_plugin' );
function add_add_shortcode_button_plugin( $plugin_array ) {
    // ボタン類
    $plugin_array[ 'green_title_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/green_title.js';
    $plugin_array[ 'red_title_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/red_title.js';
    $plugin_array[ 'pink_title_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/pink_title.js';
    
    // 改行
    $plugin_array[ 'show_pc_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/show_pc.js';
    //$plugin_array[ 'hide_pc_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/hide_pc.js';
    $plugin_array[ 'show_sp_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/show_sp.js';
    //$plugin_array[ 'hide_sp_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/hide_sp.js';
    
    // 他
    //$plugin_array[ 'sickchild_preschool_title_shortcode_button_plugin' ] = get_template_directory_uri() . '/editor/sickchild_preschool_title.js';
    return $plugin_array;
}

/* ショートコードメニューの登録 */
add_filter( 'mce_buttons', 'add_shortcode_button' );
function add_shortcode_button( $buttons ) {
    // ボタン類
    $buttons[] = 'green_title';
    $buttons[] = 'red_title';
    $buttons[] = 'pink_title';
    
    // 改行
    $buttons[] = 'show_pc';
    //$buttons[] = 'hide_pc';
    $buttons[] = 'show_sp';
    //$buttons[] = 'hide_sp';
    //$buttons[] = 'sickchild_preschool_title';
    
    return $buttons;
}

/* ショートコードの登録 */
// ボタン類
function green_title_shortcode( $attr, $content = NULL ) {
	return '<div><span style="color: #79b5a0; font-size: 9pt;">●</span><span style="font-size: 14pt;"><strong>' . $content . '</strong></span></div>';
}
add_shortcode( 'green-title', 'green_title_shortcode' );

function red_title_shortcode( $attr, $content = NULL ) {
	return '<div><span style="color: #d9403f; font-size: 9pt;">●</span><span style="font-size: 14pt;"><strong>' . $content . '</strong></span></div>';
}
add_shortcode( 'red-title', 'red_title_shortcode' );

function pink_title_shortcode( $attr, $content = NULL ) {
	return '<div><span style="color: #e17d88; font-size: 9pt;">●</span><span style="font-size: 14pt;"><strong>' . $content . '</strong></span></div>';
}
add_shortcode( 'pink-title', 'pink_title_shortcode' );

// 改行
function show_pc_shortcode() {
	return '<br class="show-pc hide-sp" />';
}
add_shortcode( 'br-show-pc', 'show_pc_shortcode' );
/*
function hide_pc_shortcode() {
	return '<br class="hide-pc show-sp" />';
}
add_shortcode( 'br-hide-pc', 'hide_pc_shortcode' );
*/

function show_sp_shortcode() {
	return '<br class="show-sp hide-pc" />';
}
add_shortcode( 'br-show-sp', 'show_sp_shortcode' );

/*
function hide_sp_shortcode() {
	return '<br class="hide-sp show-pc" />';
}
add_shortcode( 'br-hide-sp', 'hide_sp_shortcode'sickchild-preschool-title );
*/

/*
function sickchild_preschool_title_shortcode( $attr, $content = NULL ) {
	return '<div class="sickchild-preschool-title">' . $content . '</div>';
}
add_shortcode( 'sickchild-preschool-title', 'sickchild_preschool_title_shortcode' );
*/



/**
 * TinyMCEに渡す配列を作成する
 * @param array $initList
 * @return array
 */
function origin_tinymce($initList) {
    $formats = array(
        array(
         'title' => '装飾1',
         'block' => 'div',
         'classes' => 'sickchild-preschool-title'
        ),
    );
    $initList['style_formats'] = json_encode($formats);
    return $initList;
}
//TinyMCE Advancedより後に実行されるように、フック番号を明示指定する
add_filter('tiny_mce_before_init', 'origin_tinymce', 30000);

/**
 * editor-style.cssのキャッシュクリア
 */
function extend_tiny_mce_before_init( $mce_init ) {
    $mce_init['cache_suffix'] = 'v='.time();

    return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );