<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
			<article>
				<p>page.phpです</p>
                <p>固定ページのテンプレートです。</p>
				<p>固定ページが呼び出された場合、使用されます。</p>
			</article>

			<article>
				<?php the_post(); ?>
				<h2><?php the_title();?></h2>
				<p><?php echo get_the_content(); ?></p>
			</article>
			
<?php get_sidebar();?>
<?php get_footer(); ?>
