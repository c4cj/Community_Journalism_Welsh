<?php $uncatid = get_term_by( 'slug', 'whats-on', 'category', 'y-dinesydd'); $uncatid = $uncatid->term_id; ?>

<?php $uncatid = get_term_by( 'slug', '99-digwyddiadau', 'category', 'Digwyddiadau'); $uncatid = $uncatid->term_id; ?>
<?php $uncatid = get_term_by( 'slug', 'lead-story', 'category', 'Prif Stori'); $uncatid = $uncatid->term_id; ?>
<?php $uncatid = get_term_by( 'slug', '99-plant-caerdydd', 'category', 'Caerdydd Ni'); $uncatid = $uncatid->term_id; ?>
					<?php $args = array(
						'orderby'					=>	'id',
						'order'						=>	'ASC',
						'title_li'				=>	'',
						'depth'						=>	1,
						'hide_empty'			=>	1,
						'exclude'					=>	$uncatid,
					); ?>
					<?php wp_list_categories( $args ); ?>
					<?php if( get_field('whats_on', 'option') ) { ?><li class="navi-right"><a href="<?php echo  get_site_url(); ?>/category/whats-on/"><?php _e("What's on?", 'storini'); ?></a></li><?php } else { ?><?php } ?>