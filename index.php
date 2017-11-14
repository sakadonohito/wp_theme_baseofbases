<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
			<article>
				<p>index.phpです</p>
                <p>サイトのTOPページという意味ではなく、全ての記事ページが存在しない場合、このindex.phpが呼び出されます。</p>
				<p>逆に言うと、全てのページが同じデザインで問題ない場合、index.phpのみで運用できます。</p>
				<p>それぞれのページのデザインを別々に行う場合、このindex.phpは不要になります。</p>
			</article>
<?php get_sidebar();?>
<?php get_footer(); ?>
