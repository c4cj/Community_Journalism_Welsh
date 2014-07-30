<?php
	/* Template Name: Submit
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
					<li><a href="<?php echo  get_site_url(); ?>/newyddion-diweddaraf/"><?php _e("Latest", 'storini'); ?></a></li>
					<?php include ("includes/navi-cats.inc.php"); ?>
				</ul>
			</div>
		</div>
		<!--/navi-cats-->
		<div id="navi-sub-cats" class="clear theme-bg">
			<div class="wrap">
				<ul>
					<li><a href="<?php echo  get_site_url(); ?>/" class="active"><?php _e("Home", 'storini'); ?></a></li>
					<li><a href="<?php echo  get_site_url(); ?>/become-a-reporter/"><?php _e("Become a local reporter", 'storini'); ?></a></li>
					<li><a href="<?php echo  get_site_url(); ?>/submit/"><?php _e("Submit your news", 'storini'); ?></a></li>
					<li class="navi-right"><a href="<?php echo  get_site_url(); ?>/about/"><?php _e("About", 'storini'); ?></a></li>
				</ul>
			</div>
		</div>
		<!--/navi-storini-->
	</nav>

	<div id="navi-global" class="clear single-title mobile">
		<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
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

				<form action="http://storini.herokuapp.com/external/reports" method="POST" id="commentform" class="submit-news" enctype="multipart/form-data">
					<p><label for="headline"><?php _e("What's your headline?", 'storini'); ?></label> <input name="headline" type="text" id="headline" placeholder="<?php _e("Optional", 'storini'); ?>" /></p>
					<p><label for="story"><?php _e("What's your story?", 'storini'); ?></label> <textarea name="body" id="story" placeholder="<?php _e("Please include as much detail as possible as this will help confirm your report.", 'storini'); ?>" required></textarea></p>
					<p><label for="where"><?php _e("Where did this happen?", 'storini'); ?></label> <input name="where" type="text" id="where" placeholder="<?php _e("Optional", 'storini'); ?>" /></p>
					<p><label for="when"><?php _e("When did this happen?", 'storini'); ?></label> <input name="when" type="text" id="when" placeholder="<?php _e("Optional", 'storini'); ?>" /></p>
					<p><label for="photo"><?php _e("Upload a photo", 'storini') ?></label> <input name="photo" type="file" id="file" /></p>
					<p><label for="caption"><?php _e("Write a caption to go with your photo", 'storini'); ?></label> <input name="photo_caption" type="text" id="caption" placeholder="<?php _e("What is it? Where is it? What is in the photograph?", 'storini'); ?>" /></p>
					<p><input type="checkbox" name="term" id="service" value="" required> <label for="service"><?php $url = "http://www.storini.com/"; $link = sprintf( __( "I have read, understand and agree to the <a href='%s' target='_blank'>Storini terms of service</a>", 'storini'), esc_url( $url ) ); echo $link; ?></label></p>
					<input type="submit" value="<?php _e("Send", 'storini'); ?>">
				</form>

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
					<h2 class="sub-header"><?php _e("Visit our sponsor", 'storini'); ?></h2>
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

<!--[if lt IE 9]>
<script>
// PLACEHOLDER FIX
$('[placeholder]').focus(function() {
	var input = $(this);
	if (input.val() == input.attr('placeholder')) {
  	input.val('');
  	input.removeClass('placeholder');
	}
}).blur(function() {
	var input = $(this);
	if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.addClass('placeholder');
		input.val(input.attr('placeholder'));
	}
}).blur().parents('form').submit(function() {
	$(this).find('[placeholder]').each(function() {
  	var input = $(this);
  	if (input.val() == input.attr('placeholder')) {
    	input.val('');
		}
	})
});
</script>
<![endif]-->

<!--/-->

<?php get_footer(); ?>
