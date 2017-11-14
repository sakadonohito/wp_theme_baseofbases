<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
            <article>
				<p>archive-example_custom_post.phpです。</p>
				<p>カスタム投稿記事リストを表示するテンプレートです。</p>
			</article>
			<article>
				<header>
					<h2>カスタム投稿リスト</h2>
				</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section>
					<?php get_template_part('parts/list-part');?>
				</section>
                <?php endwhile; endif; ?>
			</article>

<?php get_sidebar();?>
<?php get_footer(); ?>
