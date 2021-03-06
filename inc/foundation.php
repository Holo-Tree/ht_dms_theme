<?php

if ( ! function_exists( 'htdms_theme_primary_class' ) ) :
/**
 * Sets the classes for #primary
 *
 * @since 0.0.1
 */
function htdms_theme_primary_class( $return = false ) {
	$classes = 'row';

	/**
	 * Override the classes for #primary
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'htdms_theme_primary_class', $classes );

	if ( $return ) {
		return $classes;
	}
	else {
		echo $classes;
	}

}
endif;

if ( ! function_exists( 'htdms_theme_main_class' ) ) :
/**
 * Sets the classes for #main
 *
 * @since 0.0.1
 */
function htdms_theme_main_class( $return = false ) {
	$classes = 'large-9 small-12 columns';
	if ( apply_filters( 'htdms_theme_no_sidebar', false ) === true ) {
		$classes = 'large-12 small-12';
	}

	/**
	 * Override the classes for #main
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'htdms_theme_main_class', $classes );

	if ( $return ) {
		return $classes;
	}
	else {
		echo $classes;
	}

}
endif;

if ( ! function_exists( 'htdms_theme_sidebar_class' ) ) :
/**
 * Sets the classes for #secondary
 *
 * @since 0.0.1
 */
function htdms_theme_sidebar_class( $return = false ) {
	$classes = 'large-3 small-12 columns';

	/**
	 * Override the classes for #secondary
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'htdms_theme_sidebar_class', $classes );

	if ( $return ) {
		return $classes;
	}
	else {
		echo $classes;
	}

}
endif;

if ( ! function_exists( 'htdms_theme_footer_class' ) ) :
/**
 * Sets the classes for .site-footer
 *
 * @since 0.0.1
 */
function htdms_theme_footer_class( $return = false ) {
	$classes = 'row';

	/**
	 * Override the classes for .site-footer
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'htdms_theme_footer_class', $classes );

	if ( $return ) {
	return $classes;
	}
	else {
		echo $classes;
	}

}
endif;

if ( ! function_exists( 'htdms_theme_site_info_class' ) ) :
/**
 * Sets the classes for .site-info
 *
 * @since 0.0.1
 */
function htdms_theme_site_info_class( $return = false ) {
	$classes = 'large-12 small-12';

	/**
	 * Override the classes for .site-info
	 *
	 * @params string $classes Classes to set
	 *
	 * @since 0.0.1
	 */
	$classes = apply_filters( 'htdms_theme_site_info_class', $classes );

	if ( $return ) {
		return $classes;
	}
	else {
		echo $classes;
	}

}
endif;

if ( ! function_exists( 'htdms_theme_foundation_enqueue' ) ) :
/**
 * Enqueue Foundation JS
 *
 * @since 0.0.1
 */
add_action( 'wp_enqueue_scripts', 'htdms_theme_foundation_enqueue', 20 );
function htdms_theme_foundation_enqueue() {
	wp_enqueue_script( 'foundation', get_template_directory_uri().'/js/foundation.min.js', array( 'jquery' ), '5.2.1', true );
}
endif;

if ( ! function_exists( 'htdms_theme_off_canvas' ) ) {
	/**
	 * Off Canvas menus
	 *
	 * @since 0.0.1
	 */
	function htdms_theme_off_canvas() {
		/**
		 *	Whether to use off canvas menu on right side or not.
		 *
		 *  @since 0.0.1
		 */
		if ( apply_filters( 'htdms_theme_use_off_canvas_left', true ) === true ) :

		?><aside class="left-off-canvas-menu menu"><?php
			/**
			 * Use to add content after the left off canvas menu.
			 *
			 * @since 0.0.1
			 */
			do_action( 'htdms_theme_before_off_canvas_left');

			/**
			 * Use off canvas left menu
			 *
			 * @param bool
			 *
			 * @since 0.0.1
			 */
			if ( apply_filters( 'htdms_theme_use_off_canvas_menu_left', true ) === true ) :

				$defaults = array(
					'theme_location'  => 'off-canvas-left',
					'menu'            => '',
					'container'       => 'false',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'off-canvas-list"',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 1,
					'walker'          => ''
				);
				wp_nav_menu( $defaults );
			?>

		<?php
			endif;

				/**
				 * Use to add content after the left off canvas menu.
				 *
				 * @since 0.0.1
				 */
				do_action( 'htdms_theme_after_off_canvas_left');
		?>
			</aside><!--/aside.left-off-canvas-menu -->
		<?php
			endif;
			/**
			 *	Whether to use off canvas menu on right side or not.
			 *
			 * 	@param bool
			 *
			 *  @since 0.0.1
			 */
			if ( apply_filters( 'htdms_theme_use_off_canvas_right', true ) === true ) :
				/**
				 * Use to add content after the right off canvas menu.
				 *
				 * @since 0.0.1
				 */
				do_action( 'htdms_theme_before_off_canvas_right');
		?>

		<aside class="right-off-canvas-menu menu">
			<?php
			$defaults = array(
				'theme_location'  => 'off-canvas-right',
				'menu'            => '',
				'container'       => 'false',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'off-canvas-list"',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 1,
				'walker'          => ''
			);
			wp_nav_menu( $defaults );

			/**
			 * Use to add content after the right off canvas menu.
			 *
			 * @since 0.0.1
			 */
			do_action( 'htdms_theme_after_off_canvas_right');
			?>
		</aside><!--/aside.left-off-canvas-menu -->
	<?php
		endif;
	}
}


/**
 * Output the Offcanvas left widget area
 *
 * Note: will go after the offcanvas menu. To go before remove the action and hook to 'htdms_theme_before_off_canvas_left'
 *
 * @since 0.0.1
 */
if ( apply_filters( 'htdms_theme_use_off_canvas_left', true ) === true ) {
	if ( !function_exists( 'htdms_theme_off_canvas_widgets_left' ) ) {
		add_action( 'htdms_theme_after_off_canvas_left', 'htdms_theme_off_canvas_widgets_left' );
		function htdms_theme_off_canvas_widgets_left() {
			echo '<aside class="offcanvas-widget-area" id="offcanvas-left-widget-area">';
				$widget_area = 'offcanvas-left';
				/**
				 * Override the offcanvas-left widget area.
				 *
				 * @param string $widget_area
				 *
				 * @since 0.0.1
				 */
				$widget_area = apply_filters( 'htdms_theme_offcanvas_left_widget_area', $widget_area );
				dynamic_sidebar( $widget_area );
			echo '</aside><!--#offcanvas-left-widget-area-->';
		}
	} //endif !function_exists
} //endif filter === true

/**
 * Output the Offcanvas right widget area
 *
 * Note: will go after the offcanvas menu. To go before remove the action and hook to 'htdms_theme_before_off_canvas_right'
 *
 * @since 0.0.1
 */
if ( apply_filters( 'htdms_theme_use_off_canvas_right', true ) === true ) {
	if ( !function_exists( 'htdms_theme_off_canvas_widgets_right' ) ) {
		add_action( 'htdms_theme_after_off_canvas_right', 'htdms_theme_off_canvas_widgets_right' );
		function htdms_theme_off_canvas_widgets_right() {
			echo '<aside class="offcanvas-widget-area" id="offcanvas-right-widget-area">';
				$widget_area = 'offcanvas-right';
				/**
				 * Override the offcanvas-right widget area.
				 *
				 * @param string $widget_area
				 *
				 * @since 0.0.1
				 */
				$widget_area = apply_filters( 'htdms_theme_offcanvas_right_widget_area', $widget_area );
				dynamic_sidebar( $widget_area );
			echo '</aside><!--#offcanvas-right-widget-area-->';
		}
	} //endif !function_exists
} //endif filter === true

