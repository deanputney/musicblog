<?php
/**
 * Home Template
 *
 * A custom home page template.
 *
 * @package Hatch
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>
	
	<?php do_atomic( 'before_masthead' ); // hatch_before_masthead ?>
	
	<div id="masthead">
		
		<?php if ( have_posts() ) : ?>
		
			<?php $counter = 0; ?>
	
			<?php while ( have_posts() ) : the_post(); ?>
								
				<?php do_atomic( 'before_entry' ); // hatch_before_entry ?>
			
				<div id="post-<?php the_ID(); ?>" class="post">
			
					<?php do_atomic( 'open_entry' ); // hatch_open_entry ?>
					
					<div class="post-content">
						
						<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'single-thumbnail', 'link_to_post' => false, 'image_class' => 'featured', 'width' => 350, 'height' => 350, 'default_image' => get_template_directory_uri() . '/images/single_image_placeholder.png' ) ); ?>
			
						<div class="entry">
							<div class="entry-content">
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'hatch' ) ); ?>
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'hatch' ), 'after' => '</p>' ) ); ?>
								
							</div><!-- .entry-content -->			
							
							<div class="post-aside">								
															
								<?php echo apply_atomic_shortcode( 'byline_date', '<div class="byline byline-date">' . __( '[entry-published before="Date: "]', 'hatch' ) . '</div>' ); ?>
								
								<?php echo apply_atomic_shortcode( 'byline_author', '<div class="byline byline-author">' . __( '[entry-author before="Poster: "]', 'hatch' ) . '</div>' ); ?>
								
								<?php echo apply_atomic_shortcode( 'byline_category', '<div class="byline byline-ategory">' . __( 'Category: [entry-terms taxonomy="category"]', 'hatch' ) . '</div>' ); ?>
								
								<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="post_tag" before="Tags: "]', 'hatch' ) . '</div>' ); ?>
														
								<?php echo apply_atomic_shortcode( 'byline_edit', '<div class="byline byline-edit">' . __( '[entry-edit-link]', 'hatch' ) . '</div>' ); ?>
								
								<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
								
							</div>
						</div>
			
						<?php do_atomic( 'close_entry' ); // hatch_close_entry ?>
					
					</div><!-- .post-content -->
			
				</div><!-- .hentry -->
			
				<?php do_atomic( 'after_entry' ); // hatch_after_entry ?>
				
				<?php break; ?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
		
	</div>

	<?php do_atomic( 'before_content' ); // hatch_before_content ?>	

	<div id="content">

		<?php do_atomic( 'open_content' ); // hatch_open_content ?>

		<div class="hfeed">
			
			<?php if ( have_posts() ) : ?>
			
				<?php $counter = 1; ?>

				<?php while ( have_posts() ) : the_post(); ?>

						<?php do_atomic( 'before_entry' ); // hatch_before_entry ?>
					
						<?php if ( ( $counter % 4 ) == 0 ) { ?>

							<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?> last">
							
						<?php } else { ?>
						
							<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
						
						<?php } ?>													
	
								<?php do_atomic( 'open_entry' ); // hatch_open_entry ?>
	
								<?php if ( current_theme_supports( 'get-the-image' ) ) {
										
									get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'single-thumbnail', 'link_to_post' => false, 'image_class' => 'featured', 'width' => 220, 'height' => 220, 'default_image' => get_template_directory_uri() . '/images/single_image_placeholder.png' ) );
										
								} ?>					
								
								<?php echo get_avatar(get_the_author_meta('ID')); ?>
										
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>						
	
								<?php do_atomic( 'close_entry' ); // hatch_close_entry ?>							
	
							</div><!-- .hentry -->

						<?php do_atomic( 'after_entry' ); // hatch_after_entry ?>
										
					<?php $counter++; ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // hatch_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // hatch_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>