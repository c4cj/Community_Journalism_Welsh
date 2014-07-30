<nav class="wrap">
			<div class="bar-color-one theme-bg">
				<div class="bar-color-two">
					<ul>
						<li class="theme-bg icon-search"><a title="Search"><?php _e("Search", 'storini'); ?></a></li>
						<li class="theme-bg icon-tags hide"><a title="Tags"><?php _e("Tags", 'storini'); ?></a></li>
						<li class="theme-bg icon-archive hide"><a title="Archive"><?php _e("Archive", 'storini'); ?></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<!--/navi-global-->
	
	<div id="navi-search" class="clear">
		<div class="navi-accordion">
			<div class="wrap">
				<form method="get" action="<?php bloginfo('url'); ?>/">
		    	<input type="text" name="s" id="s" placeholder="<?php _e("Search for&hellip;", 'storini'); ?>" />
				</form>
			</div>
		</div>
	</div>
	<!--/navi-search-->
	
	<div id="navi-tags" class="clear">
		<div class="navi-accordion">
			<div class="wrap">
				<?php wp_tag_cloud('number=100&smallest=1.3&largest=3.6&unit=em'); ?>
			</div>
		</div>
	</div>
	<!--/navi-tags-->
	
	<div id="navi-archive" class="clear">
		<div class="navi-accordion clearfix">
			<div class="wrap">
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
		</div>
	</div>
	<!--/navi-archive-->