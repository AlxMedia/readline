<article id="post-<?php the_ID(); ?>" <?php post_class('group post-featured post-hover'); ?>>	
	<div class="post-inner">
	
		<div class="post-thumbnail">
			
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ): ?>
					<div class="post-thumbnail-image" style="background-image:url('<?php the_post_thumbnail_url('readline-square'); ?>');"></div>
				<?php else: ?>
					<div class="post-thumbnail-image"></div>
				<?php endif; ?>
				<div class="post-category"><?php the_category(' / '); ?></div>
				<div class="post-author-image">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), '64' ); ?>
					</a>
				</div>
				<?php if ( has_post_format('video') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fas fa-play"></i></span>'; ?>
				<?php if ( has_post_format('audio') && !is_sticky() ) echo'<span class="thumb-icon"><i class="fas fa-volume-up"></i></span>'; ?>
				<?php if ( is_sticky() ) echo'<span class="thumb-icon"><i class="fas fa-star"></i></span>'; ?>
			</a>
			
			<?php if ( comments_open() && ( get_theme_mod( 'comment-count','on' ) == 'on' ) ): ?>
				<a class="post-comments" href="<?php comments_link(); ?>"><span><i class="fas fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></span></a>
			<?php endif; ?>
			
		</div><!--/.post-thumbnail-->

		<div class="post-inner-inner">

			<h2 class="post-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2><!--/.post-title-->
			
			<div class="post-date">
				<i class="far fa-clock"></i><?php the_time( get_option('date_format') ); ?>
			</div>
			
		</div><!--/.post-inner-inner-->
		
	</div><!--/.post-inner-->
</article><!--/.post-->	