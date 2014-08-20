<?php get_header(); ?>
			<p><?php include ("includes/logo.inc.php"); ?></p>
			<?php include ("includes/navi-social.inc.php"); ?>
		</div>
	</div>

	<nav>
		<div id="navi-cats" class="clear hide">
			<div class="wrap">
				<ul>
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->

		<?php if (is_category()) { $this_category = get_category($cat); } ?>
		<?php
		if($this_category->category_parent)
		$this_category = wp_list_categories('orderby=count&order=DESC&hide_empty=1&show_option_none=&title_li=&child_of='.$this_category->category_parent."&echo=0"); else
		$this_category = wp_list_categories('orderby=count&order=DESC&hide_empty=1&show_option_none=&title_li=&child_of='.$this_category->cat_ID."&echo=0");
		if ($this_category) { ?>
		<div id="navi-sub-cats" class="clear theme-bg">
			<div class="wrap">
				<ul>
					<?php
					foreach((get_the_category()) as $childcat) {
						$parentcat = $childcat->category_parent;
					}
					?>
					<?php echo $this_category; ?>
				</ul>
			</div>
		</div>
		<div id="navi-global" class="clear cat-title">
			<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
			<header class="clear hide">
				<div class="wrap">
					<?php if (is_category()) { ?>
						<h3><?php printf(__('%s', 'storini'), single_cat_title('', false)); ?></h3>
			    	<?php } elseif( is_tag() ) { ?><h3><?php printf(__('%s', 'storini'), single_tag_title('', false) ); ?></h3>
			    	<?php } elseif (is_month()) { ?><h3><?php printf(_c('%s'), get_the_time(__('F Y', 'storini'))); ?></h3>
			    <?php } ?>
				</div>
			</header>
			<?php include ("includes/navi-global.inc.php"); ?>
		</div>
		<!--/navi-global-->

		<?php } else { ?>

		<div id="navi-global" class="clear archive-title">
			<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
			<header class="clear theme-bg hide">
				<div class="wrap">
					<h2><br /></h2>
					<?php if (is_category()) { ?>
						<h3><?php printf(__('%s', 'storini'), single_cat_title('', false)); ?></h3>
			    	<?php } elseif( is_tag() ) { ?><h3><?php printf(__('%s', 'storini'), single_tag_title('', false) ); ?></h3>
			    	<?php } elseif (is_month()) { ?><h3><?php printf(_c('%s'), get_the_time(__('F Y', 'storini'))); ?></h3>
			    <?php } ?>
				</div>
			</header>
			<?php include ("includes/navi-global.inc.php"); ?>

		<?php } ?>
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
