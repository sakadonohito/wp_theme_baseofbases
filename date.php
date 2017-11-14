<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
            <article>
				<p>date.phpです。</p>
				<p>任意の年月の記事リストを表示するテンプレートです。</p>
				<p>任意の年月の記事リストを表示するためのURLから呼び出されます。</p>
			</article>
			<article>
				<header>
					<h2>アーカイブ: <?php echo get_the_date('Y年m月');?> の記事一覧</h2>
				</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section>
					<?php get_template_part('parts/list-part');?>
				</section>
                <?php endwhile; endif; ?>
			</article>

<?php get_sidebar();?>
<?php get_footer(); ?>
