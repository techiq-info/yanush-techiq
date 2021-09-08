<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();

 
 

?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<section class="saleTop">
            <div class="saleGallery">
            <ul class="galCon">
            <?php
			
			if( have_rows('yz_sale_gallery') ):

 	// loop through the rows of data
    while ( have_rows('yz_sale_gallery') ) : the_row();

?>

<li><img src="<?php the_sub_field('yz_sale_gallery_img');?>"></li>
<?php
    endwhile;



endif;
?>
            
            </ul>
            
             </div>
             <div class="topLeftSale">
           <div class="table topH">
           <div class="tr">
            <h2 class="table-cell"><?php $tit = get_field('yz_sale_lobby_title'); echo $tit;?></h2>
              <h3  class="table-cell"><?php the_field('yz_sale_top_p');?></h3>
            </div>
              <div class="table ppar">
              <div class="par">
              <h4><?php the_field('yz_sale_right_p_title');?></h4>
              <p><?php the_field('yz_sale_right_p');?></p>
              <a href="<?php the_field('yz_sale_map_link');?>" target="_blank">מפה</a>
               <div class="galNums"></div>
              </div>
              
               <div class="par">
              <h4><?php the_field('yz_sale_left_p_title');?></h4>
              <p><?php the_field('yz_sale_left_p');?></p>
               <a href="<?php the_field('pdf');?>"  target="_blank">PDF</a>
              </div>
              
              </div>
             
                </div>
           </div>
            
            
            </section>
            <section class="apts">
            <h2>דירות למכירה</h2>
            
            <ul class="aptsName">
             <?php
			$aptNum=1;
			if( have_rows('yz_sale_apts') ):

 	// loop through the rows of data
    while ( have_rows('yz_sale_apts') ) : the_row();

?>

<li class="aptName<?php if($aptNum==1){echo ' currentAptName';} ?>" id="<?php echo 'aptName'.$aptNum; $aptNum++;?>"><h3><?php the_sub_field('yz_sale_apt_name');?></h3></li>
<?php
    endwhile;



endif;
?>
            </ul>
            <ul class="aptdes">
             <?php
			$aptNum=1;
			if( have_rows('yz_sale_apts') ):

 	// loop through the rows of data
    while ( have_rows('yz_sale_apts') ) : the_row();

?>

<li class="aptDet <?php if($aptNum==1){echo ' currentAptDet';} ?>" id="apt<?php echo $aptNum; $aptNum++;?>">
<div class="aptDetTable">
<div class="table-cell lb vat">
<p class="apst"><?php the_sub_field('yz_sale_apt_des');?></p>
<ul class="sepcs tb">
<h4>מפרט טכני</h4>
<?php


$terms = get_sub_field('yz_sale_apt_spcs');
foreach( $terms as $term ): 
  
  
  $rootId = end( get_ancestors(  $term->term_id, 'apt_feature' ) );
  if( $rootId){
	  $root = get_term( $rootId, 'apt_feature' );
?>
<li><h5><?php echo $root->name;?></h5><div class="imgc"><img src="<?php the_field('apt_ftr_icn',$root);?>"></div><p><?php echo $term->name;?></p></li>
<?php
  }else{
	  
	  ?>
	<li><h5><?php echo $term->name;?></h5><div class="imgc"><img src="<?php the_field('apt_ftr_icn',$term);?>"></div></li>
    
    <?php
  }


  ?>
   
   
    
    <?php
endforeach;
?>
</ul>
</div>
<div class="table-cell vat pa">
<?php if( get_sub_field('yz_sale_apt_p')){?>
<div class="tabler bb tt">
<div class="table-cell">
<h4><?php the_sub_field('apt_plan_head');?></h4>
<img src="<?php the_sub_field('yz_sale_apt_p');?>">

</div>
</div>
<?php } ?>
<?php if( get_sub_field('yz_sale_apt_floor_p')){?>
<div class="tabler bt">
<div class="table-cell">
<h4 class="smo"><?php the_sub_field('floor_plan_head');?></h4>
<div class="">
<img src="<?php the_sub_field('yz_sale_apt_floor_p');?>">
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</li>
<?php
    endwhile;



endif;
?>
            
            </ul>
            </section>

			<section class="form">


<div class="formLeft">
<h4><?php the_field('sc_head','option')?></h4>
<p><?php the_field('sc_sub','option')?></p>

</div>
<div class="formRight">

<?php echo do_shortcode('[contact-form-7 id="753" title="צור קשר עמוד פרוייקטים למכירה"]');?>

</div>
</section>

			


					
		</div><!-- #content -->
	</section><!-- #primary -->
<script>
$(window).load(function(e){
	var t = decodeEntities('<?php the_title();?>');
	$('#refProj').val(t);

	function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
}
	});
	</script>
<?php
get_footer();
