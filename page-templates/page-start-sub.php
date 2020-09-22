<?php
/**
 * Template Name: Startseite großes Bild
 *
 */
get_header();
global $options;
?>

<section id="hero" class="hero-small">
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php if ($options['advanced_page_start_herojumplink']) { ?>
                    <a href="#content" class="hero-jumplink-content"></a>
                <?php } ?>
            </div>
        </div>
    </div>
</section> <!-- /hero -->

<div id="content">
    <div class="container">
        <div class="row">
            <div class="span12">	    
                <?php
                wp_reset_postdata();
                wp_reset_query();
                ?>

                <main>
                    <?php
                    if (has_post_thumbnail()) {
                        ?>
                        <div class="startimg">
                            <?php
                            the_post_thumbnail('full');
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="startdesc">
                        <?php
                        the_content();
                        ?>
                    </div>

                    <?php
                    $number = 0;
                    $max = $options['start_max_newspertag'];
                    $maxall = $options['start_max_newscontent'];

                    if ($maxall > 0) {

                        $displayedposts = array();
                        for ($j = 1; $j <= 3; $j++) {
                            $i = 0;
                            $thistag = $options['start_prefix_tag_newscontent'] . $j;
                            $query = new WP_Query('tag=' . $thistag);

                            while ($query->have_posts() && ($i < $max) && ($number < $maxall)) {
                                $query->the_post();
                                echo fau_display_news_teaser($post->ID);
                                $i++;
                                $number++;
                                $displayedposts[] = $post->ID;
                            }
                            wp_reset_postdata();
                            wp_reset_query();
                        }
                        if (($number == 0) || ($number < $maxall)) {

                            if ($number < $maxall) {
                                $num = $maxall - $number;
                                if ($num <= 0) {
                                    $num = 1;
                                }
                                if (isset($options['start_link_news_cat'])) {
                                    $query = new WP_Query(array('post__not_in' => $displayedposts, 'posts_per_page' => $num, 'has_password' => false, 'post_type' => 'post', 'cat' => $options['start_link_news_cat']));
                                } else {
                                    $query = new WP_Query(array('post__not_in' => $displayedposts, 'posts_per_page' => $num, 'has_password' => false, 'post_type' => 'post'));
                                }
                            } else {
                                $args = '';
                                if (isset($options['start_link_news_cat'])) {
                                    $args = 'cat=' . $options['start_link_news_cat'];
                                }
                                if (isset($args)) {
                                    $args .= '&';
                                }

                                $args .= 'post_type=post&has_password=0&posts_per_page=' . $options['start_max_newscontent'];
                                $query = new WP_Query($args);
                            }
                            while ($query->have_posts()) {
                                $query->the_post();
                                echo fau_display_news_teaser($post->ID);
                                wp_reset_postdata();
                            }
                        }
                    }
                    ?>
                </main>	
            </div>

        </div> <!-- /row -->


    </div> <!-- /container -->
    <?php get_template_part('footer', 'social'); ?>	

</div> <!-- /content -->

<?php
get_footer();

