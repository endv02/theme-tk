<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FAU
 * @since FAU 1.0
 */

global $options; 
?>

<section id="hero" class="hero-small">
	<div class="container">
		<div class="row">
			<div class="span8">
				
			    <?php
				fau_breadcrumb(); ?>
				 

				<h1><?php if(is_home()) {
                                    echo get_the_title(get_option('page_for_posts')) ;
                                } else {
                                    single_cat_title();
                                } ?></h1>
				
				<!-- <div class="hero-meta-portal"> -->
					<?php
//					    if(get_post_type() == 'post') {
//						echo $options['title_hero_post_categories'];
//					    }
					?>
				<!-- </div> -->
			</div>
		</div>
	</div>
</section>
