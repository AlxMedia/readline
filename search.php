<?php get_header(); ?>

<div class="content">
	<div class="container-inner">
	
		<div class="notebox">
			<?php esc_html_e('For the term','readline'); ?> "<span><?php echo get_search_query(); ?></span>".
			<?php if ( !have_posts() ): ?>
				<?php esc_html_e('Please try another search:','readline'); ?>
			<?php endif; ?>
			<div class="search-again">
				<?php get_search_form(); ?>
			</div>
		</div>
		
		<?php if ( have_posts() ) : ?>
			
			<div class="post-card-wrap">
			<?php while ( have_posts() ): the_post(); ?>
				<?php get_template_part('content'); ?>
			<?php endwhile; ?>
			</div>
			
			<?php get_template_part('inc/pagination'); ?>
			
		<?php endif; ?>
		
	</div><!--/.container-inner-->
</div><!--/.content-->

<?php get_sidebar(); ?>
	
<?php get_footer(); ?>