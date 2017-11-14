<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
			<article>
				<p>single-example_custom_post.phpです</p>
                <p>1記事分の特定のカスタム投稿詳細表示のテンプレートです。</p>
				<p>single.phpでも表示できそうですが、それぞれのカスタム投稿向けにデザインして表示する場合に使います。</p>
			</article>
			<article>
				<?php get_template_part('parts/post-part'); ?>
			</article>
			
<?php get_sidebar();?>
<?php get_footer(); ?>
