<?php 


    if (class_exists( 'FAUPersonWidget' ) ) :
	$sidebar_personen = get_post_meta( $post->ID, 'sidebar_personen', true );
	$sidebar_title_personen = get_post_meta( $post->ID, 'sidebar_title_personen', true );	
	if(isset($sidebar_personen) && !empty($sidebar_personen))  { 
	   $persons = $sidebar_personen;
	   if (!empty($sidebar_title_personen)) {
		echo '<h2>'.$sidebar_title_personen.'</h2>';
	   } else {
	       echo '<br>';
	   }
	   foreach($persons as $person) {
		the_widget('FAUPersonWidget', array('id' => $person, 'bild' => 0)); 		   
	   } 
       } 
 endif;