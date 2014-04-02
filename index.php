<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package htdms_theme
 */

get_header(); ?>

	<div id="primary" class="content-area <?php htdms_theme_primary_class(); ?>">
		<main id="main" class="site-main <?php htdms_theme_main_class(); ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					if ( is_page() ) {
							$part = 'page';
						}
					elseif ( is_singular() ) {
						$part = 'single';
					}
					else {
						$part = null;
					}
					get_template_part( 'content', $part );
				?>

			<?php endwhile; ?>

			<?php htdms_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		<?php htdms_theme_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>