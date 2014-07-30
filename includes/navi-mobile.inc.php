<nav id="nav">
	<ul>
		<li><a href="<?php echo  get_site_url(); ?>/"><?php _e("Home", 'storini'); ?></a></li>
		<li><a href="<?php echo  get_site_url(); ?>/latest-news/"><?php _e("Latest", 'storini'); ?></a></li>
		<?php include ("navi-cats.inc.php"); ?>
		<?php if( get_field('integrate_storini', 'option') ) { ?>
			<li class="navi-report"><a href="<?php echo  get_site_url(); ?>/become-a-reporter/"><?php _e("Become a local reporter", 'storini'); ?></a></li>
			<li class="navi-submit"><a href="<?php echo  get_site_url(); ?>/submit/"><?php _e("Submit your news", 'storini'); ?></a></li>
		<?php } ?>
		<div class="clear mobile-page">
			<li><a href="<?php echo  get_site_url(); ?>/about/"><?php _e("About", 'storini'); ?></a></li>
			<li><a href="<?php echo  get_site_url(); ?>/contact/"><?php _e("Contact", 'storini'); ?></a></li>
			<?php if( get_field('advertising', 'option') ) { ?><li><a href="<?php echo  get_site_url(); ?>/advertising/"><?php _e("Advertise on this site", 'storini'); ?></a></li><?php } else { ?><?php } ?>
		</div>
		<div class="clear mobile-social">
			<?php if(get_field('url_facebook', 'option')): ?><li><a href="<?php the_field('url_facebook', 'option'); ?>" target="_blank">Facebook</a></li><?php endif; ?>
			<?php if(get_field('url_twitter', 'option')): ?><li><a href="<?php the_field('url_twitter', 'option'); ?>" target="_blank">Twitter</a></li><?php endif; ?>
			<?php if(get_field('url_google', 'option')): ?><li><a href="<?php the_field('url_google', 'option'); ?>" target="_blank">Google+</a></li><?php endif; ?>
			<?php if(get_field('url_instagram', 'option')): ?><li><a href="<?php the_field('url_instagram', 'option'); ?>" target="_blank">Instagram</a></li><?php endif; ?>
			<?php if(get_field('url_pinterest', 'option')): ?><li><a href="<?php the_field('url_pinterest', 'option'); ?>" target="_blank">Pinterest</a></li><?php endif; ?>
			<?php if(get_field('url_vimeo', 'option')): ?><li><a href="<?php the_field('url_vimeo', 'option'); ?>" target="_blank">Vimeo</a></li><?php endif; ?>
			<?php if(get_field('url_youtube', 'option')): ?><li><a href="<?php the_field('url_youtube', 'option'); ?>" target="_blank">YouTube</a></li><?php endif; ?>
			<li><a href="http://www.storini.com" target="_blank">Storini</a></li>
		</div>
	</ul>
</nav>
