<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>

	<!--===== FONTS =====-->
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!--===== STYLESHEETS ======-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="page sidebar-page">
		<header>
			<div class="header-wrapper">
				<i class="fa fa-bars"></i>
				<div class="site-logo"><a href="/Press-Freedom">SITE LOGO</a></div>
				<div class="nav">
					<?php wp_nav_menu('Header menu'); ?>
				</div>
				<div class="share-buttons">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-envelope"></i></a>
					<i id="header-search" class="fa fa-search"></i>
					<div class="search"><?php get_search_form(); ?></div>
				</div>
			</div>
		</header>
		