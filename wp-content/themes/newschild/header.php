<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="propeller" content="cdfcdc8ebf6cf85141f711415c2a8941" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php if (is_singular() && pings_open(get_queried_object())) : ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="mh-wrapper">
<header class="mh-header">

	<div class="header-wrap clearfix">
    <div class="header-shift" id="header-left">
		<?php mh_newsdesk_lite_logo(); ?>
    </div>
    <div class="header-shift" id="header-right">
    <?php the_widget( 'WP_Widget_Search' ); ?>
    <?php the_widget( 'social_icon_widget', array('facebook' => 'https://www.facebook.com/Right-Wing-Now-334228573614535/', 'twitter' => 'https://twitter.com/rightwingnow1') ); ?>
    </div>
	</div>
	<div class="header-menu clearfix">
		<nav class="main-nav clearfix">
			<?php wp_nav_menu(array('theme_location' => 'main_nav')); ?>
		</nav>
	</div>
</header>
