<?php
/**
 * The Header template for our theme
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="//use.typekit.net/jrs0cno.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>

	<h1 id="logo">
    	<a href="<?php bloginfo('url'); ?>?" title="<?php bloginfo('name'); ?>">
        	<span class="noDisplay"><?php bloginfo('name'); ?></span>
        </a>
     </h1>
     
     <nav>
     	<?php wp_nav_menu( array( 'theme_location' => 'navigation', 'menu_class' => 'navigation') ); ?>      
     </nav>
     
</header>
     
     