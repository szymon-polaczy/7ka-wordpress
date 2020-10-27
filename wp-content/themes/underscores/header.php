<?php wp_head(); ?>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, minimum-scale=1.0"/>

<body>
	<div class="wrapper">
		<article class="main-header--search">
			<form method="post">
				<input type="text" name="search"/>
				<button><i class="fas fa-search"></i></button>
			</form>
		</article>
		<header class="main-header">
			<article class="main-header--logo">
				<a href="<?php echo get_site_url(); ?>">
					<img src="http://localhost/7ka-wordpress/wp-content/uploads/2020/10/logo-modelen.png"/>
				</a>
			</article>
			<nav class="main-header--menu">
				<?php wp_nav_menu(array('theme_location' => 'main-menu', 'menu' => 'Main Menu', 'container' => '')); ?>
			</nav>
		</header>
	</div>