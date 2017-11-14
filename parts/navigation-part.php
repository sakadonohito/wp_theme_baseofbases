				<!-- ナビゲーションメニューサンプル -->
				<nav id="navbar" class="navbar navbar-default navbar-fixed-top">
					<div class="navbar-header">
						<button id="global-menu" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">メニュー</a>
					</div>
					<div class="collapse navbar-collapse" id="menu-bar">
						<ul class="nav navbar-nav">
							<li><a href="/">Home</a></li>
							<li><a href="/<?php echo date('Y');?>/<?php echo date('m');?>">今月の記事</a></li>
							<li><a href="/example_custom_post">カスタム投稿記事</a></li>
							<li><a href="/about">固定ページ</a></li>
						</ul>
						<ul class="nav navbar-right">
							<form class="navbar-form navbar-left" role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/'));?>">
								<div class="form-group">
									<input type="text" class="form-control" id="s" name="s" value="<?php echo get_search_query();?>" placeholder="検索キーワード"/>
								</div>
								<button type="submit" class="btn btn-default">検索</button>
							</form>
							<p class="navbar-text navbar-right">&nbsp;</p>
						</ul>
					</div>
				</nav>