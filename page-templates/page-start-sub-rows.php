<?php
/**
 * Template Name: Startseite Spalten und Infos
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
                    <div class="startrows">
                    <?php
                    the_content();
                    ?>
                        
                        <hr class="wp-block-separator"/>
                        
                                                <?PHP
// =================================
// Script zum Einfügen der Losungen:
// =================================


// Einstellungen:
// ==============

// Bibeltext fett ausgeben: (1 = fett    0 = nicht fett)
$LphpBibeltextFett = 0;

// Stellenangabe als Link zur Internetbibel: (1 = Link    0 = kein Link)
$LphpBibelLink = 0;

// Überschrift einfügen: ("" = keine Überschrift)
$LphpTitelText = "Die Losung für ";

// Datumsangabe allein oder hinter Überschrift:
$LphpTitelDatum = 2;

// mögliche Werte: (Beispiel 04.02.2008)
// 0 = (keine Datumsangabe)
// 1 = "04.02.2008"
// 2 = "Montag, 4. Februar 2008"
// 3 = "4. Februar 2008"

// Doppelpunkt hinter Überschrift / Datum (1 = Doppelpunkt    0 = keiner)
$LphpTitelDoppelpunkt = 1;

// =================================================================
// Den nachfolgenden Code bitte nur ändern, wenn Sie sich auskennen!
// =================================================================

// Datendatei zum aktuellen Jahr ermitteln: 
$LphpDatei = "losungphp" . date("Y") . ".dat";
$LphpPfad = "/wp-content/themes/theme-tk/";
$LphpGesamt = getcwd() . $LphpPfad. $LphpDatei;

// Die Daten aus der Datendatei einlesen:
$LphpFp = @fopen($LphpGesamt,"rb");

if ($LphpFp){
	$LphpTagID = date("z") +1;
	fseek ($LphpFp, ($LphpTagID * 12) - 12);
	$LphpPoLa = fread($LphpFp, 12);
	$LphpPo = intval(substr($LphpPoLa, 0, 6)) -1;
	$LphpLa = intval(substr($LphpPoLa, 6, 6));
	fseek ($LphpFp, $LphpPo);
	$LphpText = fread($LphpFp, $LphpLa);
        $LphpText = utf8_encode($LphpText);
	$Lphp = explode("§", $LphpText);
	fclose($LphpFp);
}

// Variablen für die Datumsangabe in der Überschrift
// Wochentagsname: (z.B.: "Montag")
$LphpWT = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
$LphpWochentagName = $LphpWT[date("w")];

// Monatsname: (z.B.: "Februar")
$LphpM = array("", "Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
$LphpMonatName = htmlentities($LphpM[date("n")]);

// Tag als Zahl: (z.B.: kurz = "4" / lang = "04")
$LphpTagKurz = date("j");
$LphpTagLang = date("d");

// Monat als Zahl: (z.B.: kurz = "2" / lang = "02")
$LphpMonatKurz = date("n");
$LphpMonatLang = date("m");

// Jahr als Zahl: (z.B.: kurz = "08" / lang = "2008")
$LphpJahrKurz = date("y");
$LphpJahrLang = date("Y");

// Bibeltext ggf. Fett:
if($LphpBibeltextFett==1){
	$Lphp[1] = "<b>" . $Lphp[1] . "</b>";
	$Lphp[5] = "<b>" . $Lphp[5] . "</b>";
}

// Stellenangabe ggf. als Link zur Internetbibel
if($LphpBibelLink==1){
	$Lphp[2] = "<a title='Zum Bibeltext' href='" . $Lphp[3] . "' target='_blank'>" . $Lphp[2] . "</a>";
	$Lphp[6] = "<a title='Zum Bibeltext' href='" . $Lphp[7] . "' target='_blank'>" . $Lphp[6] . "</a>";
}

// Überschrift zusammenstellen:
$LphpTitel = "";
if($LphpTitelText != ""){$LphpTitel = htmlentities(trim($LphpTitelText));}

// Datum zusammenstellen:
$LphpDatum = "";
if($LphpTitelDatum <1 or $LphpTitelDatum >3){
	$LphpDatum = "";
}elseif($LphpTitelDatum==1){
	$LphpDatum = $LphpTagLang . "." . $LphpMonatLang . "." . $LphpJahrLang;
}elseif($LphpTitelDatum==2){
	$LphpDatum = $LphpWochentagName  . ", " . $LphpTagKurz . ". " . $LphpMonatName . " " . $LphpJahrLang;
}elseif($LphpTitelDatum==3){
	$LphpDatum = $LphpTagKurz . ". " . $LphpMonatName . " " . $LphpJahrLang;
}

if($LphpTitel != "" and $LphpDatum != ""){$LphpTitel = $LphpTitel . " ";}
$LphpTitel = $LphpTitel . $LphpDatum;
if($LphpTitel != "" and $LphpTitelDoppelpunkt==1){$LphpTitel=$LphpTitel . ":";}

// Titel ausgeben:
//if($LphpTitel != ""){echo $LphpTitel . "<br><br>";}
if($LphpTitel != ""){echo '<p class="ltitel">' . $LphpTitel . '</p>';}

// Losung ausgeben:
// echo '<p class="ltext">' . $Lphp[0] . $Lphp[1] . '</p>'; abgeändert
// echo '<p class="lquelle">' . $Lphp[2] . '</p>';
echo '<p class="losungen">';
echo '<span class="ltext">' . $Lphp[0] . $Lphp[1] . '</span> '; 
echo '<span class="lquelle">(' . $Lphp[2] . ')</span>';
echo '</p>';

// Lehrtext ausgeben:
// echo '<p class="ltext">' . $Lphp[4] . $Lphp[5] . '</p>'; abgeändert
// echo '<p class="lquelle">' . $Lphp[6] . '</p>';
echo '<p class="losungen">';
echo '<span class="ltext">' . $Lphp[4] . $Lphp[5] . '</span> ';
echo '<span class="lquelle">(' . $Lphp[6] . ')</span>';
echo '</p>';

echo ('<p class="lcopyright"><a href="http://www.herrnhuter.de">© Evangelische Brüder-Unität – Herrnhuter Brüdergemeine</a>. <a href="http://www.losungen.de">Weitere Informationen finden sie hier.</a></p>');

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

