<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);
	header('Content-type: text/css');
  header('Cache-control: must-revalidate');
?>


/* STYLESHEET FOR STORINI (MOBILE FIRST) */



html, body, h1, h2, h3, h4, h5, h6, p, blockquote, cite, ol, ul, li, fieldset, form, label, img, div, dl, dt, dd, input, textarea { margin:0; padding:0; border:0; font-weight:normal; -webkit-tap-highlight-color:rgba(0,0,0,0); }

html, input, select { -webkit-font-smoothing:antialiased; text-rendering:optimizeLegibility; }

body { font-family:'Open Sans', sans-serif; font-weight:400; font-size:62.5%; color:#222; background:#eee; }




/* GENERIC
---------------------------------------------------------------------------------------------------------------*/
a { outline:none; text-decoration:none; }
abbr { border:none; cursor:help; }
ul, ol { list-style:none; }
.clear { width:100%; float:left; clear:both; }
.hide { display:none; }

.wrap { width:92%; padding-left:4%; padding-right:4%; }

#headlines .wrap { width:100%; padding-left:0; padding-right:0; }




/* HEADER
---------------------------------------------------------------------------------------------------------------*/
#header { height:60px; padding:15px 0; background:#fff; }
	#header h1, #header p { font-size:1.8em; line-height:60px; float:left; }
	#header img { max-width:100%; max-height:60px; }
		#header h1 a, #header p a { color:#222; }




/* NAVI (GLOBAL)
---------------------------------------------------------------------------------------------------------------*/
#navi-global { overflow-x:hidden; background:#fff; position:relative; }
#navi-global.home-navi { position:absolute; top:90px; left:0; }
#navi-global.single-title { height:60px; }
#navi-global.archive-title, #navi-global.cat-title { padding-top:60px; }

	#navi-global h2 { font-size:1.3em; color:rgba(255, 255, 255, 0.6); }
		#navi-global.single-title h2 { line-height:60px; color:#fff; }
		#navi-global.archive-title h2, #navi-global.cat-title h2 { line-height:1em; padding-top:50px; }
		#navi-global.cat-title h2 { color:#ccc; }
	#navi-global h3 { font-size:3.6em; line-height:40px; color:#fff; padding:8px 0 50px 0; }
		#navi-global.cat-title h3 { color:#222; }

#navi-global nav { height:60px; line-height:60px; }
#navi-global nav.wrap { width:100%; padding-left:0; padding-right:0; position:absolute; top:0; right:0; }
	#navi-global nav .bar-color-one, #navi-global nav .bar-color-two { height:60px; }
		#navi-global nav .bar-color-two { background-color:rgba(0, 0, 0, 0.1); }
			#navi-global nav ul { background-color:rgba(0, 0, 0, 0.1); float:right; }
				#navi-global nav li { float:left; width:60px; height:60px; text-indent:-9999px; }
					#navi-global nav li a { display:block; cursor:pointer; background-color:rgba(0, 0, 0, 0.1); }
					#navi-global nav li a:hover, .navi-link:hover { background-color:rgba(0, 0, 0, 0.2); }
					#navi-global nav li a.active { background-color:rgba(0, 0, 0, 0.3); }
						.icon-search a { background-position:center 0; }
						.icon-tags a { background-position:center -60px; }
						.icon-archive a { background-position:center -120px; }

#navi-search, #navi-tags, #navi-archive { display:none; z-index:9999; }
	.navi-accordion { background-color:rgba(0, 0, 0, 0.3); padding:30px 0 40px 0; }
#navi-search { position:absolute; top:150px; left:0; }
	#navi-search form input { width:100%; padding:30px 0 20px 0; font-size:2.6em; line-height:30px; color:#fff; border:none; background:none; outline:none; padding:0; margin:0; }
		#navi-search form ::-webkit-input-placeholder { color:rgba(0, 0, 0, 0.2); }
		#navi-search form :-moz-placeholder { color:rgba(0, 0, 0, 0.2); }
		#navi-search form ::-moz-placeholder { color:rgba(0, 0, 0, 0.2); }
		#navi-search form :-ms-input-placeholder { color:rgba(0, 0, 0, 0.2); }




/* MOBILE NAVI
---------------------------------------------------------------------------------------------------------------*/
.navi-link { position:absolute; top:0; left:0; width:60px; height:60px; display:block; text-indent:-9999px; background-position:right -120px; z-index:9999; }
	/*.navi-link.active { background-position:right -180px; }*/

.mm-list { padding-top:10px; }
.mm-menu li { text-indent:20px; }
	.mm-menu li a { color:#fff; width:100%; float:left; clear:both; font-size:1.4em; height:50px; line-height:50px; }
		.mm-menu li.navi-report a { background-color:rgba(0, 0, 0, 0.1); height:60px; line-height:60px; margin-top:6px; }
		.mm-menu li.navi-submit a { background-color:rgba(0, 0, 0, 0.5); height:60px; line-height:60px; }
	.mm-menu .mobile-page, .mm-menu .mobile-social { padding:14px 0; }
	.mm-menu .mobile-page { background-color:rgba(0, 0, 0, 0.1); }
		.mm-menu .mobile-page li a, .mm-menu .mobile-social li a { font-size:1.3em; height:auto; line-height:2.6em; }

.cat-item-1 { display:none !important; }




/* TILES
---------------------------------------------------------------------------------------------------------------*/
.tile, .ads, .tweet { width:100%; max-width:300px; margin:0 auto; margin-top:20px; background:url(images/thumb-storini.gif) center 0 no-repeat #fff; background-size:300px 200px; position:relative; }
	.tile img, .ads img { max-width:100%; height:auto; min-height:200px; }
	.tile .cat { font-size:1.3em; line-height:1em; text-transform:uppercase; padding:20px 20px 15px 20px; }
	.tile h3 { font-size:2.4em; line-height:28px; color:#222; padding:0 20px 16px 20px; }
	.tile .desc { font-size:1.4em; color:#888; padding:0 20px; }
	.tile .date { font-size:1.3em; color:#888; padding:30px 20px 20px 20px; }

.tile.business { background-image:url(images/thumb-business.gif); }
.tile.community { background-image:url(images/thumb-community.gif); }
.tile.education { background-image:url(images/thumb-education.gif); }
.tile.health { background-image:url(images/thumb-health.gif); }
.tile.sport { background-image:url(images/thumb-sport.gif); }
.tile.whats-on { background-image:url(images/thumb-whatson.gif); }

.ads { background:none; width:100%; }
#post-right-col .ads { margin:inherit; }
	.ad-space-one, .ad-space-two { min-height:250px; display:table; }
	.ad-space-two { margin-top:20px; }
	.ad-space-two.hide { display:none; }
		.ad-temp { display:table-cell; vertical-align:middle; padding:0 20px; font-size:3.6em; line-height:40px; text-align:center; background:#ddd; color:#aaa; }
		.ad-temp:hover { color:#222; }

.tweet { background:#2daae1; text-align:center; background-position:center -350px; }
	.tweet_text { font-size:2.6em; line-height:30px; color:#fff; display:block; padding:110px 30px 20px 30px; }
		.tweet_text a { color:#fff; }
		.tweet_text a:hover { color:#14749e; }
	.tweet_time { font-size:1.3em; line-height:1em; }
		.tweet_time a { color:#14749e; }
		.tweet_time a:hover { color:#fff; }
	.twitter-follow-button { padding:30px 0; }

.view-all { padding:40px 0 0 0; text-align:center; }
	.view-all span { font-size:1.8em; }
		.view-all span a { color:#fff; padding:12px 30px 14px 30px; min-width:210px; }
		.view-all span a:hover { background:#222; }

.wp-paginate { padding-top:20px; max-width:300px; margin:0 auto; }
	.wp-paginate li { text-align:center; font-size:1.4em; }
	.wp-paginate li .title, .wp-paginate li:first-child { display:none; }
		.wp-paginate li a, .wp-paginate li .current { width:40px; height:40px; line-height:40px; display:block; float:left; margin-right:10px; background:#fff; color:#222; }
		.wp-paginate li a:hover { background:#222; color:#fff; }
		.wp-paginate li .current { color:#fff; }
			.wp-paginate .page, .wp-paginate li .current { display:none; }
			.wp-paginate li .prev, .wp-paginate li .next { width:48.5%; float:left; margin:0; color:#fff; }
				.wp-paginate li .next { float:right; }

.no-posts { padding:90px 0 60px 0; }
	.no-results { font-size:1.8em; line-height:22px; color:#888; padding:50px 0 20px 0; }




/* ARTICLE (SINGLE)
---------------------------------------------------------------------------------------------------------------*/
#article { background:#fff; }
#article.photo-post { padding-top:30px; }
	#article article header { padding-bottom:30px; }
		#article article header h1 { font-size:3.6em; line-height:40px; padding-top:30px; }
			#article.photo-post article header h1 { padding-top:0; }
		#article article header p { font-size:1.4em; line-height:1em; color:#888; padding-top:21px; }
			#article.photo-post header p { padding:0 0 13px 0; }
	#article .ads { margin-top:0; margin-bottom:0; }

.post-body { padding-bottom:30px; }
.photo-post .post-body { padding-bottom:20px; }
	.post-body p, .post-body ul, .post-body ol { padding-bottom:1.2em; }
	.post-body p, .post-body li { font-size:1.6em; line-height:22px; }
		.photo-post .post-body p { color:#888; }
		.post-body img, .post-body iframe { max-width:100%; }
		.post-body ul, .post-body ol { list-style:outside; margin:0.4em 0 0 20px; }
		.photo-post .post-body ul, .photo-post .post-body ol { list-style:none; margin:0; }
			.post-body li { padding-bottom:0.4em; color:#666; }
			.photo-post .post-body li { padding-bottom:0; color:#888; font-size:0.8em; }
	.post-body blockquote { padding:10px 0 10px 20px; margin:1em 0 3em 0; }
	.photo-post	.post-body blockquote { border-left:none !important; margin:0; }
		.post-body blockquote p { padding-bottom:0; color:#888; }
	.post-body a:hover { color:#888; }
	
#post-left-col { }
	.feature-image { background:#eee; position:relative; width:109.5%; margin:0 -5% 0 -4.5%; }
		.feature-image img { max-width:100%; height:auto; float:left; }
		.feature-image .caption { position:absolute; bottom:0; right:0; padding:0 10px 0 36px; background-position:0 -302px; background-color:#fff; height:24px; line-height:30px; font-size:1.1em; color:#888; }
			.feature-image .caption a { color:#888; }

#post-right-col { width:100%; }

#photo-grid { background:#fff; padding:0 0 30px 0; }
	.item { max-width:300px; margin:0 0 20px 0; }
		.item img { max-width:100%; height:auto; float:left; }

.post-tags, .post-body .next-post-link { font-size:13px; line-height:20px; color:#ccc; }
	.post-tags a { color:#333; }
.post-body .next-post-link { padding-top:20px; }
	.post-body .next-post-link a { color:#ccc; }




/* ARTICLE (MODULES)
---------------------------------------------------------------------------------------------------------------*/
.article-mod { margin-top:40px; }
#post-right-col .article-mod, .mod-sharing, .mod-comments, .photo-post #post-left-col .article-mod { margin-top:0; margin-bottom:40px; }
	.sub-header { font-size:1.3em; line-height:1em; color:#ccc; text-transform:uppercase; padding:10px 0 30px 0; border-top:1px solid #ccc; }
		.mod-comments .sub-header { padding-bottom:0; }

.share-buts li { float:left; padding:0 20px 14px 0; }
.share-buts li:last-child { padding-right:0; }

.mod-author img { width:70px; height:70px; -webkit-border-radius:70px; -moz-border-radius:70px; border-radius:70px; background:#eee; padding:5px; }
.mod-author div { width:100%; padding-top:10px; }
	.mod-author h3 { font-size:1.8em; padding-bottom:10px; }
	.mod-author p { font-size:1.3em; line-height:17px; color:#888; padding-bottom:6px; }
	.mod-author p:last-child { padding-bottom:0; }
		.mod-author a { color:#222; }

.mod-reporters h3 { font-size:1.3em; line-height:17px; padding-bottom:15px; border-bottom:1px dashed #eee; margin-bottom:15px; }
.mod-reporters h3:last-child { border-bottom:none; padding-bottom:0; margin-bottom:0; }
	.mod-reporters span, .mod-reporters a { color:#888; }

.mod-related h3 { font-size:2.8em; line-height:32px; padding-bottom:15px; }
	.mod-related h3 a { color:#222; }
.mod-related p { font-size:1.3em; line-height:1em; color:#888; }

.sub-header a.tooltip { display:inline-block; text-indent:-9999px; width:14px; height:14px; margin-left:6px; background-position:0 -250px; cursor:help; }
#tooltip { position:absolute; max-width:200px; font-size:1.3em; color:#fff; background:#666; padding:15px; display:none; }




/* FORM ELEMENTS (COMMENTS)
---------------------------------------------------------------------------------------------------------------*/
input[type=text], input[type=password], input[type=email], input[type=submit], select, textarea { -webkit-appearance:none; -webkit-border-radius:0; border:none; }

::-webkit-input-placeholder { color:#999; }
:-moz-placeholder { color:#999; }
::-moz-placeholder { color:#999; }
:-ms-input-placeholder { color:#999; }

#commentform { padding-top:20px; }
	#commentform p { width:100%; }
	#commentform p.comment-form-email { margin-top:10px; }
	#commentform p.comment-form-comment { width:100%; clear:both; margin:10px 0; }
	#commentform p.form-submit { width:100%; float:right; clear:both; }
		#commentform label { display:none; }
		#commentform input[type=text], #commentform input[type=password], #commentform input[type=email], #commentform textarea, #commentform input[type=submit] { width:96%; padding-left:4%; min-height:40px; line-height:40px; background:#eee; font-size:1.8em; }
		#commentform input[type=text]:hover, #commentform input[type=password]:hover, #commentform input[type=email]:hover, #commentform textarea:hover, #commentform input[type=submit]:hover { background:#e5e5e5; }
			#commentform textarea { min-height:128px; padding-top:12px; line-height:22px; }
		#commentform input[type=submit] { width:auto; float:right; padding:0 30px; color:#fff; cursor:pointer; }
		#commentform input[type=submit]:hover { background:#222; }

#commentform.submit-news label { display:inherit; font-size:1.3em; line-height:1em; text-transform:uppercase; padding-bottom:10px; }
#commentform.submit-news input[type=checkbox] { float:left; margin-right:10px; }
	.submit-news a:hover { text-decoration:underline; }

.paginate-comments { display:none; }


/* REPLIES */
.logged-in-as, #reply-title { font-size:1.3em; line-height:1em; padding:10px 0 20px 0; }
#reply-title { color:#fff; padding-bottom:0; }
	#reply-title a { color:#fff !important; }
#cancel-comment-reply-link, .comment-meta { font-size:1.1em; line-height:1em; float:right; color:#888; }
	.mod-comments a:hover, .comment-author a, .comment-meta a, #reply-title #cancel-comment-reply-link { color:#888 !important; }

.commentlist { padding-top:40px; }
	.comment { width:100%; float:left; clear:both; background:#f7f7f7; padding:22px 0 0 0; }
		.comment-author, .comment-meta { float:left; width:50%; text-indent:20px; }
		.comment-author cite { font-style:normal; }
			.comment-meta { float:right; text-align:right; display:none; }
				.comment-author img { display:none; }
				.comment-meta a, .comment-awaiting-moderation { padding-right:20px; }
					.comment-awaiting-moderation { font-style:normal; padding-bottom:6px; float:right; text-align:right; width:50%; }
		.comment p { clear:both; font-size:1.4em; line-height:19px; padding:8px 20px 0 20px; }
		.comment .reply { width:100%; float:left; clear:both; background:#f7f7f7; border-bottom:5px solid #fff; }
			.mod-comments .comment-reply-link { font-size:1.1em; text-transform:uppercase; padding:3px 8px; background:#ccc; color:#fff; float:right; }
			.mod-comments .comment-reply-link:hover { color:#fff !important; }




/* BECOME A REPORTER
---------------------------------------------------------------------------------------------------------------*/
#article.become-a-reporter { padding-top:0; background:url(images/bg-storini.jpg) center 0 no-repeat; background-size:1124px 700px; }
	#article.become-a-reporter article header h1, #article.become-a-reporter article header p, #article.become-a-reporter .post-body p { color:#fff; }
	#article.become-a-reporter article header p { font-size:1.6em; }

#tiles.become-a-reporter { background:#fff; padding:20px 0 70px 0; border-top:3px solid #f42779; }
	.become-a-reporter .tile { padding:110px 0 20px 0; margin-top:30px; text-align:center; background-size:80px 80px; }
	.feature-one { background:url(images/feature-one.png) center 0 no-repeat; }
	.feature-two { background:url(images/feature-two.png) center 0 no-repeat; }
	.feature-three { background:url(images/feature-three.png) center 0 no-repeat; }
		.become-a-reporter .tile h3 { font-size:2.8em; line-height:32px; }
		.become-a-reporter .tile p { font-size:1.6em; line-height:22px; color:#888; padding:0 5px; }

.become-a-reporter #commentform { padding-top:0; }
	.become-a-reporter #commentform p { padding-bottom:10px; }
	.become-a-reporter #commentform input[type=text], .become-a-reporter #commentform input[type=password] { min-height:50px; line-height:50px; background-color:#fff;  }
	.become-a-reporter #commentform input[type=submit] { width:100%; padding:0; min-height:50px; line-height:50px; }

.strorini-logo { display:block; width:153px; height:90px; text-indent:-9999px; background-position:center -250px; margin:0 auto; }




/* HEADLINES (HOME)
---------------------------------------------------------------------------------------------------------------*/
#headlines { padding:60px 0 80px 0; background:#fff; text-align:center; }
	#headlines .date { font-size:1.4em; line-height:1em; color:#ccc; }
	#headlines img { width:100%; max-width:465px; max-height:320px; height:auto; padding-bottom:20px; margin:0 auto; }
	#headlines h2 { font-size:3em; line-height:34px; padding:8px 4% 0 4%; }
		#headlines h2 a { color:#222; }
	#headlines .desc { display:none; }




/* FLEXSLIDER
---------------------------------------------------------------------------------------------------------------*/
.flexslider .slides > li { display:none; -webkit-backface-visibility:hidden; }
.flexslider .slides img { width:100%; max-width:465px; display:block; }
.slides:after { content:"."; display:block; clear:both; visibility:hidden; line-height:0; height:0; } 
html[xmlns] .slides { display:block; } 
* html .slides { height:1%; }
.no-js .slides > li:first-child { display:block; } /* No JavaScript Fallback */

.flexslider { position:relative; }
.flex-viewport { max-height:2000px; -webkit-transition:all 1s ease; -moz-transition:all 1s ease; transition:all 1s ease; }
.loading .flex-viewport { max-height:480px; }
.flexslider .slides { zoom:1; }

.flex-control-nav { width:100%; position:absolute; bottom:-48px; text-align:center; }
	.flex-control-nav li { display:inline-block; zoom:1; *display:inline; }
		.flex-control-paging li a { display:block; width:13px; height:13px; -webkit-border-radius:13px; -moz-border-radius:13px; border-radius:13px; background:#eee; text-indent:-9999px; margin-right:16px; cursor:pointer; border:7px solid #fff; }
		.flex-control-paging li:last-child a { margin-right:0; }

.flex-direction-nav { display:none; }




/* FOOTER
---------------------------------------------------------------------------------------------------------------*/
#tiles, #article { padding-bottom:40px; }

#footer { background:#222; height:60px; line-height:60px; }
	#footer p, #footer li { font-size:1.3em; color:#fff; }
	#footer p { text-align:center; }
		#footer p span { color:#444; }
			#footer a { color:#fff; }




/* THEME STYLES
---------------------------------------------------------------------------------------------------------------*/
.theme-bg, 
.view-all a, 
.wp-paginate li .current, 
#commentform input[type=submit], 
.wp-paginate li .prev, 
.wp-paginate li .next, 
#nav.mm-menu, 
.flex-control-paging li a.flex-active, 
#navi-search, 
#navi-tags, 
#navi-archive, 
.comment-reply-link:hover { 
	background-color:<?php if( get_field('theme_colour', 'option') ) { ?><?php the_field('theme_colour', 'option'); ?>;<?php } else { ?>#f42779;<?php } ?> 
}

#header h1 a:hover, 
#header p a:hover, 
.tile .cat, 
.tile:hover h3, 
.read-more a, 
.flex-direction-nav a, 
.feature-image .caption a:hover, 
.post-body a, 
.mod-author a:hover, 
.mod-reporters a:hover, 
.mod-related h3 a:hover, 
.mod-author .sub-header, 
.mod-reporters .sub-header, 
#headlines h2 a:hover, 
.mod-comments a, 
.no-results a, 
.submit-news a, 
.post-tags a:hover, 
.next-post-link a:hover {
	color:<?php if( get_field('theme_colour', 'option') ) { ?><?php the_field('theme_colour', 'option'); ?>;<?php } else { ?>#f42779;<?php } ?>
}

#navi-cats a.active, #navi-cats li.current-cat a { border-bottom:3px solid <?php if( get_field('theme_colour', 'option') ) { ?><?php the_field('theme_colour', 'option'); ?>;<?php } else { ?>#f42779;<?php } ?> }

.post-body blockquote { border-left:2px solid <?php if( get_field('theme_colour', 'option') ) { ?><?php the_field('theme_colour', 'option'); ?>;<?php } else { ?>#f42779;<?php } ?> }

.mod-author .sub-header, .mod-reporters .sub-header { border-top:1px solid <?php if( get_field('theme_colour', 'option') ) { ?><?php the_field('theme_colour', 'option'); ?>;<?php } else { ?>#f42779;<?php } ?> }

.become-a-reporter .view-all a, .become-a-reporter #commentform input[type=submit] { background-color:#f42779; }
#navi-global.become-a-reporter .theme-bg, #navi-sub-cats.become-a-reporter { background-color:#222; }




/* FONT STYLES
---------------------------------------------------------------------------------------------------------------*/


/* Open Sans (light) */
#header h1, 
#header p, 
.tile h3, 
#headlines h2, 
.tweet_text, 
.ads div, 
#navi-global h3, 
#article article header h1, 
.mod-related h3 {
	font-family:'Open Sans', sans-serif; font-weight:300;
}


/* Open Sans (regular) */
#navi-cats li, 
#navi-sub-cats li, 
.view-all a, 
.wp-paginate li, 
#commentform input, 
#commentform textarea, 
.mm-menu li, 
#navi-tags a, 
#navi-archive li, 
#cancel-comment-reply-link {
	font-family:'Open Sans', sans-serif; font-weight:400;
}


/* Open Sans (bold) */
.tile .cat, 
.wp-paginate li .current, 
.sub-header, 
.comment-reply-link, 
.comment-awaiting-moderation, 
#commentform.submit-news label {
	font-family:'Open Sans', sans-serif; font-weight:700;
}


/* Merriweather (regular) */
#footer p, 
#footer li {
	font-family:'Merriweather', serif; font-weight:400;
}




/* SPRITE
---------------------------------------------------------------------------------------------------------------*/
#navi-global nav li a, 
#social li a, 
.tweet, 
.caption, 
.navi-link, 
.sub-header a.tooltip, 
.strorini-logo { 
	background-image:url(images/sprite.png); background-size:480px 450px; background-repeat:no-repeat;
}




/* iPAD PORTRAIT
---------------------------------------------------------------------------------------------------------------*/
@media only screen and (min-width:690px) and (max-width:960px) {
	#tiles .wrap { width:630px; margin:0 auto; }
	.tile, .ads, .tweet { min-height:530px; float:left; margin:30px 30px 0 0; }
	.tile:nth-child(2n), .tweet { margin-right:0; }
	.ad-space-two.hide { display:table; }
}




/* CLEAR FIX
---------------------------------------------------------------------------------------------------------------*/
.clearfix { display:inline-table; /* Hides from IE-mac \*/ height:1%; display:block; /* End hide from IE-mac */ }
html>body .clearfix { height:auto; }
.clearfix:after { content: "."; display:block; height:0; clear:both; visibility:hidden; }
		
		