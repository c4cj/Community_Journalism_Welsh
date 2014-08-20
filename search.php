<?php get_header(); ?>
			<p><?php include ("includes/logo.inc.php"); ?></p>
			<?php include ("includes/navi-social.inc.php"); ?>
		</div>
	</div>
	
	<nav class="hide">
		<div id="navi-cats" class="clear">
			<div class="wrap">
				<ul>
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->
	</nav>
	
	<div id="navi-global" class="clear cat-title">
		<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
		<header class="clear">
			<div class="wrap">
				<h2><?php _e("Search results for:", 'storini'); ?></h2>
				<h3><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; echo $key; ?></h3>
			</div>
		</header>
		<?php include ("includes/navi-global.inc.php"); ?>
	
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
			
			<div class="clear">
				<?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
			</div>
			
			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php endwhile; ?>
			<?php else : ?>
			<p class="no-results"><?php _e("Sorry, we can't find anything that matches that search.", 'storini'); ?></p>
			<?php endif; ?>
			
		</div>
	</section>
	<!--/tiles-->
	
	<?php include ("includes/footer.inc.php"); ?>

</div>
<!--/container-->

<?php include ("includes/navi-mobile.inc.php"); ?>

<?php include ("includes/js.inc.php"); ?>

<!--JS only needed for this page-->

<!--/-->

<?php get_footer(); ?>