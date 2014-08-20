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
			<h2 class="wrap"><?php $category = get_the_category(); echo $category[0]->cat_name; ?> <?php if(get_field('location', 'option')): ?> <?php the_field('location', 'option'); ?><?php endif; ?></h2>
		</header>
		<?php include ("includes/navi-global.inc.php"); ?>


	<?php if(has_post_format('gallery')) { ?>
	<!-- /////////////////////////////////////////// If a 'Gallery' / photo post (format)/////////////////////////////////////////// -->


	<section id="article" class="clear photo-post">
		<div class="wrap">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<p><?php the_time('j F Y'); ?></p>
					<h1><?php the_title(); ?></h1>
				</header>
				<div class="post-body">
					<?php the_content(); ?>
				</div>
				<!--/post-body-->
			</article>

			<div id="photo-grid" class="clear">
				<?php if(get_field('gallery_images')): ?>
				<?php while(the_repeater_field('gallery_images')): ?>
				<div class="item"><?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'post'); ?><a href="<?php echo $image[0]; ?>" data-lightbox="gallery" title="<?php the_sub_field('alt'); ?>"><img src="<?php echo $image[0]; ?>" /></a></div>
				<?php endwhile; ?>
				<?php endif; ?>
		  </div>

			<div id="post-left-col">

				<?php if(has_tag()) { ?>
				<div class="clear article-mod mod-sharing">
					<h2 class="sub-header"><?php _e("Article tags", 'storini'); ?></h2>
					<p class="post-tags"><?php the_tags('','&nbsp;&nbsp;·&nbsp;&nbsp;'); ?></p>
				</div>
				<?php } else { ?><?php } ?>

				<div class="clear article-mod mod-sharing">
					<h2 class="sub-header"><?php _e("Share this article", 'storini'); ?></h2>
					<ul class="share-buts">
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></li>
						<li><g:plusone size="medium" annotation="none"></g:plusone></li>
						<li><a href="<?php echo  get_site_url(); ?>//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" alt="" /></a><span class="share-overlay"></span></li>
						<li><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a></li>
					</ul>
				</div>

				<div class="clear article-mod mod-author">
					<h2 class="sub-header"><?php _e("Written by", 'storini'); ?></h2>
					<?php userphoto_the_author_photo(
						'',
						'',
						array('class' => 'photo'),
						get_template_directory_uri() . '/images/100x100-avatar.gif'
					) ?>
					<div>
						<h3><?php if (get_the_author_meta( 'first_name' )) { ?><?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?><?php } else { ?><?php the_author_meta( 'display_name' ); ?><?php } ?></h3>
						<?php if (get_the_author_meta( 'description' )) { ?><p><?php the_author_meta( 'description' ); ?></p><?php } ?>
						<?php if (get_the_author_meta('url')) { ?><p><a href="<?php the_author_meta('url'); ?>"><?php the_author_meta('url'); ?></a></p><?php } ?>
						<?php if (get_the_author_meta( 'twitter' )) { ?><p><a href="https://twitter.com/intent/user?screen_name=<?php the_author_meta( 'twitter' ); ?>" target="_blank">@<?php the_author_meta( 'twitter' ); ?></a></p><?php } ?>
					</div>
				</div>

				<?php if(get_field('storini_reporters')): ?>
				<div class="clear article-mod mod-reporters">
					<h2 class="sub-header"><?php _e("Storini reporters", 'storini'); ?> <a class="tooltip" title="<?php _e("Storini reporters are people who have contributed to this story using Storini.com", 'storini'); ?>">?</a></h2>
					<?php while(the_repeater_field('storini_reporters')): ?>
					<h3><?php the_sub_field('reporter_name'); ?> <?php if(get_sub_field('reporter_twitter')): ?><span><br /><a href="https://twitter.com/intent/user?screen_name=<?php the_sub_field('reporter_twitter'); ?>" target="_blank">@<?php the_sub_field('reporter_twitter'); ?></a></span><?php endif; ?><?php if(get_sub_field('reporter_link')): ?><span><br /><a href="<?php the_sub_field('reporter_link'); ?>" target="_blank"><?php the_sub_field('reporter_link'); ?></a></span><?php endif; ?><?php if(get_sub_field('reporter_email')): ?><span><br /><a href="mailto:<?php the_sub_field('reporter_email'); ?>" target="_blank"><?php the_sub_field('reporter_email'); ?></a></span><?php endif; ?></h3>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>

				<?php comments_template(); ?>

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

				<?php
					$tags = wp_get_post_tags($post->ID);
					$tagIDs = array();
					if ($tags) {
						$tagcount = count($tags);
						for ($i = 0; $i < $tagcount; $i++) {
							$tagIDs[$i] = $tags[$i]->term_id;
						}
					$args=array(
						'tag__in' => $tagIDs,
						'post__not_in' => array($post->ID),
						'showposts'=>1,
						'caller_get_posts'=>1
					);
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<div class="clear article-mod mod-related">
					<h2 class="sub-header"><?php _e("Suggested further reading", 'storini'); ?></h2>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<p><?php the_date('j F Y'); ?></p>
				</div>
				<?php endwhile;
					}
				}
				?>

			</aside>
			<!--/post-right-col-->

		</div>
	</section>
	<!--/article-->


	<?php } else { ?>
	<!-- /////////////////////////////////////////// A 'Standard' post (format) /////////////////////////////////////////// -->


	<section id="article" class="clear">
		<div class="wrap">

			<div id="post-left-col">

				<?php if(get_field('image')): ?>
				<div class="feature-image clearfix">
					<?php $image = wp_get_attachment_image_src(get_field('image'), 'post'); ?><img src="<?php echo $image[0]; ?>" alt="<?php the_field('alt'); ?>" />
					<?php if(get_field('credit_name')): ?><p class="caption"><?php if(get_field('credit_link')): ?><a href="<?php the_field('credit_link'); ?>" target="_blank"><?php endif; ?><?php the_field('credit_name'); ?><?php if(get_field('credit_link')): ?></a><?php endif; ?></p><?php endif; ?>
				</div>
				<?php endif; ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1><?php the_title(); ?></h1>
						<p><?php the_time('j F Y'); ?></p>
					</header>
					<div class="post-body">
						<?php the_content(); ?>
						<p class="next-post-link"><?php next_posts_link('%link', __('Next article', 'storini').' &raquo;', TRUE); ?></p>
					</div>
					<!--/post-body-->
				</article>

				<?php if(has_tag()) { ?>
				<div class="clear article-mod mod-sharing">
					<h2 class="sub-header"><?php _e("Article tags", 'storini'); ?></h2>
					<p class="post-tags"><?php the_tags('','&nbsp;&nbsp;·&nbsp;&nbsp;'); ?></p>
				</div>
				<?php } else { ?><?php } ?>

				<div class="clear article-mod mod-sharing">
					<h2 class="sub-header"><?php _e("Share this article", 'storini'); ?></h2>
					<ul class="share-buts">
						<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></li>
						<li><g:plusone size="medium" annotation="none"></g:plusone></li>
						<li><a href="<?php echo  get_site_url(); ?>//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" alt="" /></a><span class="share-overlay"></span></li>
						<li><script type="IN/Share" data-url="<?php the_permalink(); ?>" data-counter="right"></script></li>
						<li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>">Tweet</a></li>
					</ul>
				</div>

				<?php comments_template(); ?>

			</div>
			<!--/post-left-col-->

			<aside id="post-right-col">

				<div class="clear article-mod mod-author">
					<h2 class="sub-header"><?php _e("Written by", 'storini'); ?></h2>
					<?php userphoto_the_author_photo(
						'',
						'',
						array('class' => 'photo'),
						get_template_directory_uri() . '/images/100x100-avatar.gif'
					) ?>
					<div>
						<h3><?php if (get_the_author_meta( 'first_name' )) { ?><?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?><?php } else { ?><?php the_author_meta( 'display_name' ); ?><?php } ?></h3>
						<?php if (get_the_author_meta( 'description' )) { ?><p><?php the_author_meta( 'description' ); ?></p><?php } ?>
						<?php if (get_the_author_meta('url')) { ?><p><a href="<?php the_author_meta('url'); ?>"><?php the_author_meta('url'); ?></a></p><?php } ?>
						<?php if (get_the_author_meta( 'twitter' )) { ?><p><a href="https://twitter.com/intent/user?screen_name=<?php the_author_meta( 'twitter' ); ?>" target="_blank">@<?php the_author_meta( 'twitter' ); ?></a></p><?php } ?>
					</div>
				</div>

				<?php if(get_field('storini_reporters')): ?>
				<div class="clear article-mod mod-reporters">
					<h2 class="sub-header"><?php _e("Storini reporters", 'storini'); ?> <a class="tooltip" title="<?php _e("Storini reporters are people who have contributed to this story using Storini.com", 'storini'); ?>">?</a></h2>
					<?php while(the_repeater_field('storini_reporters')): ?>
					<h3><?php the_sub_field('reporter_name'); ?> <?php if(get_sub_field('reporter_twitter')): ?><span><br /><a href="https://twitter.com/intent/user?screen_name=<?php the_sub_field('reporter_twitter'); ?>" target="_blank">@<?php the_sub_field('reporter_twitter'); ?></a></span><?php endif; ?><?php if(get_sub_field('reporter_link')): ?><span><br /><a href="<?php the_sub_field('reporter_link'); ?>" target="_blank"><?php the_sub_field('reporter_link'); ?></a></span><?php endif; ?><?php if(get_sub_field('reporter_email')): ?><span><br /><a href="mailto:<?php the_sub_field('reporter_email'); ?>" target="_blank"><?php the_sub_field('reporter_email'); ?></a></span><?php endif; ?></h3>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>

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

				<?php
					$tags = wp_get_post_tags($post->ID);
					$tagIDs = array();
					if ($tags) {
						$tagcount = count($tags);
						for ($i = 0; $i < $tagcount; $i++) {
							$tagIDs[$i] = $tags[$i]->term_id;
						}
					$args=array(
						'tag__in' => $tagIDs,
						'post__not_in' => array($post->ID),
						'showposts'=>1,
						'caller_get_posts'=>1
					);
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					while ($my_query->have_posts()) : $my_query->the_post();
				?>
				<div class="clear article-mod mod-related">
					<h2 class="sub-header"><?php _e("Suggested further reading", 'storini'); ?></h2>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<p><?php the_date('j F Y'); ?></p>
				</div>
				<?php endwhile;
					}
				}
				?>

			</aside>
			<!--/post-right-col-->

		</div>
	</section>
	<!--/article-->


	<?php } ?>


	<?php include ("includes/footer.inc.php"); ?>

</div>
<!--/container-->

<?php include ("includes/navi-mobile.inc.php"); ?>

<?php include ("includes/js.inc.php"); ?>

<!--JS only needed for this page-->

<script src="<?php bloginfo('template_url'); ?>/js/tooltip.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/masonry.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/lightbox-2.6.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lightbox.css" media="screen" type="text/css" />

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
