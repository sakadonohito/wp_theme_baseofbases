<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8"/>
		<title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>
<!-- 別途CSSを読み込ませたい場合
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/hoge.min.css"/>
-->
        <!-- テーマメインのCSS出力 -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>" type="text/css" />
		<?php wp_head();?>
	</head>
	<body <?php body_class(); ?>>
		<div id="wrap">