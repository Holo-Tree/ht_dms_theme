<?php
/*
 Template Name: Task
 */


htdms_theme_header(); ?>

	<div id="primary" class="content-area <?php htdms_theme_primary_class(); ?>">
		<main id="main" class="site-main <?php htdms_theme_main_class(); ?>" role="main">

			<?php
				$obj = pods( 'ht_dms_task', get_queried_object_id() );
				echo pods_v( 'ht_dms_task', 'get');
				$task = $obj->field( 'tasks' );
				$blockers = $obj->field( 'tasks.blockers' );
				$blocking = $obj->field( 'tasks.blocking' );

				$y = HoloTree_DMS_Display::init();
				echo $y = view_task( $task, $preview = false, $blockers= null, $blocking= null )

			?>

		</main><!-- #main -->
		<?php htdms_theme_sidebar(); ?>
	</div><!-- #primary -->

<?php htdms_theme_footer(); ?>