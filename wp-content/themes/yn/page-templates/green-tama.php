<?php
/**
 * Template Name:תמא ירוקה
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
				<section class="faqContainer">
				
				<div class="trb">
                <div class="td fpe bn noCirc " style="background-image:url(<?php the_field('gtama_top_img');?>);">
                
                
                
                
                
                </div>
				 <div class="td answer top">
                 <h1><?php the_field('gtama_title');?></h1>
                   <h2><?php the_field('gtama_paragraph');?></h2>
                 </div>
                
                
                
                </div>
                
                <div class="bhc">
              <ul class="bulletHead">
              
                              <?php
				$num=1;
				
				
if( have_rows('gtama_data') ):

    while ( have_rows('gtama_data') ) : the_row();
?>
<li class="trb<?php if($num==1){echo ' currentHead';};?>" id="trb<?php echo $num;$num++;?>">
<div class="ib green fpe mobile">
<div class="table thp">
<div class="td  fNum">


<?php
$svgContetn = file_get_contents(get_sub_field('gtama_row_icon'));
$sp =  explode("<svg", $svgContetn);
		echo '<div class="svgConF"><svg '.$sp[1].'</svg></div>';
		?>
        
</div>
<div class="td green question"><h3><?php the_sub_field('gtama_feature_name');?></h3></div>
</div>
</div>
</li>
<?php
  endwhile;



endif;
?>
              
              </ul>  
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
               <ul>
                
                <?php
				
				
				$numt=1;
if( have_rows('gtama_data') ):

    while ( have_rows('gtama_data') ) : the_row();
	$icnUrl = get_sub_field('gtama_row_icon');
?>
<li class="trb prut<?php if($numt==1){echo ' currentPrue';};?>" id="prut<?php echo $numt;$numt++;?>">
<div class="ib green fpe desktop">
<div class="table">
<div class="td  fNum">
<div class="fty">
<div class="table"><div class="table-cell">
<img src="<?php the_sub_field('gtama_row_icon');?>" alt="<?php the_sub_field('gtama_feature_name');?>">
</div></div></div>
</div>
<div class="td green question"><h3><?php the_sub_field('gtama_feature_name');?></h3></div>
</div>
</div>
<div class="ib answer">
<ul class="featuesList">
<?php
if( have_rows('gtama_feature_details') ):

    while ( have_rows('gtama_feature_details') ) : the_row();
	
	?>
    <li><div class="icna" style="background-image:url(<?php echo $icnUrl ?>);"></div><?php the_sub_field('gtama_feature_details_txt');?></li>
    
    <?php
  endwhile;



endif;
?>
</ul>
</div>
</li>

<?php

    endwhile;



endif;
				
				
				
				
				?>
                
				
				</ul>
				</section>
                

<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
