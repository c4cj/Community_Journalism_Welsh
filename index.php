<?php
	/* Template Name: Latest news
	*/
?>

<?php get_header(); ?>
			<p><?php include ("includes/logo.inc.php"); ?></p>
			<?php include ("includes/navi-social.inc.php"); ?>
		</div>
	</div>

	<nav class="hide">
		<div id="navi-cats" class="clear">
			<div class="wrap">
				<ul>
					<li><a href="<?php echo  get_site_url(); ?>/newyddion-diweddaraf/" class="active"><?php _e("Latest", 'storini'); ?></a></li>
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->
	</nav>

	<div id="navi-global" class="clear archive-title">
		<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
		<header class="clear theme-bg">
			<div class="wrap">
				<h2><?php _e("News", 'storini'); ?> <?php _e("Local", 'storini'); ?><?php if(get_field('location', 'option')): ?> <?php the_field('location', 'option'); ?><?php endif; ?> </h2>
				<h3><?php _e("Latest headlines", 'storini'); ?></h3>
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