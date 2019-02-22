<?php get_header(); ?>

<div class="content">
	<div class="container-inner">
	
		<?php if ( ! is_paged() ) : ?>
			<?php the_archive_description( '<div class="notebox">', '</div>' ); ?>
		<?php endif; ?>
		
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