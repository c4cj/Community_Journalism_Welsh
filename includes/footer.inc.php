<footer id="footer" class="clear">
		<div class="wrap">
			<p><?php $url = "http://www.storini.com"; $link = sprintf( __( "Powered by WordPress.", 'storini'), esc_url( $url ) ); echo $link; ?></p>
			<ul class="hide">
				<li><a href="<?php echo  get_site_url(); ?>/amdanom-ni-2/"><?php _e("About", 'storini'); ?></a></li>
				<li><a href="<?php echo  get_site_url(); ?>/cysylltu/"><?php _e("Contact", 'storini'); ?></a></li>
				<?php if( get_field('advertising', 'option') ) { ?><li><a href="<?php echo  get_site_url(); ?>/advertising/"><?php _e("Advertising", 'storini'); ?></a></li><?php } else { ?><?php } ?>
				<?php if( get_field('integrate_storini', 'option') ) { ?>
					<li><a href="<?php echo  get_site_url(); ?>/become-a-reporter/"><?php _e("Become a local reporter", 'storini'); ?></a></li>
					<li><a href="<?php echo  get_site_url(); ?>/submit/"><?php _e("Submit your news", 'storini'); ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</footer>