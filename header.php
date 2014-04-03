<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package htdms_theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="off-canvas-wrap">
		<div class="inner-wrap">
			<div class="fixed">
				<nav class="tab-bar">
					<?php
						/** This filter is documented in inc/foundation.php */
					if ( apply_filters( 'htdms_theme_use_off_canvas_left', true ) === true ) :
					?>
						<section class="left-small">
							<a class="left-off-canvas-toggle menu-icon" ><span></span></a>
						</section>
					<?php
						endif;
					?>

					<section class="middle tab-bar-section">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
							<?php
								if ( is_singular( HT_DMS_GROUP_CPT_NAME ) || is_singular( HT_DMS_DECISION_CPT_NAME ) ) {
									global $post;
									$title = $post->post_title;
									if ( $title != '' || empty( $ittle ) ) {
										echo '<span class="post-title-in-header" id="post-title-in-header-'.$post->ID.'">'.$title.'</span>';
									} //endif there is a title to output
								} //endif is group/ decision singular
							?>
						</h1>
					</section>

					<?php
						/** This filter is documented in inc/foundation.php */
					if ( apply_filters( 'htdms_theme_use_off_canvas_right', true ) === true ) :
					?>
						<section class="right-small">
							<a class="right-off-canvas-toggle menu-icon" ><span></span></a>
						</section>
					<?php
						endif;
					?>
				</nav>
			</div><!--.fixed-->

		<?php htdms_theme_off_canvas(); ?>
			<section class="main-section">
				<div id="content" class="site-content">