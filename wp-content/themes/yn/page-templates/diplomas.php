<?php
/**
 * Template Name: תעודות
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
	<ul class="certList">
    <?php

if( have_rows('certificates') ):

    while ( have_rows('certificates') ) : the_row();
?>
<li><h2><?php the_sub_field('diploma_name');?></h2>
<a href="<?php the_sub_field('diploma_file');?>" target="_blank">צפה בתעודה<?php
$svgContetn =  file_get_contents(esc_url( home_url( '/' ).'wp-content/themes/yn/images/left_arr.svg'));
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?></a>
</li>

<?php

    endwhile;

 

endif;

?>
    
    
    
    </ul>			
                

<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
