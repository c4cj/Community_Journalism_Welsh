<?php
	/* Template Name: Become a reporter
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
		<div id="navi-sub-cats" class="clear theme-bg become-a-reporter">
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

	<div id="navi-global" class="clear single-title mobile become-a-reporter">
		<a href="#nav" class="navi-link mobile"><?php _e("Menu", 'storini'); ?></a>
		<?php include ("includes/navi-global.inc.php"); ?>

	<section id="article" class="clear photo-post become-a-reporter">
		<div class="wrap">
			<article>
				<header>
					<p class="strorini-logo"><?php _e("Become a local reporter", 'storini'); ?></p>
					<h1><?php _e("Suggest your news.", 'storini') ?> <span><?php _e("Support your community.", 'storini'); ?></span></h1>
				</header>
				<div class="post-body"><p><?php _e("Storini is a new tool that allows you to suggest the news around you. Keep a record of your reports and build your reputation as you support your community.", 'storini'); ?></p></div>
				<!--<form action="" id="commentform" class="clearfix">
					<p><label for="email"><?php _e("Email address", 'storini'); ?>Email address</label> <input type="text" id="email" placeholder="<?php _e("Email address", 'storini'); ?>" /></p>
					<p><label for="password"><?php _e("Password", 'storini'); ?></label> <input type="password" id="password" placeholder="<?php _e("Password", 'storini'); ?>" /></p>
					<input type="submit" value="<?php _e("Start reporting!", 'storini'); ?>">
				</form>-->
				<footer class="clear view-all"><span><a href="http://www.storini.com" target="_blank"><?php _e("Find out more about Storini", 'storini'); ?></a></span></footer>
				<!--/post-body-->
			</article>
			<span class="shadow hide"></span>
			<img src="<?php bloginfo('template_url'); ?>/images/storini-screens.png" alt="Storini" class="hide" />
		</div>
	</section>
	<!--/article-->

	<section id="tiles" class="clear become-a-reporter">
		<div class="wrap">
			<div class="tile feature-one">
				<h3><?php _e("You are the reporter", 'storini'); ?></h3>
				<p><?php _e("Use the Storini website or smartphone apps to send in reports, however large or small, to your community paper.", 'storini'); ?></p>
			</div>
			<div class="tile feature-two">
				<h3><?php _e("Local journalists write the story", 'storini'); ?></h3>
				<p><?php _e("Your local news team create better stories when the whole community is helping to keep them informed of what's happening.", 'storini'); ?></p>
			</div>
			<div class="tile feature-three">
				<h3><?php _e("We publish &amp; share together", 'storini'); ?></h3>
				<p><?php _e("When your report gets included in a published story, you get the credit with a joint story byline and link to your website or Twitter address.", 'storini'); ?></p>
			</div>
			<footer class="clear view-all"><span><a href="http://www.storini.com" target="_blank"><?php _e("Find out more about Storini", 'storini'); ?></a></span></footer>
		</div>
	</section>
	<!--/tiles-->

	<?php include ("includes/footer.inc.php"); ?>

</div>
<!--/container-->

<?php include ("includes/navi-mobile.inc.php"); ?>

<?php include ("includes/js.inc.php"); ?>

<!--JS only needed for this page-->

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
