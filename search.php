<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
            <article>
				<p>search.phpです。</p>
				<p>サイト内キーワード検索結果の記事リストを表示するテンプレートです。</p>
			</article>
			<article>
				<header>
					<h2>カテゴリー: <?php the_search_query();?> の検索結果</h2>
				</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section>
					<?php get_template_part('parts/list-part');?>
				</section>
                <?php endwhile; ?>
                <?php else: ?>
				<section>
					<p>検索キーワードに該当する記事は見つかりませんでした。</p>
				</section>
                <?php endif; ?>
			</article>

<?php get_sidebar();?>
<?php get_footer(); ?>


