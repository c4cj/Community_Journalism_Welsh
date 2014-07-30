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

				<?php if( get_field('social_buts') ) { ?>
				<div class="clear article-mod mod-sharing">
					<h2 class="sub-header"><?php _e("Share this page", 'storini'); ?></h2>
					<ul class="share-buts">
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></li>
						<li><g:plusone size="medium" annotation="none"></g:plusone></li>
						<li><a href="<?php echo  get_site_url(); ?>//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" alt="" /></a><span class="share-overlay"></span></li>
						<li><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-via="storini">Tweet</a></li>
					</ul>
				</div>
				<?php } else { ?>
				<?php } ?>

			</div>
			<!--/post-left-col-->

			<aside id="post-right-col">

				<?php if( get_field('advertising', 'option') ) { ?>
				<div class="clear article-mod mod-sponsor">
					<h2 class="sub-header"><?php _e("Advertisements", 'storini'); ?></h2>
					<div class="ads tile">
						<?php include ("includes/ad-one.inc.php"); ?>
						<?php if( get_field('ad_posts', 'option') ) { ?>
						<?php include ("includes/ad-two.inc.php"); ?>
						<?php } else { ?>
						<?php } ?>
					</div>
				</div>
				<?php } else { ?>
				<?php } ?>

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

<!--JS only needed for this page-->

<?php include ("includes/js-social.inc.php"); ?>

<!--/-->

<?php get_footer(); ?>
