<?php
/**
 * Template Name: לקוחות ושותפים
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
				
          <section class="capTop">
          <h1><?php the_title();?></h1>
          <h2><?php the_field('partners_sub_title');?></h2>
            <p><?php the_field('partners_paragraph');?></p>
            <ul class="logos">
            <?php

if( have_rows('partners_logos') ):

    while ( have_rows('partners_logos') ) : the_row();
?>

<li><img src="<?php the_sub_field('partners_logo');?>" alt="לוגו לקוח"></li>
<?php

    endwhile;



endif;

?>
            
            
            </ul>
          
          </section>   
          <section class="capBottom">
          <div class="table">
          <?php
		  $catNum=1;
          if( have_rows('par_types') ):

    while ( have_rows('par_types') ) : the_row();
?>

<div class="table-cell partnerName <?php if($catNum==1){echo 'activePartnerName';}?>" id="typeName<?php echo  $catNum; $catNum++;?>">

<div class="table">
<div class="table-cell">
<?php
$svgContetn =  file_get_contents(get_sub_field('ixna'));
$sp =  explode("<svg", $svgContetn);
		echo '<svg '.$sp[1].'</svg>';
		?>
        </div>
        <div class="table-cell">
<h3><?php the_sub_field('par_type_head');?></h3>
<h4><?php the_sub_field('par_type_st');?></h4>
</div>
</div>

</div>
<?php

    endwhile;



endif;

?>
          
          
          
          
          </div>
          
          
       <?php
		  $catNum=1;
          if( have_rows('par_types') ):

    while ( have_rows('par_types') ) : the_row();
?>

<div class="listNames <?php if($catNum==1){echo 'activeListsName';}?>" id="typeList<?php echo  $catNum; $catNum++;?>">
<div class="ib headli">
<div class="ib">
<h3><?php the_sub_field('par_type_head');?></h3>
<h4><?php the_sub_field('par_type_st');?></h4>
</div>
</div>
<div  class="ib list">
<ul>
  <?php
		  
          if( have_rows('par_type_names') ):

    while ( have_rows('par_type_names') ) : the_row();
?>
<li><?php the_sub_field('par_type_name');?></li>
<?php

    endwhile;



endif;

?>

</ul>
</div>
</div>
<?php

    endwhile;



endif;

?>    
          
    
          
          </section>   

<?php



				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php

get_footer();
