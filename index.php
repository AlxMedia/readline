<?php get_header(); ?>

<div class="content">
	<div class="container-inner">
	
	<?php get_template_part('inc/front-widgets-top'); ?>
			
	<?php if ( have_posts() ) : ?>
		
		<div class="post-card-wrap">
		<?php while ( have_posts() ): the_post(); ?>
			<?php get_template_part('content'); ?>
		<?php endwhile; ?>
		</div>
		
		<?php get_template_part('inc/front-widgets-bottom'); ?>
		<?php get_template_part('inc/pagination'); ?>
		
	<?php endif; ?>
	
	</div><!--/.container-inner-->
</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>