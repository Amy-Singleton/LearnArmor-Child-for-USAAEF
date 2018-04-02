<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * Bug Fix on line 33 Changed Footer to footer 3/21/2018
 *
 * @package learnarmor
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer col-sm-12">
		<div id="footer-widgets" class="secondary">
			<div id="footer-sidebar">
				<?php
				if(is_active_sidebar('footer-sidebar')){
					dynamic_sidebar('footer-sidebar');
				}
				?>
			</div><!-- footer-sidebar -->
		</div><!-- footer-widgets -->
		<div id="footer" class="col-sm-6 copyright">
			<p>Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'title' ); ?> <span id="copyright-message"><?php echo get_theme_mod( 'havawebsite_footer_copyright_text' ); ?></span></p>
		</div><!-- #footer -->
		<div class="col-sm-6">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-links') ); ?>
		</div><!-- col-sm-12 -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
