<?php

/*Site Navigation*/
register_nav_menus( array(
	'navigation' => 'Primary Site Navigation',
	'nav-secondary' => 'Secondary Navigation',
	'nav-list' => 'List Item Navigation',
	'nav-extra' => 'Outbound Navigation',
	'footer-nav' => 'Footer Nav'
) );

/*Sidebar Registration*/
function perseus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears on posts and pages in the Footer.'),
		'before_widget' => '<footer id="%1$s" class="widget %2$s">',
		'after_widget'  => '</footer>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'perseus_widgets_init' );


/*JQuery & Theme Plugin Support*/



/*Misc Setup*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 604, 270, true );?>