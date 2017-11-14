<?php
//カスタム投稿やタクソノミーを追加・変更した場合は以下を実行する。※恐らくDBの更新処理
//global $wp_rewrite;
//$wp_rewrite->flush_rules();

//wp_head で出力されるタグの不要なものはここで記述しておく
/* どんな種類があるかはwp-includes/default-filters.phpを参照
例
remove_action('wp_head','feed_links_extra',3);
*/

remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
//remove_action( 'wp_head', '_wp_render_title_tag',            1     );
//remove_action( 'wp_head', 'wp_enqueue_scripts',              1     );
//remove_action( 'wp_head', 'wp_resource_hints',               2     );
//remove_action( 'wp_head', 'feed_links',                      2     );
remove_action( 'wp_head', 'feed_links_extra',                3     );//特定部位に絞ったfeedを出したい場合
//remove_action( 'wp_head', 'rsd_link'                               );
remove_action( 'wp_head', 'wlwmanifest_link'                       );// Windows Live Writer 使う場合は必要
//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'locale_stylesheet'                      );// 特定の言語向けのCSSを使う場合は必要
//remove_action( 'wp_head', 'noindex',                          1    );//GUIの設定でコントロールする
remove_action( 'wp_head', 'print_emoji_detection_script',     7    );//絵文字を使う場合は必要
remove_action( 'wp_head', 'wp_print_styles',                  8    );//WP3.3未満の後方互換用
//remove_action( 'wp_head', 'wp_print_head_scripts',            9    );
remove_action( 'wp_head', 'wp_generator'                           );//WordPress バージョン情報を出したい場合は必要
//remove_action( 'wp_head', 'rel_canonical'                          );
remove_action( 'wp_head', 'wp_shortlink_wp_head',            10, 0 );//HTML5 では不要
//remove_action( 'wp_head', 'wp_custom_css_cb',                101   );//追加CSSをAMPで出力する場合に必要
//remove_action( 'wp_head', 'wp_site_icon',                    99    );//テーマに直接iconタグ書いてる場合は不要
//remove_action( 'wp_head', 'wp_no_robots' );
//remove_action( 'wp_head', 'wp_post_preview_js', 1 );//???
//remove_action( 'wp_head', '_custom_logo_header_styles' );//???
//remove_action( 'wp_head', 'wp_oembed_add_discovery_links'         );
//remove_action( 'wp_head', 'wp_oembed_add_host_js'                 );

//投稿ページにカスタムフィールドを追加場合
function custom_add_meta_box() {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'custom_field01',
			__( '独自の投稿画面', 'field01' ),
			'custom_meta_box_callback',
			$screen,
            'normal'
		);
	}
}
add_action( 'add_meta_boxes', 'custom_add_meta_box' );

function custom_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'custom_save_meta_box_data', 'custom_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, 'custom_field_01', true );
    echo '<div class="custom-field-input-box"><label for="custom_field_01">カスタムなフィールド</label>';
	echo sprintf('<input type="text" id="custom_field_01" name="custom_field_01" value="%s" />', esc_attr( $value ));
    echo '</div>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function custom_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['custom_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['custom_meta_box_nonce'], 'custom_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['custom_field_01'] ) ) {
		return;
	}

	// Sanitize user input.
	//$my_data = sanitize_text_field( str_replace('\r\n|\r|\n','<br/>',$_POST['md']) );
    $my_data = $_POST['custom_field_01'];

	// Update the meta field in the database.
	update_post_meta( $post_id, 'custom_field_01', $my_data );
}
add_action( 'save_post', 'custom_save_meta_box_data' );


//カスタムヘッダーの追加
$args = [
    'width' => 960,
    'flex-width' => true,
    'height' => 200,
    'flex-height' => true,
    'default-image' => get_template_directory_uri().'/images/header.png',
    'uploads' => true
];
add_theme_support('custom-header');

//アイキャッチ画像を有効にする場合
add_theme_support('post-thumbnails');

//カスタム投稿タイプを使う場合
// カスタム投稿タイプ作成
function create_post_type() {
  $exampleSupports = [
    'title',
    'editor',
    'thumbnail',
    'revisions'
  ];

  // add post type1
  register_post_type( 'kamaboko',
    array(
      'label' => 'かまぼこ',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => $exampleSupports
    )
  );

  // add post type2
  register_post_type( 'example_custom_post',
    array(
      'label' => 'カスタム投稿',
      'public' => true,
      'has_archive' => true,
      'menu_position' => 5,
      'supports' => $exampleSupports
    )
  );
  
  // add taxonomy(caegory)
  register_taxonomy(
    'example_taxonomy',
    'example_custom_post',
    array(
      'label' => 'サンプルタクソノミー',
      'labels' => array(
        'all_items' => 'タクソノミー一覧',
        'add_new_item' => '新規タクソノミーを追加'
      ),
      'hierarchical' => true
    )
  );

  // add taxonomy(tag)
  register_taxonomy(
    'example_custom_tag',
    'example_custom_post',
    array(
      'label' => 'サンプルカスタムタグ',
      'labels' => array(
        'all_items' => 'カスタムタグー一覧',
        'add_new_item' => '新規カスタムタグを追加'
      ),
      'hierarchical' => false
    )
  );
  
}

add_action( 'init', 'create_post_type' );
