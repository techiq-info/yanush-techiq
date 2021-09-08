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

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			

			

<ul class="csList">
<?php
$side=1;
$num=1;
query_posts($query_string . '&order=menu_order&order=ASC'); 
while (have_posts()) : the_post();


	?>
    <li <?php if(get_field('sold')&&$side==1){echo 'class="soldLeft"';}else if(get_field('sold')&&$side==0){echo 'class="soldRight"';}else{echo 'class="notSold"';};?>>
<a href="<?php the_field('link');?>">
<?php //if($side==1){
	?>
   
<div class="featureInfo">

    <div class="featureInfoTable">
            <div class="featureInfoTableCell">
<span class="csTitle"><?php the_field('yz_sale_top_title'); ?></span>

<h2><?php the_field('yz_sale_lobby_title'); ?></h2>

<p><?php the_field('yz_sale_lobby_summary'); ?></p>

</div>
</div>
</div>


 <div class="featureImage" style="background-image:url(<?php the_field('yz_sale_landscape_image');?>);">
 
 <img src="<?php the_field('feature_icon',$term);?>" alt="<?php echo $term->name; ?>" class="leftIcn">
 </div>
    <?php
//$side=0;}else{
		?>
        <!-- <div class="featureImage" style="background-image:url(<?php //the_field('yz_sale_landscape_image');?>);">
          <img src="<?php //the_field('feature_icon',$term);?>" alt="<?php //echo $term->name; ?>" class="rightIcn">

         </div>
        <div class="featureInfo">
        
           <div class="featureInfoTable">
            <div class="featureInfoTableCell">
<span class="csTitle">למכירה</span>

<h2><?php //the_field('yz_sale_lobby_title'); ?></h2>

<p><?php //the_field('yz_sale_lobby_summary'); ?></p>
</div>
</div>
</div>-->
        <?php
		
		//$side=1;}?>

</a>
</li>
    
    <?php
endwhile;

?>
	<li class="padder"></li>
<li class="theFormCon">
<div class="form">
<div class="formLeft">
<h4><?php the_field('sc_head','option')?></h4>
<p><?php the_field('sc_sub','option')?></p>

</div>
<div class="formRight">

<?php echo do_shortcode('[contact-form-7 id="753" title="צור קשר עמוד פרוייקטים למכירה"]');?>

</div>



</div>

</li>

</ul>

					
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_footer();
