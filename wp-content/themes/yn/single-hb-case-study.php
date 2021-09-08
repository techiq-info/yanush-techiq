<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
        
      <!--  <div class="hb_menu closedHbMenu">
<div class="hbMenuTop">
<div class="close">
<div class="closeTable">
<div class="closeTableCell">
<div class="kav fk"></div>
<div class="kav mk"></div>
<div class="kav lk"></div>
</div>

</div>

</div>
<h1>ינושבסקי הנדסה ופיתוח</h1>

</div>
<div class="menuBottom">

<nav class="hb_nav">
<ul>
<?php
$queried_object = get_queried_object();
$theId = get_queried_object_id () ;
 $parentId  = wp_get_post_parent_id( $theId ); 
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
$num=1;
$items = wp_get_nav_menu_items( 2 ); 
$frontpage_id = get_option('page_on_front');


foreach  ($items as $item){
	
	
	
	?>
    
   
    
    <li <?php if($theId == $item->object_id){ echo 'class="currentItem"';}?>><span class="num"><?php echo '0' ; echo $num; $num++;?></span> <a href="<?php echo $item->url  ;?>"><?php echo $item->title; ?></a></li>
    
    <?php
}


?>
</ul>
</nav>
<div class="yzLink">ייזום ופיתוח<span class="leftArr"></span></div>
</div>

</div>
        
        
        -->
        
        
        
        
        
        
        
        
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
<section class="topArea">
<div class="csTopImage" style="background-image:url(<?php the_field('hb_cs_single_top_image');?>);">
<img src="<?php the_field('hb_cs_single_top_image');?>">

</div>

<div class="topDataCon">
<div class="topData">
<div class="topDataTable">
<div class="topDataTableCell">
<div class="wo">
<span class="cst">case study</span>
<h2 class="top"><?php the_title();?></h2>
<h3 class="top"><?php the_field('hb_cs_single_subtitle');?></h3>
<ul class="csfl">
<?php

$terms = wp_get_post_terms($post->ID,'feature');
 foreach ( $terms as $term ) {
?>

<li>
<div class="table">
<div class="table-cell">
<img src="<?php the_field('feature_icon',$term);?>"></div><div class="table-cell"><?php echo $term->name;?></div></div>
</li>

<?php	 
 }

?>
</ul>
</div>
</div>
<div class="topDataTableCell sum">

<span class="titlr">שם הפרוייקט: </span><span class="value"><?php the_field('hb_cs_single_name');?></span><br>
<span class="titlr">תיאור הפרוייקט: </span><span class="value"><?php the_field('hb_cs_single_subtitle_des');?></span><br>
<span class="titlr">אדריכל: </span><span class="value"><?php the_field('hb_cs_single_arch');?></span>
<span class="titlr">פיקוח: </span><span class="value"><?php the_field('hb_cs_single_inspection');?></span>
</div>
</div>
</div>


</div>
</section>



<section class="chalange">

<div class="chalangeData">
<div class="chalangeTable">
<div class="chalangeTableCell rightCh">
<h3>האתגר</h3>
<?php the_field('hb_cs_single_chalange');?>
</div>
<div class="chalangeTableCell leftCh">
<h3>ינושבסקי נענים לאתגר</h3>
<div class="c2"><?php the_field('hb_cs_single_chalange_answer');?></div>

</div>
</div>
</div>

</section>


<section class="bottomArea">
<div class="bottomData">
<div class="bottonDataTable">
<div class="gallery">
<ul class="galCon">
<?php


if( have_rows('hb_cs_single_gallery') ):

    while ( have_rows('hb_cs_single_gallery') ) : the_row();
?>
<div><img src="<?php the_sub_field('hb_cs_single_gallery_img');?>"></div>

<?php
     
    endwhile;

endif;


?>
</ul>
</div>
<div class="quote">
<p><?php the_field('hb_cs_single_qt');?></p>
<p class="qt"><?php the_field('hb_cs_single_qt_name');?></p>
<div class="galNums"></div>
</div>
</div>


</div>


</section>





<section class="moreProjects csMore">
                    <div class="moreProjectsCon">
                    <h3 class="mh">פרוייקטים נוספים בתחום</h3>
                    </div>
                   <ul class="catList">
                    <?php
					$post_objects = get_field('hb_cs_single_more_projects');
					//query_posts( 'posts_per_page=3&&tag_id=15' );
					//while ( have_posts() ) : the_post();
					 foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) 
       setup_postdata($post); 
   
   ?>
   
    <li class="fifty" style="background-image:url(<?php 
   
   $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo $feat_image;
   ?>);">
       
        <a href="<?php the_permalink();?>" class="categoryDesCs">
        <div class="catHover">
         <div class="catHoverTable">
           <div class="catHoverTableCell">
         <h4> <?php the_title();?></h4>
         
        <p><?php the_field('short_description');?> </p>
        <div class="hoverBottom">
        <p class="wp">צפה בפרוייקט<span class="leftArr"></span></p>
        <ul>
        <?php
        $tags = get_the_tags();
		foreach ( $tags as $tag ) {
	?>
    
    <li>
    <?php
	$svgContetn = file_get_contents(get_field('tag_icon',$tag ));
$sp =  explode("<svg", $svgContetn);
		echo '<div class="svgg"><svg '.$sp[1].'</svg></div>';
		echo '<span class="ib"><span class="ty">'.$tag->name.'</span></span>';
		?>
        
	</li>
	
    
    
   
    <?php
}
?>
</ul>
</div>
</div>
 </div>

        </div>
         <div class="categoryDesTable">
          <div class="categoryDesTableCell projectPage csIdle">
         
        <h4> <?php the_title();?></h4>
         
        
        
       </div>
       </div>
       </a>
       </li>
		
		 <?php endforeach; ?>


					
                    </ul>
                    </section>
                    
                    
                    
                    
                    
                    
<?php
				
					
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_footer();
