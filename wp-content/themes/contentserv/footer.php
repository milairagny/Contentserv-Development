<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>

<section class="footer-section">
	<div class="container grid-x grid-margin-x">
		<div class="footer-logo-container large-12 cell">
			<img src="<?php the_value("add_logo", "options"); ?>">
		</div>
	</div>
	<div class="container grid-x grid-margin-x">
	<?php if(get_value('customize_footer_column', 'options') == 'two-column') { ?>
	<?php while( have_groups( 'two_column_grid', 'options' ) ): the_group() ?>
	<div class="large-6 cell">
		<span><?php the_sub_value( 'column_add_title', 'options' ) ?></span>
		<?php $post_objects = get_sub_value('two_select_page', 'options');
		if( $post_objects ): ?>
			<ul class="news-event-container">
			<?php foreach( $post_objects as $post_object): ?>
				<li><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></li>
		<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php endwhile ?>
	<?php } elseif(get_value('customize_footer_column', 'options') == 'three-column') { ?>
	<?php while( have_groups( 'three_column_grid', 'options' ) ): the_group() ?>
	<div class="large-4 cell">
		<span><?php the_sub_value( 'column_add_title', 'options' ) ?></span>
		<?php $post_objects = get_sub_value('two_select_page', 'options');
		if( $post_objects ): ?>
			<ul class="news-event-container">
			<?php foreach( $post_objects as $post_object): ?>
				<li><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></li>
		<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php endwhile ?>
	<?php } else { ?>
	<?php while( have_groups( 'four_column_grid', 'options' ) ): the_group() ?>
	<div class="large-3 cell">
		<span><?php the_sub_value( 'column_add_title', 'options' ) ?></span>
		<?php $post_objects = get_sub_value('four_select_page', 'options');
		if( $post_objects ): ?>
			<ul class="news-event-container">
			<?php foreach( $post_objects as $post_object): ?>
				<li><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></li>
		<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php endwhile ?>
	<?php } ?>

	</div>
	<div class="newsletter-container container grid-x grid-margin-x" data-equalizer>
		<div class="large-3 cell" data-equalizer-watch>
			<div class="footer-content-handler">
				<span>Subscribe to our Newsletter</span>
			</div>
		</div>
		<div class="large-6 cell" data-equalizer-watch>
			<form>
				<input type="text" placeholder="Business Email">
				<input type="button" value="Subscribe">
			</form>
		</div>
		<div class="large-3 cell" data-equalizer-watch>
			<div class="footer-content-handler">
				<input type="checkbox" class="newsletter-check">
			</div>
		</div>
	</div>
		<div class="copyright-container container grid-x grid-margin-x">
			<div class="large-3 cell">
				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php if (get_value("custom_copyright_text", "options") != "") { echo get_value("custom_copyright_text", "options"); ?><?php } else { bloginfo('name'); } ?>.</p>
			</div>
			<div class="large-9 cell">
				<?php joints_footer_links(); ?>
			</div>
		</div>
	
</section>
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->