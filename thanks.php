<?php
	/* Template Name: Thanks
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
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->
	</nav>

	<div id="navi-global" class="clear single-title">
		<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
		<header class="clear theme-bg hide">
			<h2 class="wrap">
				<?php if(get_field('location', 'option')): ?>
					<?php printf( __("News in %s", 'storini'), get_field('location', 'option') ); ?>
				<?php else: ?>
					<?php _e("News", 'storini'); ?>
				<?php endif; ?>
			</h2>
		</header>
		<?php include ("includes/navi-global.inc.php"); ?>

	<section id="article" class="clear">
		<div class="wrap">

			<div id="post-left-col">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article>
					<header>
						<h1><?php the_title(); ?></h1>
					</header>
					<div class="post-body">
						<?php the_content(); ?>
					</div>
					<!--/post-body-->
				</article>

				<?php endwhile; ?>
				<?php endif; ?>

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
