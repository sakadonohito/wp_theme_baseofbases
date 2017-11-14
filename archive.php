<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
            <article>
				<p>archive.phpです。</p>
				<p>記事リストを表示するテンプレートです。</p>
				<p>カテゴリーやタグなどの専用テンプレートが作成されていない場合呼び出されます。</p>
				<p>index.php同様、個別のリスト表示デザインが必要ない場合はこれ1つでよいでしょう。</p>
			</article>
			<article>
				<header>
					<h2>アーカイブリスト</h2>
				</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section>
					<?php get_template_part('parts/list-part');?>
				</section>
                <?php endwhile; endif; ?>
			</article>

<?php get_sidebar();?>
<?php get_footer(); ?>
