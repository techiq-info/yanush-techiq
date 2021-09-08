<?php
/**
 * Template Name:  בית ייזום ופיתוח
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
<div class="yz_side">
<div class="yzBdiCon">
<div class="bdi table">
	<p class="tableCell bdir"><?php the_field('bdi_r_t_yz');?></p>
	<a href="<?php the_field('bdi_link');?>" class="tableCell bdiLogo" title="לאתר BDI" target="_blank"><img src="<?php the_field('bdi_logo_yz');?>" alt="לוגו BDI"></a>
<p class="tableCell bdil"><?php the_field('bdi_l_t_yz');?></p>
	</div>
</div>
<div class="yzGal">
<?php
if( have_rows('yz_home_gallery') ):
    while ( have_rows('yz_home_gallery') ) : the_row();
?>
<div class="yzGalImg unpopulated" data-bgimg="<?php the_sub_field('yz_home_img');?>"></div>


<?php
    endwhile;
endif;

?>
<div class="yzGalImg" style="background-image:url(<?php the_field('yz_bg_img');?>);"></div>

</div>

<div class="yz_side_inner">
<div class="yzSideOver">


</div>
<div class="sideContentCell">
<div class="contentA">


<?php
$svgContetn = file_get_contents(get_field('yp_iocn'));
$sp =  explode("<svg", $svgContetn);
		echo '<div class="svgCon"><svg '.$sp[1].'</svg></div>';
		?>

        
     <h2><?php the_field('yp_title');?></h2>  
     <p><?php the_field('yp_roll_over_text');?></p>
     </div>
     
     
     
     <div class="conBCon">
<div class="table"><div class="table-cell">
     <div class="contentB">
<h1><?php the_field('yp_title');?></h1>

<div class="hpText"><?php

 echo get_field('yz_hp_text');?></div>
 
 </div>
     
     </div></div>
 </div>
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
