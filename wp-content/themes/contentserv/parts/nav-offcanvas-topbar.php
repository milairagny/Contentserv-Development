<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<section class="header-container" data-equalizer>
<div class="container grid-x">
	<div class="logo-container large-5 columns" data-equalizer-watch>
		<?php// if (get_field("cslogo") != "" ) { echo "Test"; } else { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
		<?php // } ?>
	</div>
	<div class="menu-container large-7 columns" data-equalizer-watch>
          <?php //
          if ( has_nav_menu( 'main-nav' ) ) {
               wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'primary-menu') );
          } 
          ?> 
	</div>
</div>
</section>