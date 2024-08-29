<?php	

	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

	// Translations can be filed in the /languages/ directory
	
	load_theme_textdomain( 'carson', TEMPLATEPATH . '/languages' );
	
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";

	if ( is_readable($locale_file) )
	require_once($locale_file);
	
	// Add RSS links to <head> section

	automatic_feed_links();
	
	// Load jQuery

	if ( !function_exists('core_mods') ) {

		function core_mods() {

			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}

		}

		core_mods();

	}
	

	// Nav Menu

	register_nav_menu( 'primary', __( 'Primary Menu', 'carson' ) );

	// Featured Images

	add_theme_support( 'post-thumbnails' );

	// Widgets
	
	if (function_exists('register_sidebar')) {

		register_sidebar(array(
			'name' => __('Sidebar Widgets','carson' ),
			'id'   => 'sidebar-widgets',
			'description'   => __( 'These are widgets for the sidebar.','carson' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));

		register_sidebar(array(
			'name' => __('Home Widgets','carson' ),
			'id'   => 'home-widgets',
			'description'   => __( 'These are widgets for the home page.','carson' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));

	}




	/*-------------------------------------------
		Set up Multiple post thumbnails 
		for specific pages
	-------------------------------------------*/
	if (class_exists('MultiPostThumbnails')) {
	
	
		new MultiPostThumbnails(array(
			'label' => 'Featured Project Thumbnail',
			'id' => 'featured_project_thumbnail',
			'post_type' => 'projects'
		) );
		
		for($i = 1; $i < 11; $i++){
			new MultiPostThumbnails(array(
				'label' => 'Slideshow Image '.$i,
				'id' => 'featured_image_'.$i,
				'post_type' => 'projects'
			) );
		}
	}
	
	/*-------------------------------------------
		office terms
	-------------------------------------------*/
	function add_query_vars($aVars) {
		$aVars[] = "office";
		return $aVars;
	}
	function add_rewrite_rules($aRules) {
		$aNewRules = array('office/([^/]+)/?$' => 'index.php?pagename=office&office=$matches[1]');
		$aRules = $aNewRules + $aRules;
		return $aRules;
	}
	 
	// hook add_rewrite_rules function into rewrite_rules_array
	add_filter('rewrite_rules_array', 'add_rewrite_rules');
	 
	// hook add_query_vars function into query_vars
	add_filter('query_vars', 'add_query_vars');
