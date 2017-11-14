			<header>
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<p><?php bloginfo('description'); ?></p>
				<!-- カスタムヘッダー画像 -->
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="Main Custom Header Image."/>
                 <?php get_template_part('parts/navigation-part'); ?>
			</header>