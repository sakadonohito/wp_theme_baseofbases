<?php get_header(); ?>
<?php get_template_part('parts/header-part'); ?>
			<article>
				<p>front-page.phpです</p>
                <p>サイトのTOPとして呼び出されます。</p>
				<p>URLがサイトのrootの場合、呼び出されます。</p>
				<p>front-page.phpが無い場合はhome.phpそれもない場合はindex.phpが呼び出されます。</p>
				<p>サンプルとして以下に最新3件の記事リストを表示させています。</p>
			</article>

			<div class="article-list">
				<?php
				$args = array( 'posts_per_page' => 3, 'order'=> 'DESC', 'orderby' => 'date' );
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) : setup_postdata( $post );
				?> 
                <?php get_template_part('parts/list-part'); ?>
				<?php
				endforeach; 
				wp_reset_postdata();
				?>
			</div>

			<article>
				<section>
					<p>最新◯件のリストではなく、最新1件の記事を出したい場合は以下になります。</p>
				</section>
				<section>
					<?php if ( have_posts() ) : ?>
						<h3>最新の記事：<a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						<p>投稿日時：<?php the_date(); ?></p>
						<p><?php the_excerpt(); ?></p>
						<p>カテゴリ：<?php the_category(','); ?></p>
						<p>タグ：<?php the_tags(); ?></p>
					<?php else: ?>
						<p>Coming soon...</p>
					<?php endif; ?>
				</section>
			</article>
			
<?php get_sidebar();?>
<?php get_footer(); ?>
