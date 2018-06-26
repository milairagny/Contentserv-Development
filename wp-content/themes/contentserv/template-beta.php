<?php
/*
Template Name: Page Modules
*/

get_header();
?>

<div class="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'parts/section', 'modules' ); ?>
		<?php endwhile; endif; ?>
	<!-- end #content -->

	<?php get_footer(); ?>