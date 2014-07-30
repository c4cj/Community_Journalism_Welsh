<?php while (have_posts()) : the_post(); ?>
<article class="tile <?php foreach(get_the_category() as $category) { echo $category->slug . '';} ?>">
	<a href="<?php the_permalink(); ?>">
		<?php if(has_post_format('gallery')) { ?><?php $image = array(); if(get_field('gallery_images')): while(the_repeater_field('gallery_images')): $attachment_id = get_sub_field('image'); $size = "thumb"; $image[ ] = wp_get_attachment_image_src( $attachment_id, $size ); endwhile; ?><img src="<?php echo $image[0][0]; ?>" alt="<?php the_field('alt'); ?>" /><?php else: ?><img src="<?php bloginfo('template_url'); ?>/images/thumb.png" alt="" /><?php endif; ?><?php } else { ?><?php if(get_field('image')) { ?><?php $image = wp_get_attachment_image_src(get_field('image'), 'small_thumb'); ?><img src="<?php echo $image[0]; ?>" alt="<?php the_field('alt'); ?>" /><?php } else { ?><img src="<?php bloginfo('template_url'); ?>/images/thumb.png" alt="" /><?php } ?><?php } ?>
		<p class="cat"><?php $category = get_the_category(); $cat_id = get_cat_ID( $name ); $link = get_category_link( $cat_id ); if($category[0]->cat_name == "Lead story") { echo $category[1]->cat_name; } else { echo $category[0]->cat_name; } ?></p>
		<h3><?php the_title(); ?></h3>
		<p class="desc"><?php echo excerpt(20); ?></p>
		<p class="date"><?php the_time('j F Y'); ?></p>
	</a>
</article>
<?php endwhile; ?>
