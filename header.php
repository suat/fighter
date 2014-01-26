<?php
/**
 * The Header
 * @package fighter
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php $example_position = get_theme_mod( 'sidebar_position' );
    if( $example_position != '' ) {
        switch ( $example_position ) {
            case 'right':
                // Do nothing. Sidebar already left.
                break;
            case 'left':
				echo "<link rel='stylesheet' id='fighter-style-css'  href='".get_template_directory_uri()."/layouts/sidebar-content.css' type='text/css' media='all' />\n";
                break;
        }
    }
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner" >
		<div class="site-branding" <?php if ( get_header_image() ) : ?> style="background:url('<?php header_image(); ?>'); height:<?php echo get_custom_header()->height; ?>px; width:<?php echo get_custom_header()->width; ?>px;" <?php endif; // End header image check. ?>>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'fighter' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fighter' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">