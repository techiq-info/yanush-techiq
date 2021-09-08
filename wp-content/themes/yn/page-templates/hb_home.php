<?php
/**
 * Template Name: הנדסה ובנין בית
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
			$the_query = new WP_Query( 'page_id=36' );

				// Start the Loop.
				while ( $the_query->have_posts() ) :
		$the_query->the_post();
?>
<div class="sidesContent">






















<div class="gath">

<div class="hb_side openedSide">
<div class="hbGal">

<?php
if( have_rows('hb_home_gallery') ):

    while ( have_rows('hb_home_gallery') ) : the_row();
?>

<div class="hbGalImg unpopulated" data-bgimg="<?php the_sub_field('hb_home_img');?>"></div>


<?

    endwhile;



endif;



?>
<div class="hbGalImg" style="background-image:url(<?php the_field('hb_bg_img');?>);"></div>

</div>
<div class="hb_side_inner">
<div class="hbSideOver">


</div>
<div class="sideContentCell">
<div class="contentA">
<?php
$svgContetn = file_get_contents(get_field('hb_icon'));
$sp =  explode("<svg", $svgContetn);
		echo '<div class="svgCon"><svg '.$sp[1].'</svg></div>';
		?>
<h2><?php the_field('hb_title');?></h2>

<p><?php the_field('hb_roll_over_text');?></p>
</div>
<div class="conBCon">
<div class="table"><div class="table-cell">
<div class="contentB">
<h2><?php the_field('hb_title');?></h2>

<div class="hpText"><?php

 echo get_field('hb_hp_text');?></div>
 <div class="additional">
 <h3><?php the_field('special_p_title');?></h3>
   <ul>
   
   
   <?php

// check if the repeater field has rows of data
if( have_rows('special_p_list') ):

    while ( have_rows('special_p_list') ) : the_row();
?>
<li><div class="td"><img src="<?php the_sub_field('special_p_list_icn');?>"></div><p><?php the_sub_field('special_p_list_txt');?></p></li>

<?php

    endwhile;



endif;

?>

   
   
   
   </ul>
 
 </div>
 </div>
</div>
</div></div>
</div>
</div>
</div>


</div>
</div>
<?php
				
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
