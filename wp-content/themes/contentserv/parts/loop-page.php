<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<?php if( get_value( 'add_banner_section' ) ): ?>
<section class="home-banner" data-equalizer>
	<div class="container grid-x">
		<div class="content-handler large-6" data-equalizer-watch>
			<div class="banner-content-container">
			<span><?php the_value("add_title"); ?></span>
			<?php the_value("add_banner_description"); ?>
			</div>
		</div>
		<div class="large-6" data-equalizer-watch><img src="<?php the_value("add_right_image"); ?>"></div>
	</div>
</section>
<?php endif; ?>

<?php // if (get_value("news_and_event") != "") { ?>
<section class="news-about">
	<div class="container grid-x">
		<div class="large-6">
		<h3 class="latest-blog">News & Events</h3>
<?php if (get_value("featured_news_and_events") != "") { ?>
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
			<h4><?php the_value("first_title"); ?></h4>
			<?php the_value("about_us_descriptions"); ?>
			<a href="<?php echo get_permalink($blogid); ?>" class="more-news">More About Us</a>			
		</div>
	</div>
</section>
<?php // } ?>




<?php /*
<section class="company-partners">
	<div class="container grid-x">
		<div class="large-6">
			<?php while( have_groups( 'add_company_partner_logo' ) ): the_group() ?>
				<div class="person">
					<span><?php the_sub_value( 'partner_add_logo' ) ?></span>
				</div>
			<?php endwhile ?>
		</div>
	</div>
</section>
<?php */ ?>

<?php /* <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->
					
    <section class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 <?php wp_link_pages(); ?>
	</footer> <!-- end article footer -->
						    
	<?php comments_template(); ?>
					
</article> <!-- end article --> */ ?>