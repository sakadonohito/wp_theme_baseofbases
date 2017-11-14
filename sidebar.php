	    <div id="sidebar" class="">
			<p>サイドバーのテンプレートです。必要に応じてデザインして読み込んでください。</p>
<?php
/* 特定の年月だけ表示したい場合
$args = array(
    'post_per_page' => -1,
    'date_query' => array(
        array( 
            'year' => date('Y'),
            'monthnum'=> date('m')
        )
    )
);
$posts = new WP_Query($args);
*/
?>

<?php
echo '<div><p>年月アーカイブ</p><ul>';
//echo sprintf('<li><a href="%s">今月の記事</a> ( %d )</li>',get_month_link('',''),$posts->found_posts);
wp_get_archives(['show_post_count' => true]);
echo '</ul></div>';

$cats = get_categories();
if($cats){
	echo '<div><p>カテゴリー</p><ul>';
	foreach($cats as $cat){
		echo sprintf('<li><a href="%s">%s</a> ( %d )</li>',get_category_link($cat->term_id),$cat->name,$cat->count);
	}
	echo '</ul></div>';
}

$tags = get_tags();
if ($tags) {
	echo '<div><p>タグ</p><ul>';
    foreach($tags as $tag) {
        echo sprintf('<li><a href="%s">%s</a> ( %d )</li>',get_tag_link($tag->term_id),$tag->name,$tag->count);
    }
	echo '</ul></div>';
}


?>
	    </div>

	    <div id="sidebar" class="">
			<p>カスタム投稿用サイドバーサンプル</p>
<?php
/* 特定の年月だけ表示したい場合
$args = array(
    'post_per_page' => -1,
    'date_query' => array(
        array( 
            'year' => date('Y'),
            'monthnum'=> date('m')
        )
    )
);
$posts = new WP_Query($args);
*/
?>

<?php
echo '<div><p>年月アーカイブ</p><ul>';
//echo sprintf('<li><a href="%s">今月の記事</a> ( %d )</li>',get_month_link('',''),$posts->found_posts);
wp_get_archives(['show_post_count' => true]);
echo '</ul></div>';

$cats = wp_list_categories('taxonomy=example_taxonomy&show_count=1');
if($cats){
	echo '<div><p>カスタムカテゴリー</p><ul>';
	foreach($cats as $cat){
		echo sprintf('<li><a href="%s">%s</a> ( %d )</li>',get_category_link($cat->term_id),$cat->name,$cat->count);
	}
	echo '</ul></div>';
}

$tags = wp_list_categories('taxonomy=example_custom_tag&show_count=1');
if ($tags) {
	echo '<div><p>カスタムタグ</p><ul>';
    foreach($tags as $tag) {
        echo sprintf('<li><a href="%s">%s</a> ( %d )</li>',get_tag_link($tag->term_id),$tag->name,$tag->count);
    }
	echo '</ul></div>';
}


?>
	    </div>
