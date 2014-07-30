<ul id="social" class="hide">
				<?php if(get_field('url_facebook', 'option')): ?><li class="icon-fb"><a href="<?php the_field('url_facebook', 'option'); ?>" target="_blank">Facebook</a></li><?php endif; ?>
				<?php if(get_field('url_twitter', 'option')): ?><li class="icon-twitter"><a href="<?php the_field('url_twitter', 'option'); ?>" target="_blank">Twitter</a></li><?php endif; ?>
				<?php if(get_field('url_google', 'option')): ?><li class="icon-google"><a href="<?php the_field('url_google', 'option'); ?>" target="_blank">Google+</a></li><?php endif; ?>
				<?php if(get_field('url_instagram', 'option')): ?><li class="icon-instagram"><a href="<?php the_field('url_instagram', 'option'); ?>" target="_blank">Instagram</a></li><?php endif; ?>
				<?php if(get_field('url_pinterest', 'option')): ?><li class="icon-pinterest"><a href="<?php the_field('url_pinterest', 'option'); ?>" target="_blank">Pinterest</a></li><?php endif; ?>
				<?php if(get_field('url_vimeo', 'option')): ?><li class="icon-vimeo"><a href="<?php the_field('url_vimeo', 'option'); ?>" target="_blank">Vimeo</a></li><?php endif; ?>
				<?php if(get_field('url_youtube', 'option')): ?><li class="icon-youtube"><a href="<?php the_field('url_youtube', 'option'); ?>" target="_blank">YouTube</a></li><?php endif; ?>
				<!-- <li class="icon-storini"><a href="http://www.storini.com" target="_blank">Storini</a></li> -->
			</ul>