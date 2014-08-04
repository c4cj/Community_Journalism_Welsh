<!doctype html>

<html <?php language_attributes(); ?>>

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>: <?php bloginfo('description'); ?></title>

<?php if ( is_home() ) { ?><meta name="description" content="<?php bloginfo('description'); ?>" />
<?php } elseif (have_posts() && is_single() OR is_page()) { ?><meta name="description" content="<?php while(have_posts()):the_post();
$out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt()); echo apply_filters('the_excerpt_rss', $out_excerpt); ?><?php endwhile; ?>" />
<?php } ?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/jquery.mmenu.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.php" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/desktop.css" media="only screen and (min-width:960px) and (orientation:landscape)" type="text/css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Merriweather" type="text/css" />

<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/desktop.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fix.css" media="screen" type="text/css" />
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class( $class ); ?>>
	<?php if(isset($_REQUEST['submitted_report']) && $_REQUEST['submitted_report'] == 'true') { ?>
		<div class="flash" style="padding: 12px; font-size: 18px; text-align: center; font-family: 'Open Sans', sans-serif; background-color: #F4FFB8">
			<?php _e('Thanks! Your report has been submitted successully.', 'storini') ?>
		</div>
	<?php } ?>

	<?php if(isset($_REQUEST['submitted_report']) && $_REQUEST['submitted_report'] == 'error') { ?>
		<div class="flash" style="padding: 12px; font-size: 18px; text-align: center; font-family: 'Open Sans', sans-serif; background-color: #FFB8B8">
			<?php _e('We’re sorry, there was an error submitting your report. Please try again later.', 'storini') ?>
		</div>
	<?php } ?>

<?php if( get_field('google_analytics', 'option') ) { ?><?php the_field('google_analytics', 'option'); ?><?php } else { ?><?php } ?>

<div id="container">

	<div id="header" class="clear">
		<div class="wrap">
