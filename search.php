<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package htdms_theme
 */

htdms_theme_header(); ?>

	<section id="primary" class="content-area <?php htdms_theme_primary_class(); ?>">
		<main id="main" class="site-main <?php htdms_theme_main_class(); ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'htdms_theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php htdms_theme_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php htdms_theme_sidebar(); ?>
<?php htdms_theme_footer(); ?>
