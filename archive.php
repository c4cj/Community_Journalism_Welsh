<?php get_header(); ?>
			<p><?php include ("includes/logo.inc.php"); ?></p>
			<?php include ("includes/navi-social.inc.php"); ?>
		</div>
	</div>
	
	<nav>
		<div id="navi-cats" class="clear hide">
			<div class="wrap">
				<ul>
					<li><a href="<?php echo  get_site_url(); ?>/newyddion-diweddaraf/"><?php _e("Latest", 'storini'); ?></a></li>
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->
		<div id="navi-global" class="clear cat-title">
			<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
			<header class="clear hide">
				<div class="wrap">
			    <h3><?php printf(_c('%s'), get_the_time(__('F Y', 'storini'))); ?></h3>
			    <?php } ?>
				</div>
			</header>
			<?php include ("includes/navi-global.inc.php"); ?>
	</nav>
	
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
			<p class="no-results"><?php _e("Sorry, there are currently no headlines in this area.", 'storini'); ?></p>
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