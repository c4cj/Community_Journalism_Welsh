<?php
	/* Template Name: Home page
	*/
?>

<?php get_header(); ?>
			<h1><?php include ("includes/logo.inc.php"); ?></h1>
			<?php include ("includes/navi-social.inc.php"); ?>
		</div>
	</div>

	<nav class="hide">
		<div id="navi-cats" class="clear">
			<div class="wrap">
				<ul>
					<li><a href="<?php echo  get_site_url(); ?>/newyddion-diweddaraf/"><?php _e("Latest", 'storini'); ?></a></li>
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->
		<div id="navi-sub-cats" class="clear theme-bg">
			<div class="wrap">
				<ul>
					<li><a href="<?php echo  get_site_url(); ?>" class="active"><?php _e("Home", 'storini'); ?></a></li>
					<?php if( get_field('integrate_storini', 'option') ) { ?>
						<li><a href="<?php echo  get_site_url(); ?>/become-a-reporter/"><?php _e("Become a local reporter", 'storini'); ?></a></li>
						<li><a href="<?php echo  get_site_url(); ?>/submit/"><?php _e("Submit your news", 'storini'); ?></a></li>
					<?php } ?>
					
				</ul>
			</div>
		</div>
		<!--/navi-storini-->
	</nav>

	<?php query_posts(array('category_name' => 'lead-story')); ?>
	<?php if(have_posts()): ?>
	<section id="headlines" class="clear">
		<div class="flexslider wrap">
			<ul class="slides">
				<?php while(have_posts()): the_post(); ?>
				<li>
					<span class="mobile"><a href="<?php the_permalink(); ?>"><?php if(has_post_format('gallery')) { ?><?php $image = array(); if(get_field('gallery_images')): while(the_repeater_field('gallery_images')): $attachment_id = get_sub_field('image'); $size = "home"; $image[ ] = wp_get_attachment_image_src( $attachment_id, $size ); endwhile; ?><img src="<?php echo $image[0][0]; ?>" alt="<?php the_field('alt'); ?>" /><?php else: ?><img src="<?php bloginfo('template_url'); ?>/images/465x320-home.gif" alt="" /><?php endif; ?><?php } else { ?><?php if(get_field('image')) { ?><?php $image = wp_get_attachment_image_src(get_field('image'), 'home'); ?><img src="<?php echo $image[0]; ?>" alt="<?php the_field('alt'); ?>" /><?php } else { ?><img src="<?php bloginfo('template_url'); ?>/images/465x320-home.gif" alt="" /><?php } ?><?php } ?></a></span>
					<p class="date"><?php the_time('j F Y'); ?></p>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<span class="hide"><a href="<?php the_permalink(); ?>"><?php if(has_post_format('gallery')) { ?><?php $image = array(); if(get_field('gallery_images')): while(the_repeater_field('gallery_images')): $attachment_id = get_sub_field('image'); $size = "home"; $image[ ] = wp_get_attachment_image_src( $attachment_id, $size ); endwhile; ?><img src="<?php echo $image[0][0]; ?>" alt="<?php the_field('alt'); ?>" /><?php else: ?><img src="<?php bloginfo('template_url'); ?>/images/465x320-home.gif" alt="" /><?php endif; ?><?php } else { ?><?php if(get_field('image')) { ?><?php $image = wp_get_attachment_image_src(get_field('image'), 'home'); ?><img src="<?php echo $image[0]; ?>" alt="<?php the_field('alt'); ?>" /><?php } else { ?><img src="<?php bloginfo('template_url'); ?>/images/465x320-home.gif" alt="" /><?php } ?><?php } ?></a></span>
						<p class="desc"><?php echo excerpt(240); ?> <span class="clear read-more"><a href="<?php the_permalink(); ?>"><?php _e("Read more", 'storini'); ?></a></span></p>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</section>
	<!--/headlines-->
	<?php endif; ?>

	<?php if(have_posts()): ?>
	<?php else: ?>
	<div class="clear no-posts">
		<div class="wrap">
			<p class="no-results"><?php $url = "/wp-admin/post-new.php"; $link = sprintf( __( "There are no posts! Ready to publish your first post? <a href='%s'>Get started here</a>", 'storini'), esc_url( $url ) ); echo $link; ?></p>
		</div>
	</div>
	<?php endif; ?>

	<div id="navi-global" class="clear single-title home-navi">
		<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
		<header class="clear theme-bg">
			<h2 class="wrap">
				<?php if(get_field('location', 'option')): ?>
					<?php printf( __("More latest news in %s", 'storini'), get_field('location', 'option') ); ?>
				<?php else: ?>
					<?php _e("More latest news", 'storini'); ?>
				<?php endif; ?>
			</h2>
		</header>
		<?php include ("includes/navi-global.inc.php"); ?>

	<?php if( get_field('advertising', 'option') ) { ?><?php query_posts('showposts=7'); ?><?php } else { ?><?php query_posts('showposts=9'); ?><?php } ?>

	<?php if(have_posts()): ?>
	<section id="tiles" class="clear">
		<div class="wrap">

			<?php if( get_field('advertising', 'option') ) { ?>
			<div class="ads tile">
				<?php include ("includes/ad-one.inc.php"); ?>
				<?php include ("includes/ad-two.inc.php"); ?>
			</div>
			<?php } else { ?>
			<?php } ?>

			<?php get_template_part( 'loop', 'single' ); ?>

			<?php if( get_field('twitter', 'option') ) { ?>
			<div class="tweet tile">
				<div class="tweet-feed"></div><!--/twitter feed-->
				<a href="https://twitter.com/<?php the_field('twitter', 'option'); ?>" class="twitter-follow-button" data-show-count="false" data-size="large"><?php _e("Follow", 'storini'); ?> @<?php the_field('twitter', 'option'); ?></a>
			</div>
			<?php } else { ?>
			<?php } ?>

			<!-- <footer class="clear view-all"><span><a href="<?php echo  get_site_url(); ?>/latest-news/"><?php _e("View all headlines", 'storini'); ?></a></span></footer> -->

		</div>
	</section>
	<!--/tiles-->
	<?php endif; ?>

	<?php include ("includes/footer.inc.php"); ?>

</div>
<!--/container-->

<?php include ("includes/navi-mobile.inc.php"); ?>

<?php include ("includes/js.inc.php"); ?>

<!--JS only needed for this page-->

<?php if( get_field('twitter', 'option') ) { ?><script src="<?php bloginfo('template_url'); ?>/js/jquery.tweet.js"></script><?php } else { ?><?php } ?>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<script>
<?php if( get_field('twitter', 'option') ) { ?>
// TWEET FEED
$(".tweet-feed").tweet({
	modpath: '<?php bloginfo('template_url'); ?>/twitter/',
	username: "<?php the_field('twitter', 'option'); ?>",
	avatar_size: 0,
	count: 1
});
<?php } else { ?>
<?php } ?>

// FLEXSLIDER
$('.flexslider').flexslider({
	animation: "slide",
	easing: "swing",
	slideshowSpeed: 10000,
	animationSpeed: 1000,
  smoothHeight: false,
  pauseOnHover: false,
	controlNav: true,
	directionNav: true,
	prevText: "&lt;&nbsp;&nbsp;<?php _e('Previous headline', 'storini') ?>",
	nextText: "<?php _e('Next headline', 'storini') ?>&nbsp;&nbsp;&gt;",
	slideshow: true,
	keyboard: true,
	touch: true
});
</script>

<?php if( get_field('twitter', 'option') ) { ?><script src="http://platform.twitter.com/widgets.js"></script><?php } else { ?><?php } ?>

<!--/-->

<?php get_footer(); ?>
