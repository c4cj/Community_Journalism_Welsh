<?php get_header(); ?>
			<p><?php include ("includes/logo.inc.php"); ?></p>
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
	</nav>
	
	<div id="navi-global" class="clear archive-title">
			<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
			<header class="clear theme-bg">
				<div class="wrap">
					<h2><?php _e("Sorry", 'storini'); ?></h2>
					<h3><?php _e("Page not found", 'storini'); ?></h3>
				</div>
			</header>
			<?php include ("includes/navi-global.inc.php"); ?>

	<section id="article" class="clear">
		<div class="wrap">

			<div id="post-left-col">

				<article>
					<div class="post-body">
						<p><?php $url = "/"; $link = sprintf( __( "Sorry, we can't find what you're looking for. Try the navigation links above or visit the <a href='%s'>home page</a>.", 'storini'), esc_url( $url ) ); echo $link; ?></p>
					</div>
					<!--/post-body-->
				</article>

			</div>
			<!--/post-left-col-->

			<aside id="post-right-col">

				<div class="clear article-mod mod-related">
					<h2 class="sub-header"><?php _e("Latest news", 'storini'); ?></h2>
					<?php query_posts('showposts=1'); ?>
					<?php while (have_posts()) : the_post(); ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_time('j F Y'); ?></p>
					<?php endwhile; ?>
				</div>

			</aside>
			<!--/post-right-col-->

		</div>
	</section>
	<!--/article-->

	<?php include ("includes/footer.inc.php"); ?>

</div>
<!--/container-->

<?php include ("includes/navi-mobile.inc.php"); ?>

<?php include ("includes/js.inc.php"); ?>

<?php get_footer(); ?>
