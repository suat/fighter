<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fighter
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
		<?php endif; // end footer widget area ?>
		<div class="site-info">
			<?php printf( __( 'Theme: %1$s by %2$s.', 'fighter' ), 'Fighter', '<a href="http://www.mydizayn.org" rel="designer">My Dizayn</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>