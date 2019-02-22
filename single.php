<?php get_header(); ?>

<div class="content">

	<div class="hero" style="background-image:url('<?php the_post_thumbnail_url('readline-huge'); ?>');">
		<div class="hero-container-inner">
			<header class="hero-inner">
				<div class="hero-inner-inner">
				<div class="hero-category"><?php the_category(' / '); ?></div>
				<h1 class="hero-title"><?php the_title(); ?></h1>
				<div class="hero-byline group">
					<div class="hero-author-image"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
					<div class="hero-author"><?php esc_html_e('by','readline'); ?> <?php the_author_posts_link(); ?></div>
					<div class="hero-date"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></div>
				</div>
				</div>
			</header>
		</div>
	</div>

	<div class="container-inner-inner">

		<?php while ( have_posts() ): the_post(); ?>
			<article <?php post_class('post-single'); ?>>	
				
				<?php do_action( 'alx_ext_sharrre' ); ?>
				
				<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>

				<div class="clear"></div>
				
				<div class="entry">	
					<?php the_content(); ?>
					<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','readline'),'after'=>'</div>')); ?>
					<div class="clear"></div>
					<?php do_action( 'alx_ext_sharrre_footer' ); ?>
					<div class="clear"></div>
				</div><!--/.entry-->
				
			</article><!--/.post-->				
		<?php endwhile; ?>
		
		<div class="clear"></div>
		
		<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','readline').'</span> ','','</p>'); ?>
			
		<div class="clear"></div>
		
		<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
			<div class="author-bio">
				<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
				<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
				<p class="bio-desc"><?php the_author_meta('description'); ?></p>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'post-nav', 's1' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>
		
		<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>
		
		<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
		
	</div><!--/.container-inner-inner-->
	
</div><!--/.content-->
<?php get_sidebar(); ?>

<?php get_footer(); ?>