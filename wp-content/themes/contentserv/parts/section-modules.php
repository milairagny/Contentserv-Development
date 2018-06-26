<?php $i = 0; ?>
<?php while( have_groups( 'all_modules' ) ): the_group() ?>
<?php $i++; ?>

<?php // START News, Events & About ?>
<?php if(get_sub_value( 'add_news_events_and_about_section' ) != "") { ?>
<section class="news-about">
	<div class="container grid-x">
		<div class="large-6">
		<h3 class="latest-blog">News & Events</h3>
<?php if (get_sub_value("featured_news_and_events") != "") { ?>
	<?php $post_objects = get_value("cs_select_post");
	if( $post_objects ): ?>
		<?php foreach( $post_objects as $post_object): ?>
			<div class="news-event-container">
				<h4 class="blog-title"><a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></h4>
				<?php the_excerpt($post_object->ID); ?>
			</div>
	<?php endforeach; ?>
	<?php endif; ?>
<?php } else { ?>
<?php
$args = array(
		'post_type' => 'post',
		'category_name' => 'News and Events',
		'orderby'=>'date',
		'order '=>'ASC',
		'posts_per_page' => '2'
	);
?>
			<?php
			$the_query = new WP_Query( $args );
			$count = $the_query->found_posts;
			if ($count == 0) {$nodata= "no-data";}
			?>
				<?php $blogid = get_option( 'page_for_posts' ); ?>
				<?php
				if ( $the_query->have_posts() ) :
					?>
						<?php
						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="news-event-container">
							<h4 class="blog-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php the_excerpt(); ?>
						</div>
					<?php endwhile; ?>
				<a href="<?php echo get_permalink($blogid); ?>" class="more-news">More News</a>
				<?php endif; wp_reset_postdata(); ?>
<?php } ?>
		</div>
		<div class="large-6 about-us-section">
			<h3>About Contentserv</h3>
			<h4><?php the_sub_value("first_title"); ?></h4>
			<?php the_sub_value("about_us_descriptions"); ?>
			<a href="<?php echo get_permalink($blogid); ?>" class="more-news">More About Us</a>			
		</div>
	</div>
</section>
<?php } // END News, Events & About Section ?>

<?php 
// START Featured Page Section
if(get_sub_value( 'add_featured_page' ) != "") { ?>
<section class="featured-page">
	
<div class="container grid-x grid-margin-x">
<div class="highlight-content large-offset-2 large-8 cell">
	<?php the_sub_value('cs_content_description'); ?>
</div>
<?php while( have_groups( 'add_featured_page' ) ): the_group() ?>
<div class="large-4 cell">
	<?php $post_object = get_sub_value( 'cs_add_page' ); ?>
    <h4><a href="<?php echo get_permalink($post_object->ID); ?>">
	<?php if (get_sub_value('cs_custom_title') != "") { echo get_sub_value('cs_custom_title'); } else { echo get_the_title($post_object->ID); } ?>
	</a></h4>
	<?php echo get_sub_value( 'custom_description' ); ?>
	<a href="<?php echo get_permalink($post_object->ID); ?>" class="more-info">More Info</a>
</div>
<?php endwhile ?>
</div>
	
</section>

<?php }
// END Featured Page Section
?>

<?php
// START Banner Section
if(get_sub_value( 'add_banner_section_module' ) != "") { ?>
<?php if(get_sub_value( 'banner_content_position' ) == "banner_content_left") { ?>
<?php if(get_sub_value( 'static_add_background_image' ) != "") { ?>
<style>
	section.home-banner.bg-<?php echo $i; ?> {
		background: url('<?php the_sub_value( 'static_add_background_image' ); ?>');
		background-repeat:  no-repeat;
		background-size:  cover;
	}
	section.home-banner .content-height-<?php echo $i; ?> {
		min-height: <?php the_sub_value( 'static_set_background_image_height' ); ?>px;
	}
</style>
<?php } ?>
<section class="home-banner bg-<?php echo $i; ?>" data-equalizer>
	<div class="container grid-x grid-margin-x">
		<div class="content-handler large-6 cell" data-equalizer-watch>
			<div class="banner-content-container">
			<span><?php the_sub_value("add_title"); ?></span>
			<?php the_sub_value( 'banner_static_content' ); ?>
			<a class="hero-link" href="<?php the_sub_value( 'learn_more_link' ); ?>">Learn More</a>
			<a class="hero-link" href="<?php the_sub_value( 'download_report_link' ); ?>">Download Report</a>
			</div>
		</div>
		<div class="static-image-handler large-6 content-height-<?php echo $i; ?> cell" data-equalizer-watch>
			<div class="static-image-container">
			<img src="<?php the_sub_value("static_add_image"); ?>">
			</div>
		</div>
	</div>
</section>
<?php } elseif(get_sub_value( 'banner_content_position' ) == "banner_content_center") { ?>
<?php if(get_sub_value( 'static_add_background_image' ) != "") { ?>
<style>
	section.home-banner.bg-<?php echo $i; ?> {
		background: url('<?php the_sub_value( 'static_add_background_image' ); ?>');
		background-repeat:  no-repeat;
		background-size:  cover;
	}
	section.home-banner .content-height-<?php echo $i; ?> {
		min-height: <?php the_sub_value( 'static_set_background_image_height' ); ?>px;
	}
</style>
<?php } ?>
<section class="home-banner bg-<?php echo $i; ?>" data-equalizer>
	<div class="container grid-x grid-margin-x">
		<div class="content-handler large-3 cell" data-equalizer-watch> </div>
		<div class="content-handler large-6 content-height-<?php echo $i; ?> cell" data-equalizer-watch>
			<div class="banner-content-container">
			<span><?php the_sub_value("add_title"); ?></span>
			<?php the_sub_value( 'banner_static_content' ); ?>
			<a class="hero-link" href="<?php the_sub_value( 'learn_more_link' ); ?>">Learn More</a>
			<a class="hero-link" href="<?php the_sub_value( 'download_report_link' ); ?>">Download Report</a>
			</div>
		</div>
		<div class="large-3 cell" data-equalizer-watch><img src="<?php the_sub_value("static_add_image"); ?>"></div>
	</div>
</section>
<?php } elseif(get_sub_value( 'banner_content_position' ) == "banner_content_right") { ?>
<?php if(get_sub_value( 'static_add_background_image' ) != "") { ?>
<style>
	section.home-banner.bg-<?php echo $i; ?> {
		background: url('<?php the_sub_value( 'static_add_background_image' ); ?>');
		background-repeat:  no-repeat;
		background-size:  cover;
	}
	section.home-banner .content-height-<?php echo $i; ?> {
		min-height: <?php the_sub_value( 'static_set_background_image_height' ); ?>px;
	}
</style>
<?php } ?>
<section class="home-banner bg-<?php echo $i; ?>" data-equalizer>
	<div class="container grid-x grid-margin-x">
		<div class="large-6 cell" data-equalizer-watch><img src="<?php the_sub_value("static_add_image"); ?>"></div>
		<div class="content-handler large-6 content-height-<?php echo $i; ?> cell" data-equalizer-watch>
			<div class="banner-content-container">
			<span><?php the_sub_value("add_title"); ?></span>
			<?php the_sub_value( 'banner_static_content' ); ?>
			<a class="hero-link" href="<?php the_sub_value( 'learn_more_link' ); ?>">Learn More</a>
			<a class="hero-link" href="<?php the_sub_value( 'download_report_link' ); ?>">Download Report</a>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php } // END Banner Section ?>

<?php endwhile ?>