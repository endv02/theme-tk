<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage FAU
 * @since FAU 1.0
 */
global $options;
?>

	</div> <!-- /wrap -->

	<footer id="footer">
		<div class="container">
			<div class="row">

                            <!-- <div class="span3"> -->
                                			<!-- Teil rausgeschmissen -->	
				<!-- </div>
				<div class="span4">
					
				<p itemscope itemtype="http://schema.org/PostalAddress"> -->
				<!-- Teil mit PostalAddress rausgeschmissen -->
                                <!--
			       </p>
	
				</div>
				<div class="span5"> -->
                                <!-- anderer Span wegen anderer Aufteilung -->
                                <div class="span12">
					<?php 
					if ( has_nav_menu( 'meta-footer' ) ) {
					    wp_nav_menu( array( 'theme_location' => 'meta-footer', 'container' => false, 'items_wrap' => '<ul id="footer-nav" class="%2$s">%3$s</ul>' ) ); 
					} else {
					    echo fau_get_defaultlinks('techmenu', 'menu', 'footer-nav');
					}
					?>
				</div>
			</div>
		</div>
	</footer>
	
	<a href="#wrap" class="top-link"><span class="hidden">Nach oben</span></a>

	<?php wp_footer(); ?>
</body>
</html>