<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
			<article>
				<p>page-about.phpです</p>
				<p>特定の固定ページのテンプレートです。特定の固定ページのみ別デザインにしたい場合などに使います。</p>
				<p>固定ページのslugをファイル名に含ませ、page-$slug.php(この場合、$slug=about)というファイル名で作成します。</p>
			</article>

			<article>
				<?php the_post(); ?>
				<h2><?php the_title();?></h2>
				<p><?php echo get_the_content(); ?></p>
			</article>
			
<?php get_sidebar();?>
<?php get_footer(); ?>
