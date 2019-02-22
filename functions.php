<?php
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */
	
	// Use a child theme instead of placing custom functions here
	// http://codex.wordpress.org/Child_Themes

	
/* ------------------------------------------------------------------------- *
 *  Load theme files
/* ------------------------------------------------------------------------- */	

// Load Kirki
include( get_template_directory() . '/functions/kirki/kirki.php' );

if ( ! function_exists( 'readline_load' ) ) {
	
	function readline_load() {
		// Load theme languages
		load_theme_textdomain( 'readline', get_template_directory().'/languages' );
		
		// Load theme options and meta boxes
		include( get_template_directory() . '/functions/theme-options.php' );
		include( get_template_directory() . '/functions/meta-boxes.php' );

		// Load dynamic styles
		include( get_template_directory() . '/functions/dynamic-styles.php' );
		
		// Load TGM plugin activation
		include( get_template_directory() . '/functions/class-tgm-plugin-activation.php' );
	}
	
}
add_action( 'after_setup_theme', 'readline_load' );	


/* ------------------------------------------------------------------------- *
 *  Base functionality
/* ------------------------------------------------------------------------- */
	
	// Content width
	if ( !isset( $content_width ) ) { $content_width = 620; }


/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'readline_setup' ) ) {
	
	function readline_setup() {
		// Enable title tag
		add_theme_support( 'title-tag' );
		
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		
		// Enable featured image
		add_theme_support( 'post-thumbnails' );
		
		// Enable post format support
		add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio' ) );
		
		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
		
		// Enable support for selective refresh of widgets in customizer
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Thumbnail sizes
		add_image_size( 'readline-small', 200, 200, true );
		add_image_size( 'readline-medium', 520, 292, true );
		add_image_size( 'readline-large', 720, 404, true );
		add_image_size( 'readline-huge', 1280, 620, true );
		add_image_size( 'readline-square', 500, 500, true );
		add_image_size( 'readline-height', 320, 480, true );
		
		// Thumbnail sizes custom widgets
		add_image_size( 'alx-small', 200, 200, true );
		add_image_size( 'alx-medium', 520, 292, true );

		// Custom menu areas
		register_nav_menus( array(
			'mobile' 	=> esc_html__( 'Mobile', 'readline' ),
			'header' 	=> esc_html__( 'Header', 'readline' ),
			'footer' 	=> esc_html__( 'Footer', 'readline' ),
		) );
	}
	
}
add_action( 'after_setup_theme', 'readline_setup' );


/*  Custom logo
/* ------------------------------------ */
if ( ! function_exists( 'readline_custom_logo' ) ) {
	
	function readline_custom_logo() {
		$defaults = array(
			'height'		=> 120,
			'width'			=> 400,
			'flex-height'	=> true,
			'flex-width'	=> true,
			'header-text'	=> array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}

}	
add_action( 'after_setup_theme', 'readline_custom_logo' );


/*  Custom header
/* ------------------------------------ */
if ( ! function_exists( 'readline_custom_header' ) ) {
	
	function readline_custom_header() {
		$args = array(
			'default-image'	=> false,
			'default-text'	=> false,
			'width'			=> 1120,
			'height'		=> 300,
			'flex-width'	=> true,
			'flex-height'	=> true,
		);
		add_theme_support( 'custom-header', $args );
	}
	
}
add_action( 'after_setup_theme', 'readline_custom_header' );


/*  Custom background
/* ------------------------------------ */
if ( ! function_exists( 'readline_custom_background' ) ) {
	
	function readline_custom_background() {
		$args = array();
		add_theme_support( 'custom-background', $args );
	}
	
}
add_action( 'after_setup_theme', 'readline_custom_background' );


/*  Deregister
/* ------------------------------------ */
if ( ! function_exists( 'readline_deregister' ) ) {
	
	function readline_deregister() {
		wp_deregister_style( 'wp-pagenavi' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'readline_deregister', 100 );


/*  Register sidebars
/* ------------------------------------ */	
if ( ! function_exists( 'readline_sidebars' ) ) {

	function readline_sidebars()	{
		register_sidebar(array( 'name' => esc_html__('Primary','readline'),'id' => 'primary','description' => esc_html__("Normal full width sidebar","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>'));
		
		if ( get_theme_mod('footer-ads') == 'on' ) { register_sidebar(array( 'name' => esc_html__('Footer Ads',"readline"),'id' => 'footer-ads', 'description' => esc_html__("Footer ads area","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		
		if ( get_theme_mod('frontpage-widgets-top') == 'on' ) { register_sidebar(array( 'name' => esc_html__('Frontpage Top 1','readline'),'id' => 'frontpage-top-1', 'description' => esc_html__("Frontpage area","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		if ( get_theme_mod('frontpage-widgets-top') == 'on' ) { register_sidebar(array( 'name' => esc_html__('Frontpage Top 2','readline'),'id' => 'frontpage-top-2', 'description' => esc_html__("Frontpage area","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		if ( get_theme_mod('frontpage-widgets-bottom') == 'on' ) { register_sidebar(array( 'name' => esc_html__('Frontpage Bottom 1','readline'),'id' => 'frontpage-bottom-1', 'description' => esc_html__("Frontpage area","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		if ( get_theme_mod('frontpage-widgets-bottom') == 'on' ) { register_sidebar(array( 'name' => esc_html__('Frontpage Bottom 2','readline'),'id' => 'frontpage-bottom-2', 'description' => esc_html__("Frontpage area","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		
		if ( get_theme_mod('footer-widgets') >= '1' ) { register_sidebar(array( 'name' => esc_html__('Footer 1','readline'),'id' => 'footer-1', 'description' => esc_html__("Widgetized footer","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		if ( get_theme_mod('footer-widgets') >= '2' ) { register_sidebar(array( 'name' => esc_html__('Footer 2','readline'),'id' => 'footer-2', 'description' => esc_html__("Widgetized footer","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		if ( get_theme_mod('footer-widgets') >= '3' ) { register_sidebar(array( 'name' => esc_html__('Footer 3','readline'),'id' => 'footer-3', 'description' => esc_html__("Widgetized footer","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
		if ( get_theme_mod('footer-widgets') >= '4' ) { register_sidebar(array( 'name' => esc_html__('Footer 4','readline'),'id' => 'footer-4', 'description' => esc_html__("Widgetized footer","readline"), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="group"><span>','after_title' => '</span></h3>')); }
	}
	
}
add_action( 'widgets_init', 'readline_sidebars' );


/*  Enqueue javascript
/* ------------------------------------ */	
if ( ! function_exists( 'readline_scripts' ) ) {
	
	function readline_scripts() {
		wp_enqueue_script( 'readline-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array( 'jquery' ),'', false );
		wp_enqueue_script( 'readline-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'readline-jq-sticky-anything', get_template_directory_uri() . '/js/jq-sticky-anything.min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'readline-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'readline-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }
	}  
	
}
add_action( 'wp_enqueue_scripts', 'readline_scripts' ); 


/*  Enqueue css
/* ------------------------------------ */	
if ( ! function_exists( 'readline_styles' ) ) {
	
	function readline_styles() {
		wp_enqueue_style( 'readline-style', get_stylesheet_uri() );
		if ( get_theme_mod('responsive','on') =='on' ) { wp_enqueue_style( 'readline-responsive', get_template_directory_uri().'/responsive.css' ); }
		if ( get_theme_mod('dark','off') == 'on' ) { wp_enqueue_style( 'readline-dark', get_template_directory_uri().'/dark.css' ); }
		wp_enqueue_style( 'readline-font-awesome', get_template_directory_uri().'/fonts/font-awesome.min.css' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'readline_styles' );


/*  Light & dark mode switch
/* ------------------------------------ */
if ( ! function_exists( 'readline_switch' ) ) {

	function readline_switch() {

		if ( get_theme_mod('light-dark-switch','off') =='on' ) { 
		
			$current_mode = 'light';
			if ( isset( $_COOKIE['theme_mode'] ) && ! empty( $_COOKIE['theme_mode'] ) ) {
				$current_mode = $_COOKIE['theme_mode'];
			}
			if ( in_array( $current_mode, array( 'light', 'dark' ) ) ) {
				wp_enqueue_style( 'readline-scheme', get_template_directory_uri() . '/' . esc_attr( $current_mode ) . '.css' );
			}
			wp_enqueue_script( 'readline-cookie', get_template_directory_uri() . '/js/cookie.min.js', array(), '2.2.0', true );
			wp_enqueue_script( 'readline-switch', get_template_directory_uri() . '/js/switch.js', array( 'jquery' ), '2.0', true );
			$data = array(
				'template_directory_uri'   => get_template_directory_uri(),
				'stylesheet_directory_uri' => get_stylesheet_directory_uri(),
				);
			wp_localize_script( 'readline-switch', 'readlineObject', $data );
			
		}
	}

}
add_action( 'wp_enqueue_scripts', 'readline_switch' );


/* ------------------------------------------------------------------------- *
 *  Template functions
/* ------------------------------------------------------------------------- */	

/*  Layout class
/* ------------------------------------ */
if ( ! function_exists( 'readline_layout_class' ) ) {
	
	function readline_layout_class() {
		// Default layout
		$layout = 'col-1c';
		$default = 'col-1c';

		// Check for page/post specific layout
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_layout',true);
			// Get if set and not set to inherit
			if ( isset($meta) && !empty($meta) && $meta != 'inherit' ) { $layout = $meta; }
			// Else check for page-global / single-global
			elseif ( is_single() && ( get_theme_mod('layout-single','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-single',''.$default.'');
			elseif ( is_page() && ( get_theme_mod('layout-page','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-page',''.$default.'');
			// Else get global option
			else $layout = get_theme_mod('layout-global',''.$default.'');
		}
		
		// Set layout based on page
		elseif ( is_home() && ( get_theme_mod('layout-home','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-home',''.$default.'');
		elseif ( is_category() && ( get_theme_mod('layout-archive-category','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-archive-category',''.$default.'');
		elseif ( is_archive() && ( get_theme_mod('layout-archive','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-archive',''.$default.'');
		elseif ( is_search() && ( get_theme_mod('layout-search','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-search',''.$default.'');
		elseif ( is_404() && ( get_theme_mod('layout-404','inherit') !='inherit' ) ) $layout = get_theme_mod('layout-404',''.$default.'');
		
		// Global option
		else $layout = get_theme_mod('layout-global',''.$default.'');
		
		// Return layout class
		return esc_attr( $layout );
	}
	
}


/*  Dynamic sidebar primary
/* ------------------------------------ */
if ( ! function_exists( 'readline_sidebar_primary' ) ) {
	
	function readline_sidebar_primary() {
		// Default sidebar
		$sidebar = 'primary';

		// Set sidebar based on page
		if ( is_home() && get_theme_mod('s1-home') ) $sidebar = get_theme_mod('s1-home');
		if ( is_single() && get_theme_mod('s1-single') ) $sidebar = get_theme_mod('s1-single');
		if ( is_archive() && get_theme_mod('s1-archive') ) $sidebar = get_theme_mod('s1-archive');
		if ( is_category() && get_theme_mod('s1-archive-category') ) $sidebar = get_theme_mod('s1-archive-category');
		if ( is_search() && get_theme_mod('s1-search') ) $sidebar = get_theme_mod('s1-search');
		if ( is_404() && get_theme_mod('s1-404') ) $sidebar = get_theme_mod('s1-404');
		if ( is_page() && get_theme_mod('s1-page') ) $sidebar = get_theme_mod('s1-page');

		// Check for page/post specific sidebar
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_sidebar_primary',true);
			if ( $meta ) { $sidebar = $meta; }
		}

		// Return sidebar
		return esc_attr( $sidebar );
	}
	
}


/*  Dynamic sidebar secondary
/* ------------------------------------ */
if ( ! function_exists( 'readline_sidebar_secondary' ) ) {

	function readline_sidebar_secondary() {
		// Default sidebar
		$sidebar = 'secondary';

		// Set sidebar based on page
		if ( is_home() && get_theme_mod('s2-home') ) $sidebar = get_theme_mod('s2-home');
		if ( is_single() && get_theme_mod('s2-single') ) $sidebar = get_theme_mod('s2-single');
		if ( is_archive() && get_theme_mod('s2-archive') ) $sidebar = get_theme_mod('s2-archive');
		if ( is_category() && get_theme_mod('s2-archive-category') ) $sidebar = get_theme_mod('s2-archive-category');
		if ( is_search() && get_theme_mod('s2-search') ) $sidebar = get_theme_mod('s2-search');
		if ( is_404() && get_theme_mod('s2-404') ) $sidebar = get_theme_mod('s2-404');
		if ( is_page() && get_theme_mod('s2-page') ) $sidebar = get_theme_mod('s2-page');

		// Check for page/post specific sidebar
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_sidebar_secondary',true);
			if ( $meta ) { $sidebar = $meta; }
		}

		// Return sidebar
		return esc_attr( $sidebar );
	}
	
}


/*  Social links
/* ------------------------------------ */
if ( ! function_exists( 'readline_social_links' ) ) {

	function readline_social_links() {
		if ( !get_theme_mod('social-links') =='' ) {
			$links = get_theme_mod('social-links', array());
			if ( !empty( $links ) ) {
				echo '<ul class="social-links">';	
				foreach( $links as $item ) {
					
					// Build each separate html-section only if set
					if ( isset($item['social-title']) && !empty($item['social-title']) ) 
						{ $title = 'title="' .esc_attr( $item['social-title'] ). '"'; } else $title = '';
					if ( isset($item['social-link']) && !empty($item['social-link']) ) 
						{ $link = 'href="' .esc_url( $item['social-link'] ). '"'; } else $link = '';
					if ( isset($item['social-target']) && !empty($item['social-target']) ) 
						{ $target = 'target="_blank"'; } else $target = '';
					if ( isset($item['social-icon']) && !empty($item['social-icon']) ) 
						{ $icon = 'class="fa ' .esc_attr( $item['social-icon'] ). '"'; } else $icon = '';
					if ( isset($item['social-color']) && !empty($item['social-color']) ) 
						{ $color = 'style="color: ' .esc_attr( $item['social-color'] ). ';"'; } else $color = '';
					
					// Put them together
					if ( isset($item['social-title']) && !empty($item['social-title']) && isset($item['social-icon']) && !empty($item['social-icon']) && ($item['social-icon'] !='fa-') ) {
						echo '<li><a rel="nofollow" class="social-tooltip" '.$title.' '.$link.' '.$target.'><i '.$icon.' '.$color.'></i></a></li>';
					}
				}
				echo '</ul>';
			}
		}
	}
	
}


/*  Site name/logo
/* ------------------------------------ */
if ( ! function_exists( 'readline_site_title' ) ) {

	function readline_site_title() {
		
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		
		// Text or image?
		if ( has_custom_logo() ) {
			$logo = '<img src="'. esc_url( $logo[0] ) .'" alt="'.esc_attr( get_bloginfo('name')).'">';;
		} else {
			$logo = esc_html( get_bloginfo('name') );
		}
		
		$link = '<a href="'.esc_url( home_url('/') ).'" rel="home">'.$logo.'</a>';
		
		if ( is_front_page() || is_home() ) {
			$sitename = '<h1 class="site-title">'.$link.'</h1>'."\n";
		} else {
			$sitename = '<p class="site-title">'.$link.'</p>'."\n";
		}
		
		return $sitename;
	}
	
}


/*  Blog title
/* ------------------------------------ */
if ( ! function_exists( 'readline_blog_title' ) ) {

	function readline_blog_title() {
		global $post;
		$heading = esc_html( get_theme_mod('blog-heading') );
		$subheading = esc_html( get_theme_mod('blog-subheading') );
		if($heading) {
			$title = $heading;
		} else {
			$title = esc_html( get_bloginfo('name') );
		}
		if($subheading) {
			$title = $title.' <span>'.$subheading.'</span>';
		}

		return $title;
	}
	
}


/*  Related posts
/* ------------------------------------ */
if ( ! function_exists( 'readline_related_posts' ) ) {

	function readline_related_posts() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'				=> true,
			'update_post_meta_cache'	=> false,
			'update_post_term_cache'	=> false,
			'ignore_sticky_posts'		=> 1,
			'orderby'					=> 'rand',
			'post__not_in'				=> array($post->ID),
			'posts_per_page'			=> 3
		);
		// Related by categories
		if ( get_theme_mod('related-posts') == 'categories' ) {
			
			$cats = get_post_meta($post->ID, 'related-cat', true);
			
			if ( !$cats ) {
				$cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod('related-posts') == 'tags' ) {
		
			$tags = get_post_meta($post->ID, 'related-tag', true);
			
			if ( !$tags ) {
				$tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode(',', $tags);
			}
			if ( !$tags ) { $break = true; }
		}
		
		$query = !isset($break)?new WP_Query($args):new WP_Query;
		return $query;
	}
	
}


/*  Get images attached to post
/* ------------------------------------ */
if ( ! function_exists( 'readline_post_images' ) ) {

	function readline_post_images( $args=array() ) {
		global $post;

		$defaults = array(
			'numberposts'		=> -1,
			'order'				=> 'ASC',
			'orderby'			=> 'menu_order',
			'post_mime_type'	=> 'image',
			'post_parent'		=>  $post->ID,
			'post_type'			=> 'attachment',
		);

		$args = wp_parse_args( $args, $defaults );

		return get_posts( $args );
	}
	
}


/*  Get featured post ids
/* ------------------------------------ */
if ( ! function_exists( 'readline_get_featured_post_ids' ) ) {

	function readline_get_featured_post_ids() {
		$args = array(
			'category'		=> absint( get_theme_mod('featured-category','') ),
			'numberposts'	=> absint( get_theme_mod('featured-posts-count','6')),
		);
		$posts = get_posts($args);
		if ( !$posts ) return false;
		foreach ( $posts as $post )
			$ids[] = $post->ID;
		return $ids;
	}
	
}


/* ------------------------------------------------------------------------- *
 *  Filters
/* ------------------------------------------------------------------------- */

/*  Body class
/* ------------------------------------ */
if ( ! function_exists( 'readline_body_class' ) ) {
	
	function readline_body_class( $classes ) {
		$classes[] = readline_layout_class();
		
		if ( get_theme_mod('light-dark-switch','off') =='on' ) {
			
			// Scheme class.
			$current_mode = 'light';
			if ( isset( $_COOKIE['theme_mode'] ) && ! empty( $_COOKIE['theme_mode'] ) ) {
				$current_mode = $_COOKIE['theme_mode'];
			}
			if ( 'dark' === $current_mode ) {
				$classes[] = 'dark-mode';
			}
			
		}
		if ( get_theme_mod( 'boxed','off' ) != 'on' ) { $classes[] = 'full-width'; }
		if ( get_theme_mod( 'boxed','off' ) == 'on' ) { $classes[] = 'boxed'; }
		if ( has_nav_menu( 'topbar' ) ) { $classes[] = 'topbar-enabled'; }
		if ( has_nav_menu( 'mobile' ) ) { $classes[] = 'mobile-menu'; }
		if ( get_theme_mod( 'mobile-sidebar-hide','on' ) != 'on' ) { $classes[] = 'mobile-sidebar-hide'; }
		if ( get_theme_mod( 'left-bar','on' ) != 'on' ) { $classes[] = 'left-bar-hide'; }
		if (! ( is_user_logged_in() ) ) { $classes[] = 'logged-out'; }
		return $classes;
	}
	
}
add_filter( 'body_class', 'readline_body_class' );


/*  Excerpt ending
/* ------------------------------------ */
if ( ! function_exists( 'readline_excerpt_more' ) ) {

	function readline_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		return '&#46;&#46;&#46;';
	}
	
}
add_filter( 'excerpt_more', 'readline_excerpt_more' );


/*  Excerpt length
/* ------------------------------------ */
if ( ! function_exists( 'readline_excerpt_length' ) ) {

	function readline_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		$new_length = $length;
		$custom_length = get_theme_mod( 'excerpt-length', '26' );
		if ( absint( $custom_length ) > 0 ) {
			$new_length = absint( $custom_length );
		}
		return $new_length;
	}
	
}
add_filter( 'excerpt_length', 'readline_excerpt_length', 999 );


/*  Add responsive container to embeds
/* ------------------------------------ */	
if ( ! function_exists( 'readline_embed_html' ) ) {

	function readline_embed_html( $html, $url ) {
		
		$pattern    = '/^https?:\/\/(www\.)?twitter\.com/';
		$is_twitter = preg_match( $pattern, $url );
		
		if ( 1 === $is_twitter ) {
			return $html;
		}
	
		return '<div class="video-container">' . $html . '</div>';
	}

}
add_filter( 'embed_oembed_html', 'readline_embed_html', 10, 3 );


/*  Add responsive container to jetpack embeds
/* ------------------------------------ */	
if ( ! function_exists( 'readline_embed_html_jp' ) ) {

	function readline_embed_html_jp( $html ) {
		return '<div class="video-container">' . $html . '</div>';
	}

}
add_filter( 'video_embed_html', 'readline_embed_html_jp' );


/* ------------------------------------------------------------------------- *
 *  Actions
/* ------------------------------------------------------------------------- */	

/*  Include or exclude featured articles in loop
/* ------------------------------------ */
if ( ! function_exists( 'readline_pre_get_posts' ) ) {

	function readline_pre_get_posts( $query ) {
		// Are we on main query ?
		if ( !$query->is_main_query() ) return;
		if ( $query->is_home() ) {

			// Featured posts enabled
			if ( get_theme_mod('featured-posts-count','6') != '0' ) {
				// Get featured post ids
				$featured_post_ids = readline_get_featured_post_ids();
				// Exclude posts
				if ( $featured_post_ids && !get_theme_mod('featured-posts-include') )
					$query->set('post__not_in', $featured_post_ids);
			}
		}
	}
	
}
add_action( 'pre_get_posts', 'readline_pre_get_posts' );

/*  Script for no-js / js class
/* ------------------------------------ */
if ( ! function_exists( 'readline_html_js_class' ) ) {

	function readline_html_js_class () {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
	
}
add_action( 'wp_head', 'readline_html_js_class', 1 );


/*  Script for no-js / js class
/* ------------------------------------ */
if ( ! function_exists( 'readline_html_js_class' ) ) {

	function readline_html_js_class () {
		echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
	}
	
}
add_action( 'wp_head', 'readline_html_js_class', 1 );


/*  Admin panel css
/* ------------------------------------ */
if ( ! function_exists( 'readline_admin_panel_css' ) ) {
	
	function readline_admin_panel_css() {
		global $pagenow;
		if ( 'post.php' === $pagenow || 'post-new.php' === $pagenow ) {
			echo '<style>
				.rwmb-image-select { width: auto!important; height: auto!important; }
				.rwmb-text { width: 100%; }
			</style>';
		}
	}

}
add_action( 'admin_head', 'readline_admin_panel_css' );


/*  TGM plugin activation
/* ------------------------------------ */
if ( ! function_exists( 'readline_plugins' ) ) {
	
	function readline_plugins() {	
		if ( get_theme_mod('recommended-plugins','on') =='on' ) { 	
			// Add the following plugins
			$plugins = array(
				array(
					'name' => esc_html__( 'Alx Extensions', 'readline' ),
					'slug' => 'alx-extensions',
				),
				array(
					'name' => esc_html__( 'Meta Box', 'readline' ),
					'slug' => 'meta-box',
				),
				array(
					'name' => esc_html__( 'Regenerate Thumbnails', 'readline' ),
					'slug' => 'regenerate-thumbnails',
				),
				array(
					'name' => esc_html__( 'WP-PageNavi', 'readline' ),
					'slug' => 'wp-pagenavi',
				),
				array(
					'name' => esc_html__( 'Responsive Lightbox', 'readline' ),
					'slug' => 'responsive-lightbox',
				)
			);	
			tgmpa( $plugins );
		}
	}
	
}
add_action( 'tgmpa_register', 'readline_plugins' );


/*  WooCommerce basic support
/* ------------------------------------ */
function readline_wc_wrapper_start() {
	echo '<div class="content">';
	echo '<div class="pad">';
}
function readline_wc_wrapper_end() {
	echo '</div>';
	echo '</div>';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'readline_wc_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'readline_wc_wrapper_end', 10);


/* ------------------------------------------------------------------------- *
 *  Frontend scripts
/* ------------------------------------------------------------------------- */	

/*  Flexslider featured
/* ------------------------------------ */
if ( ! function_exists( 'readline_flexslider_featured' ) ) {
	
	function readline_flexslider_featured() {

		if( is_home() && !is_paged() && ( get_theme_mod('featured-posts-count','0') !='0') ) {
			
			$script = '
			jQuery(document).ready(function(){
				var firstImage = jQuery("#flexslider-featured").find("img").filter(":first"),
				   checkforloaded = setInterval(function() {
					   var image = firstImage.get(0);
					   if (image.complete || image.readyState == "complete" || image.readyState == 4) {
						   clearInterval(checkforloaded);
						   jQuery("#flexslider-featured").flexslider({
							   animation: "slide",
								useCSS: false, // Fix iPad flickering issue
								directionNav: true,
								controlNav: true,
								pauseOnHover: true,
								animationSpeed: 400,
								smoothHeight: true,
								touch: false,
								slideshow: false,
								slideshowSpeed: 7000,
						   });
					   }
				   }, 20);
			   });
			';

			wp_add_inline_script( 'readline-scripts', $script );
			
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'readline_flexslider_featured' );
	

/*  Flexslider gallery post format
/* ------------------------------------ */
if ( ! function_exists( 'readline_flexslider_gallery' ) ) {

	function readline_flexslider_gallery() {

		if( ( is_home() || is_single() || is_archive() || is_search() ) && have_posts() ) {
			while( have_posts() ) {
				the_post();

				if( get_post_format() && get_post_format() === 'gallery' ) {
					
					$script = '
					jQuery(document).ready(function(){
						var firstImage = jQuery("#flexslider-' . get_the_ID() . '").find("img").filter(":first"),
						   checkforloaded = setInterval(function() {
							   var image = firstImage.get(0);
							   if (image.complete || image.readyState == "complete" || image.readyState == 4) {
								   clearInterval(checkforloaded);
								   jQuery("#flexslider-' . get_the_ID() . '").flexslider({
									   animation: "fade",
									   slideshow: false,
									   directionNav: true,
									   controlNav: false,
									   pauseOnHover: true,
									   slideshowSpeed: 7000,
									   animationSpeed: 600,
									   smoothHeight: true,
									   touch: false
								   });
							   }
						   }, 20);
					   });
					';

					wp_add_inline_script( 'readline-scripts', $script );
					
				}
			}
		}
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'readline_flexslider_gallery' );

