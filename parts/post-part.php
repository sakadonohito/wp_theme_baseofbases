			<article>
				<?php the_post(); ?>
				<header>
					<h2><?php the_title();?></h2>
					<p>publish: <?php the_date(); ?></p>
					<p>カテゴリー: <?php the_category(',');?></p>
				</header>
				<section>
					<p><?php the_content(); ?></p>
				</section>
				<section>
					<p>カスタムフィールド: <?php echo get_post_meta($post->ID, 'custom_field_01',true); ?></p>
				</section>
				<footer>
					<p>Tags: <?php the_tags();?></p>
				</footer>
			</article>
