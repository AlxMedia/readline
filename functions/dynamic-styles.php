<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Convert hexadecimal to rgb
/* ------------------------------------ */
if ( ! function_exists( 'readline_hex2rgb' ) ) {

	function readline_hex2rgb( $hex, $array=false ) {
		$hex = str_replace("#", "", $hex);

		if ( strlen($hex) == 3 ) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}

		$rgb = array( $r, $g, $b );
		if ( !$array ) { $rgb = implode(",", $rgb); }
		return $rgb;
	}
	
}	


/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'readline_enqueue_google_fonts' ) ) {

	function readline_enqueue_google_fonts () {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { wp_enqueue_style( 'titillium-web-ext', '//fonts.googleapis.com/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }		
			if ( get_theme_mod( 'font' ) == 'droid-serif' )	{ wp_enqueue_style( 'droid-serif', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700' ); }				
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' )	{ wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'lato' ) { wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700' ); }
			if ( get_theme_mod( 'font' ) == 'raleway' )	{ wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,600' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu' ) { wp_enqueue_style( 'ubuntu', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) { wp_enqueue_style( 'ubuntu-cyr', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext' ); }
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'roboto' ) ) { wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-cyr' ) { wp_enqueue_style( 'roboto-cyr', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed' ) { wp_enqueue_style( 'roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) { wp_enqueue_style( 'roboto-condensed-cyr', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab' ) { wp_enqueue_style( 'roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) { wp_enqueue_style( 'roboto-slab-cyr', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display' ) { wp_enqueue_style( 'playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) { wp_enqueue_style( 'playfair-display-cyr', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,cyrillic' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans' ) { wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) { wp_enqueue_style( 'open-sans-cyr', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif' ) { wp_enqueue_style( 'pt-serif', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) { wp_enqueue_style( 'pt-serif-cyr', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext' ); }
		}
	}	
	
}
add_action( 'wp_enqueue_scripts', 'readline_enqueue_google_fonts' ); 	


/*  Dynamic css output
/* ------------------------------------ */
if ( ! function_exists( 'readline_dynamic_css' ) ) {

	function readline_dynamic_css() {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
		
			// rgb values
			$color_1 = get_theme_mod('color-1');
			$color_1_rgb = readline_hex2rgb($color_1);
			
			// start output
			$styles = '';		
			
			// google fonts
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { $styles .= 'body { font-family: "Titillium Web", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'droid-serif' ) { $styles .= 'body { font-family: "Droid Serif", serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' ) { $styles .= 'body { font-family: "Source Sans Pro", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'lato' ) { $styles .= 'body { font-family: "Lato", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'raleway' ) { $styles .= 'body { font-family: "Raleway", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'ubuntu' ) || ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) ) { $styles .= 'body { font-family: "Ubuntu", Arial, sans-serif; }'."\n"; }	
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'roboto' ) || ( get_theme_mod( 'font' ) == 'roboto-cyr' ) ) { $styles .= 'body { font-family: "Roboto", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-condensed' ) || ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) ) { $styles .= 'body { font-family: "Roboto Condensed", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-slab' ) || ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) ) { $styles .= 'body { font-family: "Roboto Slab", Arial, sans-serif; }'."\n"; }			
			if ( ( get_theme_mod( 'font' ) == 'playfair-display' ) || ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) ) { $styles .= 'body { font-family: "Playfair Display", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'open-sans' ) || ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) )	{ $styles .= 'body { font-family: "Open Sans", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'pt-serif' ) || ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) ) { $styles .= 'body { font-family: "PT Serif", serif; }'."\n"; }	
			if ( get_theme_mod( 'font' ) == 'arial' ) { $styles .= 'body { font-family: Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'georgia' ) { $styles .= 'body { font-family: Georgia, serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'verdana' ) { $styles .= 'body { font-family: Verdana, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'tahoma' ) { $styles .= 'body { font-family: Tahoma, sans-serif; }'."\n"; }
			
			// container width
			if ( get_theme_mod('container-width','1200') != '1200' ) {			
				if ( get_theme_mod( 'boxed' ) ) { 
					$styles .= '.boxed #wrapper, .container-inner { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
				else {
					$styles .= '.container-inner { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
			}
			// post container
			if ( get_theme_mod('container-width-post','720') != '720' ) {
				$styles .= '
body.single .container-inner-inner,
.hero-container-inner { max-width: '.esc_attr( get_theme_mod('container-width-post') ).'px; }
				'."\n";
			}
			// page container
			if ( get_theme_mod('container-width-page','720') != '720' ) {
				$styles .= '
body.page .container-inner-inner { max-width: '.esc_attr( get_theme_mod('container-width-page') ).'px; }
				'."\n";
			}
			// primary color
			if ( get_theme_mod('color-1','#b19c5e') != '#b19c5e' ) {
				$styles .= '
::selection { background-color: '.esc_attr( get_theme_mod('color-1') ).'; }
::-moz-selection { background-color: '.esc_attr( get_theme_mod('color-1') ).'; }

a,
.themeform label .required,
.post-title a:hover,
.post-nav li a:hover span,
.post-nav li a:hover i,
.dark .post-nav li a:hover span,
.dark .post-nav li a:hover i,
.widget > h3:after,
.widget_rss ul li a,
.widget_calendar a,
.alx-tabs-nav li.active a,
.alx-tab .tab-item-category a,
.alx-posts .post-item-category a,
.alx-tab li:hover .tab-item-title a,
.alx-tab li:hover .tab-item-comment a,
.alx-posts li:hover .post-item-title a,
.dark .widget_rss ul li a,
.dark .alx-tabs-nav li.active a,
.dark .alx-tab .tab-item-category a,
.dark .alx-posts .post-item-category a,
.dark .alx-tab li:hover .tab-item-title a,
.dark .alx-tab li:hover .tab-item-comment a,
.dark .alx-posts li:hover .post-item-title a,
.comment-tabs li.active a,
.comment-awaiting-moderation,
.child-menu a:hover,
.child-menu .current_page_item > a,
.wp-pagenavi a { color: '.esc_attr( get_theme_mod('color-1') ).'; }

.themeform input[type="button"],
.themeform input[type="reset"],
.themeform input[type="submit"],
.themeform button[type="button"],
.themeform button[type="reset"],
.themeform button[type="submit"],
.post-tags a:hover,
.author-bio .bio-avatar:after,
.widget_calendar caption,
.commentlist li.bypostauthor > .comment-body:after,
.commentlist li.comment-author-admin > .comment-body:after { background-color: '.esc_attr( get_theme_mod('color-1') ).'; }

.alx-tabs-nav li.active a,
.dark .alx-tabs-nav li.active a,
.comment-tabs li.active a,
.wp-pagenavi a:hover,
.wp-pagenavi a:active,
.wp-pagenavi span.current { border-bottom-color: '.esc_attr( get_theme_mod('color-1') ).';  }
				'."\n";
			}
			// header top
			if ( get_theme_mod('color-header-top','') != '' ) {
				$styles .= '
#header-top { background: '.esc_attr( get_theme_mod('color-header-top') ).'; }
.site-title a { color: #fff; }
.site-description { color: rgba(255,255,255,0.65); }
				'."\n";
			}
			// left bar
			if ( get_theme_mod('color-left-bar','') != '' ) {
				$styles .= '
.s2,
.search-expand { background: '.esc_attr( get_theme_mod('color-left-bar') ).'; }
.s2 .social-links li:before { background: rgba(255,255,255,0.2); }
.s2 .social-links .social-tooltip { color: rgba(255,255,255,0.7); }
.s2 .social-links .social-tooltip:hover,
.s2 .social-links .social-tooltip:active { color: #fff; }
@media only screen and (min-width: 480px) {
	.toggle-search { color: rgba(255,255,255,0.7); border-bottom: 1px solid rgba(255,255,255,0.2); }
	.toggle-search:hover,
	.toggle-search.active { color: #fff; }
}

				'."\n";
			}
			// footer menu
			if ( get_theme_mod('color-footer-menu','') != '' ) {
				$styles .= '
#footer .nav-menu:not(.mobile),
#footer .nav-menu.mobile,
#footer-bottom #back-to-top { background: '.esc_attr( get_theme_mod('color-footer-menu') ).'; }
				'."\n";
			}
			// footer bottom
			if ( get_theme_mod('color-footer-bottom','') != '' ) {
				$styles .= '
#footer-bottom { background: '.esc_attr( get_theme_mod('color-footer-bottom') ).'; }
				'."\n";
			}
			// post hover
			if ( get_theme_mod('color-post-hover','') != '' ) {
				$styles .= '
.post-featured:hover .post-inner-inner,
.post-card:hover .post-inner,
.related-posts li:hover .post { background: '.esc_attr( get_theme_mod('color-post-hover') ).'; }
.post-hover:hover .post-thumbnail:after { border-color: '.esc_attr( get_theme_mod('color-post-hover') ).' transparent; }
@media only screen and (min-width: 1281px) {
	.post-card:hover .post-thumbnail:after { border-color: transparent '.esc_attr( get_theme_mod('color-post-hover') ).'!important; }
}
.post-hover:hover .entry.excerpt { color: rgba(255,255,255,0.6); }
				'."\n";
			}
			// page title
			if ( get_theme_mod('color-page-title','') != '' ) {
				$styles .= '
.page-title { background: '.esc_attr( get_theme_mod('color-page-title') ).'; border-bottom: 0; }
.page-title:before { display: none; }
.page-title:after { border-color: '.esc_attr( get_theme_mod('color-page-title') ).' transparent; }
.page-title h1, 
.page-title h2, 
.page-title h4 { color: #fff; }
.page-title span { color: rgba(255,255,255,0.65); }
				'."\n";
			}
			// comment count
			if ( get_theme_mod('color-comment-count','') != '' ) {
				$styles .= '
.post-comments { background: '.esc_attr( get_theme_mod('color-comment-count') ).'; }
				'."\n";
			}
			// carousel next/prev
			if ( get_theme_mod('color-carousel','') != '' ) {
				$styles .= '
#owl-featured .owl-buttons div { background: '.esc_attr( get_theme_mod('color-carousel') ).'; }
				'."\n";
			}
			// body
			if ( get_theme_mod('color-body','') != '' ) {
				$styles .= '
body { background: '.esc_attr( get_theme_mod('color-body') ).'; }
				'."\n";
			}
			// header logo max-height
			if ( get_theme_mod('logo-max-height','60') != '60' ) {
				$styles .= '.site-title a img { max-height: '.esc_attr( get_theme_mod('logo-max-height') ).'px; }'."\n";
			}
			// header text color
			if ( get_theme_mod( 'header_textcolor' ) != '' ) {
				$styles .= '.site-title a, .site-description { color: #'.esc_attr( get_theme_mod( 'header_textcolor' ) ).'; }'."\n";
			}
			wp_add_inline_style( 'readline-style', $styles );	
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'readline_dynamic_css' );
