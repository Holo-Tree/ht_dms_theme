<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package htdms_theme
 */

htdms_theme_header(); ?>

	<section id="primary" class="content-area <?php htdms_theme_primary_class(); ?>">
		<main id="main" class="site-main <?php htdms_theme_main_class(); ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">

				</h1>

			</header><!-- .page-header -->

			<?php include( trailingslashit( HT_DMS_VIEW_DIR ).'group-list.php' ); ?>


			<?php htdms_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	<?php htdms_theme_sidebar( 'group-sidebar' ); ?>
	</section><!-- #primary -->

<?php htdms_theme_footer(); ?>