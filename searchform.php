<?php
/**
* The template for the search form.
*
* @package WordPress
* @subpackage FAU
* @since FAU 1.0
*/
global $options;
?>

<form role="search" method="get" class="searchform" action="<?php echo fau_esc_url(home_url( '/' ))?>">
	<label for="s"><?php _e('Suchen nach...','fau'); ?></label>
	<input type="text" value="<?php the_search_query(); ?>" name="s" placeholder="<?php _e('Suchen nach...','fau'); ?>">
	<?php 
	
	if ($options['search_allowfilter']) {
	    
	    if (is_single()) {
		// Only Posts please :)
		echo '<input type="hidden" name="post_type[]" value="post">'."\n";		
	    } else {
		$listtypes = $options['search_post_types'];
		foreach ($listtypes as $type) {
		    echo '<input type="hidden" name="post_type[]" value="'.$type.'">'."\n";				    
		}
	    }
	    
	    
	}
	?>
	<input type="submit" id="searchsubmit" value="<?php _e('Finden','fau'); ?>">
</form>