<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/*  Add Config
/* ------------------------------------ */
Kirki::add_config( 'readline', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/*  Add Links
/* ------------------------------------ */
Kirki::add_section( 'morelink', array(
	'title'       => esc_html__( 'AlxMedia', 'readline' ),
	'type'        => 'link',
	'button_text' => esc_html__( 'View More Themes', 'readline' ),
	'button_url'  => 'http://alxmedia.se/themes/',
	'priority'    => 13,
) );
Kirki::add_section( 'reviewlink', array(
	'title'       => esc_html__( 'Like This Theme?', 'readline' ),
	'panel'       => 'options',
	'type'        => 'link',
	'button_text' => esc_html__( 'Write a Review', 'readline' ),
	'button_url'  => 'https://wordpress.org/support/theme/readline/reviews/?filter=5#new-post',
	'priority'    => 1,
) );

/*  Add Panels
/* ------------------------------------ */
Kirki::add_panel( 'options', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Theme Options', 'readline' ),
) );

/*  Add Sections
/* ------------------------------------ */
Kirki::add_section( 'general', array(
    'priority'    => 10,
    'title'       => esc_html__( 'General', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'blog', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Blog', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'header', array(
    'priority'    => 30,
    'title'       => esc_html__( 'Header', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'footer', array(
    'priority'    => 40,
    'title'       => esc_html__( 'Footer', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'layout', array(
    'priority'    => 50,
    'title'       => esc_html__( 'Layout', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'sidebars', array(
    'priority'    => 60,
    'title'       => esc_html__( 'Sidebars', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'social', array(
    'priority'    => 70,
    'title'       => esc_html__( 'Social Links', 'readline' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'styling', array(
    'priority'    => 80,
    'title'       => esc_html__( 'Styling', 'readline' ),
	'panel'       => 'options',
) );

/*  Add Fields
/* ------------------------------------ */

// General: Responsive Layout
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'responsive',
	'label'			=> esc_html__( 'Responsive Layout', 'readline' ),
	'description'	=> esc_html__( 'Mobile and tablet optimizations (responsive.css)', 'readline' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// General: Mobile Sidebar
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'mobile-sidebar-hide',
	'label'			=> esc_html__( 'Mobile Sidebar Content', 'readline' ),
	'description'	=> esc_html__( 'Sidebar content on low-resolution mobile devices (320px)', 'readline' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// General: Recommended Plugins
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'recommended-plugins',
	'label'			=> esc_html__( 'Recommended Plugins', 'readline' ),
	'description'	=> esc_html__( 'Enable or disable the recommended plugins notice', 'readline' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// Blog: Heading
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'text',
	'settings'		=> 'blog-heading',
	'label'			=> esc_html__( 'Heading', 'readline' ),
	'description'	=> esc_html__( 'Your blog heading', 'readline' ),
	'section'		=> 'blog',
	'default'		=> '',
) );
// Blog: Subheading
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'text',
	'settings'		=> 'blog-subheading',
	'label'			=> esc_html__( 'Subheading', 'readline' ),
	'description'	=> esc_html__( 'Your blog subheading', 'readline' ),
	'section'		=> 'blog',
	'default'		=> '',
) );
// Blog: Excerpt Length
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'excerpt-length',
	'label'			=> esc_html__( 'Excerpt Length', 'readline' ),
	'description'	=> esc_html__( 'Max number of words. Set it to 0 to disable.', 'readline' ),
	'section'		=> 'blog',
	'default'		=> '26',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '100',
		'step'	=> '1',
	),
) );
// Blog: Featured Posts Include
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'checkbox',
	'settings'		=> 'featured-posts-include',
	'label'			=> esc_html__( 'Featured Posts', 'readline' ),
	'description'	=> esc_html__( 'To show featured posts in the slider AND the content below. Usually not recommended.', 'readline' ),
	'section'		=> 'blog',
	'default'		=> false,
) );
// Blog: Featured Category
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'select',
	'settings'		=> 'featured-category',
	'label'			=> esc_html__( 'Featured Category', 'readline' ),
	'description'	=> esc_html__( 'By not selecting a category, it will show your latest post(s) from all categories', 'readline' ),
	'section'		=> 'blog',
	'default'		=> '',
	'choices'		=> Kirki_Helper::get_terms( 'category' ),
	'placeholder'	=> esc_html__( 'Select a category', 'readline' ),
) );
// Blog: Featured Post Count
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'featured-posts-count',
	'label'			=> esc_html__( 'Featured Post Count', 'readline' ),
	'description'	=> esc_html__( 'Max number of featured posts to display. Set it to 0 to disable', 'readline' ),
	'section'		=> 'blog',
	'default'		=> '6',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '12',
		'step'	=> '1',
	),
) );
// Blog: Frontpage Widgets Top
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'frontpage-widgets-top',
	'label'			=> esc_html__( 'Frontpage Widgets Top', 'readline' ),
	'description'	=> esc_html__( '2 columns of widgets', 'readline' ),
	'section'		=> 'blog',
	'default'		=> 'off',
) );
// Blog: Frontpage Widgets Bottom
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'frontpage-widgets-bottom',
	'label'			=> esc_html__( 'Frontpage Widgets Bottom', 'readline' ),
	'description'	=> esc_html__( '2 columns of widgets', 'readline' ),
	'section'		=> 'blog',
	'default'		=> 'off',
) );
// Blog: Comment Count
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'comment-count',
	'label'			=> esc_html__( 'Thumbnail Comment Count', 'readline' ),
	'description'	=> esc_html__( 'Comment count on thumbnails', 'readline' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Single - Authorbox
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'author-bio',
	'label'			=> esc_html__( 'Single - Author Bio', 'readline' ),
	'description'	=> esc_html__( 'Shows post author description, if it exists', 'readline' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Single - Related Posts
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio',
	'settings'		=> 'related-posts',
	'label'			=> esc_html__( 'Single - Related Posts', 'readline' ),
	'description'	=> esc_html__( 'Shows randomized related articles below the post', 'readline' ),
	'section'		=> 'blog',
	'default'		=> 'categories',
	'choices'		=> array(
		'disable'	=> esc_html__( 'Disable', 'readline' ),
		'categories'=> esc_html__( 'Related by categories', 'readline' ),
		'tags'		=> esc_html__( 'Related by tags', 'readline' ),
	),
) );
// Blog: Single - Post Navigation
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio',
	'settings'		=> 'post-nav',
	'label'			=> esc_html__( 'Single - Post Navigation', 'readline' ),
	'description'	=> esc_html__( 'Shows links to the next and previous article', 'readline' ),
	'section'		=> 'blog',
	'default'		=> 's1',
	'choices'		=> array(
		'disable'	=> esc_html__( 'Disable', 'readline' ),
		's1'		=> esc_html__( 'Sidebar Primary', 'readline' ),
		'content'	=> esc_html__( 'Below content', 'readline' ),
	),
) );
// Header: Search
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'header-search',
	'label'			=> esc_html__( 'Header Search', 'readline' ),
	'description'	=> esc_html__( 'Header search button', 'readline' ),
	'section'		=> 'header',
	'default'		=> 'on',
) );
// Header: Social Links
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'header-social',
	'label'			=> esc_html__( 'Header Social Links', 'readline' ),
	'description'	=> esc_html__( 'Social link icon buttons', 'readline' ),
	'section'		=> 'header',
	'default'		=> 'on',
) );
// Footer: Ads
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'footer-ads',
	'label'			=> esc_html__( 'Footer Ads', 'readline' ),
	'description'	=> esc_html__( 'Footer widget ads area', 'readline' ),
	'section'		=> 'footer',
	'default'		=> 'off',
) );
// Footer: Widget Columns
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'footer-widgets',
	'label'			=> esc_html__( 'Footer Widget Columns', 'readline' ),
	'description'	=> esc_html__( 'Select columns to enable footer widgets. Recommended number: 3', 'readline' ),
	'section'		=> 'footer',
	'default'		=> '0',
	'choices'     => array(
		'0'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'1'	=> get_template_directory_uri() . '/functions/images/footer-widgets-1.png',
		'2'	=> get_template_directory_uri() . '/functions/images/footer-widgets-2.png',
		'3'	=> get_template_directory_uri() . '/functions/images/footer-widgets-3.png',
		'4'	=> get_template_directory_uri() . '/functions/images/footer-widgets-4.png',
	),
) );
// Footer: Social Links
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'footer-social',
	'label'			=> esc_html__( 'Footer Social Links', 'readline' ),
	'description'	=> esc_html__( 'Social link icon buttons', 'readline' ),
	'section'		=> 'footer',
	'default'		=> 'on',
) );
// Footer: Custom Logo
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'image',
	'settings'		=> 'footer-logo',
	'label'			=> esc_html__( 'Footer Logo', 'readline' ),
	'description'	=> esc_html__( 'Upload your custom logo image', 'readline' ),
	'section'		=> 'footer',
	'default'		=> '',
) );
// Footer: Copyright
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'text',
	'settings'		=> 'copyright',
	'label'			=> esc_html__( 'Footer Copyright', 'readline' ),
	'description'	=> esc_html__( 'Replace the footer copyright text', 'readline' ),
	'section'		=> 'footer',
	'default'		=> '',
) );
// Footer: Credit
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'credit',
	'label'			=> esc_html__( 'Footer Credit', 'readline' ),
	'description'	=> esc_html__( 'Footer credit text', 'readline' ),
	'section'		=> 'footer',
	'default'		=> 'on',
) );
// Layout: Global
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-global',
	'label'			=> esc_html__( 'Global Layout', 'readline' ),
	'description'	=> esc_html__( 'Other layouts will override this option if they are set', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'col-1c',
	'choices'     => array(
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Home
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-home',
	'label'			=> esc_html__( 'Home', 'readline' ),
	'description'	=> esc_html__( '(is_home) Posts homepage layout', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Single
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-single',
	'label'			=> esc_html__( 'Single', 'readline' ),
	'description'	=> esc_html__( '(is_single) Single post layout - If a post has a set layout, it will override this.', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Archive
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-archive',
	'label'			=> esc_html__( 'Archive', 'readline' ),
	'description'	=> esc_html__( '(is_archive) Category, date, tag and author archive layout', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout : Archive - Category
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-archive-category',
	'label'			=> esc_html__( 'Archive - Category', 'readline' ),
	'description'	=> esc_html__( '(is_category) Category archive layout', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Search
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-search',
	'label'			=> esc_html__( 'Search', 'readline' ),
	'description'	=> esc_html__( '(is_search) Search page layout', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Error 404
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-404',
	'label'			=> esc_html__( 'Error 404', 'readline' ),
	'description'	=> esc_html__( '(is_404) Error 404 page layout', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Default Page
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-page',
	'label'			=> esc_html__( 'Default Page', 'readline' ),
	'description'	=> esc_html__( '(is_page) Default page layout - If a page has a set layout, it will override this.', 'readline' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );


function readline_kirki_sidebars_select() { 
 	$sidebars = array(); 
 	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) { 
 		$sidebars = $GLOBALS['wp_registered_sidebars']; 
 	} 
 	$sidebars_choices = array(); 
 	foreach ( $sidebars as $sidebar ) { 
 		$sidebars_choices[ $sidebar['id'] ] = $sidebar['name']; 
 	} 
 	if ( ! class_exists( 'Kirki' ) ) { 
 		return; 
 	}
	// Sidebars: Select
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-home',
		'label'			=> esc_html__( 'Home', 'readline' ),
		'description'	=> esc_html__( '(is_home) Primary', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-single',
		'label'			=> esc_html__( 'Single', 'readline' ),
		'description'	=> esc_html__( '(is_single) Primary - If a single post has a unique sidebar, it will override this.', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-archive',
		'label'			=> esc_html__( 'Archive', 'readline' ),
		'description'	=> esc_html__( '(is_archive) Primary', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-archive-category',
		'label'			=> esc_html__( 'Archive - Category', 'readline' ),
		'description'	=> esc_html__( '(is_category) Primary', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-search',
		'label'			=> esc_html__( 'Search', 'readline' ),
		'description'	=> esc_html__( '(is_search) Primary', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-404',
		'label'			=> esc_html__( 'Error 404', 'readline' ),
		'description'	=> esc_html__( '(is_404) Primary', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	Kirki::add_field( 'readline_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-page',
		'label'			=> esc_html__( 'Default Page', 'readline' ),
		'description'	=> esc_html__( '(is_page) Primary - If a page has a unique sidebar, it will override this.', 'readline' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'readline' ),
	) );
	
 } 
add_action( 'init', 'readline_kirki_sidebars_select', 999 ); 

// Social Links: List
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'repeater',
	'label'			=> esc_html__( 'Create Social Links', 'readline' ),
	'description'	=> esc_html__( 'Create and organize your social links', 'readline' ),
	'section'		=> 'social',
	'tooltip'		=> esc_html__( 'Font Awesome names:', 'readline' ) . ' <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"><strong>' . esc_html__( 'View All', 'readline' ) . ' </strong></a>',
	'row_label'		=> array(
		'type'	=> 'text',
		'value'	=> esc_html__('social link', 'readline' ),
	),
	'settings'		=> 'social-links',
	'default'		=> '',
	'fields'		=> array(
		'social-title'	=> array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Title', 'readline' ),
			'description'	=> esc_html__( 'Ex: Facebook', 'readline' ),
			'default'		=> '',
		),
		'social-icon'	=> array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Icon Name', 'readline' ),
			'description'	=> esc_html__( 'Font Awesome icons. Ex: fa-facebook ', 'readline' ) . ' <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"><strong>' . esc_html__( 'View All', 'readline' ) . ' </strong></a>',
			'default'		=> 'fa-',
		),
		'social-link'	=> array(
			'type'			=> 'link',
			'label'			=> esc_html__( 'Link', 'readline' ),
			'description'	=> esc_html__( 'Enter the full url for your icon button', 'readline' ),
			'default'		=> 'http://',
		),
		'social-color'	=> array(
			'type'			=> 'color',
			'label'			=> esc_html__( 'Icon Color', 'readline' ),
			'description'	=> esc_html__( 'Set a unique color for your icon (optional)', 'readline' ),
			'default'		=> '',
		),
		'social-target'	=> array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Open in new window', 'readline' ),
			'default'		=> false,
		),
	)
) );
// Styling: Enable
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'dynamic-styles',
	'label'			=> esc_html__( 'Dynamic Styles', 'readline' ),
	'description'	=> esc_html__( 'Turn on to use the styling options below', 'readline' ),
	'section'		=> 'styling',
	'default'		=> 'on',
) );
// Styling: Boxed Layout
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'boxed',
	'label'			=> esc_html__( 'Boxed Layout', 'readline' ),
	'description'	=> esc_html__( 'Use a boxed layout', 'readline' ),
	'section'		=> 'styling',
	'default'		=> 'off',
) );
// Styling: Left Bar
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'left-bar',
	'label'			=> esc_html__( 'Left Bar', 'readline' ),
	'description'	=> esc_html__( 'The social/search left bar', 'readline' ),
	'section'		=> 'styling',
	'default'		=> 'on',
) );
// Styling: Light Sidebar
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'light-sidebar',
	'label'			=> esc_html__( 'Light Sidebar', 'readline' ),
	'description'	=> esc_html__( 'Light colors for the sidebar', 'readline' ),
	'section'		=> 'styling',
	'default'		=> 'off',
) );
// Styling: Light Footer Widgets
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'light-footer',
	'label'			=> esc_html__( 'Light Footer', 'readline' ),
	'description'	=> esc_html__( 'Light colors for footer widgets', 'readline' ),
	'section'		=> 'styling',
	'default'		=> 'off',
) );
// Styling: Font
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'select',
	'settings'		=> 'font',
	'label'			=> esc_html__( 'Font', 'readline' ),
	'description'	=> esc_html__( 'Select font for the theme', 'readline' ),
	'section'		=> 'styling',
	'default'		=> 'roboto',
	'choices'     => array(
		'titillium-web'			=> esc_html__( 'Titillium Web, Latin (Self-hosted)', 'readline' ),
		'titillium-web-ext'		=> esc_html__( 'Titillium Web, Latin-Ext', 'readline' ),
		'droid-serif'			=> esc_html__( 'Droid Serif, Latin', 'readline' ),
		'source-sans-pro'		=> esc_html__( 'Source Sans Pro, Latin-Ext', 'readline' ),
		'lato'					=> esc_html__( 'Lato, Latin', 'readline' ),
		'raleway'				=> esc_html__( 'Raleway, Latin', 'readline' ),
		'ubuntu'				=> esc_html__( 'Ubuntu, Latin-Ext', 'readline' ),
		'ubuntu-cyr'			=> esc_html__( 'Ubuntu, Latin / Cyrillic-Ext', 'readline' ),
		'roboto'				=> esc_html__( 'Roboto, Latin-Ext', 'readline' ),
		'roboto-cyr'			=> esc_html__( 'Roboto, Latin / Cyrillic-Ext', 'readline' ),
		'roboto-condensed'		=> esc_html__( 'Roboto Condensed, Latin-Ext', 'readline' ),
		'roboto-condensed-cyr'	=> esc_html__( 'Roboto Condensed, Latin / Cyrillic-Ext', 'readline' ),
		'roboto-slab'			=> esc_html__( 'Roboto Slab, Latin-Ext', 'readline' ),
		'roboto-slab-cyr'		=> esc_html__( 'Roboto Slab, Latin / Cyrillic-Ext', 'readline' ),
		'playfair-display'		=> esc_html__( 'Playfair Display, Latin-Ext', 'readline' ),
		'playfair-display-cyr'	=> esc_html__( 'Playfair Display, Latin / Cyrillic', 'readline' ),
		'open-sans'				=> esc_html__( 'Open Sans, Latin-Ext', 'readline' ),
		'open-sans-cyr'			=> esc_html__( 'Open Sans, Latin / Cyrillic-Ext', 'readline' ),
		'pt-serif'				=> esc_html__( 'PT Serif, Latin-Ext', 'readline' ),
		'pt-serif-cyr'			=> esc_html__( 'PT Serif, Latin / Cyrillic-Ext', 'readline' ),
		'arial'					=> esc_html__( 'Arial', 'readline' ),
		'georgia'				=> esc_html__( 'Georgia', 'readline' ),
		'verdana'				=> esc_html__( 'Verdana', 'readline' ),
		'tahoma'				=> esc_html__( 'Tahoma', 'readline' ),
	),
) );
// Styling: Header Logo Max-height
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'logo-max-height',
	'label'			=> esc_html__( 'Header Logo Image Max-height', 'readline' ),
	'description'	=> esc_html__( 'Your logo image should have the double height of this to be high resolution', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '60',
	'choices'     => array(
		'min'	=> '40',
		'max'	=> '200',
		'step'	=> '1',
	),
) );

// Styling: Primary Color
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-1',
	'label'			=> esc_html__( 'Primary Color', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '#b19c5e',
) );
// Styling: Header Top
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-header-top',
	'label'			=> esc_html__( 'Header Top', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Page Title
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-page-title',
	'label'			=> esc_html__( 'Page Title', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Left Bar
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-left-bar',
	'label'			=> esc_html__( 'Left Bar', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Footer Menu
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-footer-menu',
	'label'			=> esc_html__( 'Footer Menu', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Footer Bottom
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-footer-bottom',
	'label'			=> esc_html__( 'Footer Bottom', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Post Hover
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-post-hover',
	'label'			=> esc_html__( 'Post Hover', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Comment Count
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-comment-count',
	'label'			=> esc_html__( 'Comment Count', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Carousel Next/Prev
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-carousel',
	'label'			=> esc_html__( 'Carousel Next/Prev', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Body
Kirki::add_field( 'readline_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-body',
	'label'			=> esc_html__( 'Body', 'readline' ),
	'section'		=> 'styling',
	'default'		=> '',
) );