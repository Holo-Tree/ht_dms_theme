<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package htdms_theme
 */
?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer <?php htdms_theme_footer_class(); ?>" role="contentinfo">
				<div class="site-info <?php htdms_theme_site_info_class(); ?>">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'htdms_theme' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'htdms_theme' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'htdms_theme' ), 'App Starter', '<a href="http://JoshPress.net/" rel="designer">Josh Pollock</a>' ); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		<a class="exit-off-canvas"></a>

		</div><!--.inner-wrap-->
	</div><!--.off-canvas-wrap-->

</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
