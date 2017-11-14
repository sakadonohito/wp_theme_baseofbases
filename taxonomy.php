<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
            <article>
				<p>taxonomy.phpです。</p>
				<p>任意のカスタムカテゴリーリストを表示するテンプレートです。</p>
				<p>任意のカスタムカテゴリーリストを表示するためのURLから呼び出されます。</p>
				<p>カスタムタクソノミーのカテゴリー用途、タグ用途の両方兼用となります。</p>
			</article>
			<article>
				<header>
                  <h2>カスタムカテゴリー: <?php echo single_cat_title();?> の記事一覧</h2>
				</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section>
					<?php get_template_part('parts/list-part');?>
				</section>
                <?php endwhile; endif; ?>
			</article>

<?php get_sidebar();?>
<?php get_footer(); ?>
