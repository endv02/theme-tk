<?php
/**
 * Template Name: Startseite Modifiziert
 *
 * @package WordPress
 * @subpackage FAU
 * @since FAU 1.0
 */

get_header();
global $options;


?>

	<section id="hero" class="hero-small">
        <div class="container">
		<div class="row">
			<div class="span12">
			    <?php 
//			    $copyright = '';
//			    if (isset($options['startseite_banner_image_id']) && ($options['startseite_banner_image_id']>0)) {
//				$imagedata = wp_get_attachment_image_src( $options['startseite_banner_image_id'], 'herobanner' );
//				
//				$slidersrcset =  wp_get_attachment_image_srcset($options['startseite_banner_image_id'],'herobanner');
//				
//				if ($imagedata) {
//				    $image = '<img src="'.fau_esc_url($imagedata[0]).'" width="'.$imagedata[1].'" height="'.$imagedata[2].'" alt=""';
//				    if ($slidersrcset) {
//					$image .= 'srcset="'.$slidersrcset.'"';
//				    }
//				    $image .= '>';
//				    
//				}
//				$imgdata = fau_get_image_attributs($options['startseite_banner_image_id']);
//				$copyright = trim(strip_tags( $imgdata['credits'] ));
//			    } elseif ($options['startseite_banner_usedefault']) {
//				$image = '<img src="'.fau_esc_url($options['default_startseite-bannerbild-image_src']).'" width="'.$options['default_startseite-bannerbild-image_width'].'" height="'.$options['default_startseite-bannerbild-image_height'].'" alt="">';	
//			    } else {
//				$image = '';
//			    }
//			    echo $image."\n"; 
//			    if (($options['advanced_display_hero_credits']==true) && (!empty($copyright))) {
//				echo '<p class="credits">'.$copyright."</p>";
//			    } 
			    ?>
				    
						<?php 
//					       $header_image = get_header_image();
//						if (!empty( $header_image ) ){	
//						    echo "<h1>". get_bloginfo( 'title' ). "</h1>\n";
//						}
//						$desc = trim(strip_tags(get_bloginfo( 'description' )));
//						if (!empty($desc)) {
//						    if (!empty( $header_image ) ){	
//							echo "<br>";
//						    }
//						     echo '<p class="description">'.$desc."</p>";
//						}
						?>

				<?php if ($options['advanced_page_start_herojumplink']) { ?>
				    <a href="#content" class="hero-jumplink-content"></a>
				<?php } ?>

			     </div>

	
				    
		    </div>
		</div>
	
		
	</section> <!-- /hero -->

<?php while ( have_posts() ) : the_post(); ?>

     
        
        <div id="content">
            <div class="container">


                <div class="row">
                    <div class="span12">
                        <main>				   					
                            <?php
					if(has_post_thumbnail()) {
                                            
                                            ?>
                            <div class="startimg">
                                <?php 
                                            the_post_thumbnail('full');
                                            ?>
                            </div>
                            <div class="startdesc">
                                <?php 
                                        }
             
					//get_template_part('sidebar', 'inline'); 
					the_content(); ?>
                                </div>
                        </main>	
                    </div>

                </div> <!-- /row -->
            </div> <!-- /container -->
            <?php get_template_part('footer', 'social'); ?>	

        </div> <!-- /content -->
<?php endwhile; ?>
<?php 
get_footer(); 

