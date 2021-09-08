<?php
/**
 * Template Name: שאלות נפוצות2
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">
<?php echo get_page_template(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        
			<?php
			require_once(str_replace(basename(__DIR__) . '/' . basename(__FILE__), '', realpath(__FILE__)) .'yz_menu.php');
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
				<section class="faqContainer">
				
				<div class="trb">
                <div class="td fpe bn noCirc" style="background-image:url(<?php the_field('faq_top_img');?>);">
                
                
                
                
                
                </div>
				 <div class="td">
                 <h1><?php the_field('faq_title');?></h1>
                 </div>
                
                
                
                </div>
               <ul>
                
                <?php
				$num=1;
				
				
if( have_rows('faqs') ):

    while ( have_rows('faqs') ) : the_row();
?>
<li class="trb">
<div class="ib green mq fpe">
<div class="table">
<div class="td  fNum"><?php 
if($num<10){
	echo '0'.$num;
}else{
	echo $num;
}
 $num++;?></div>
<div class="td green question"><p><?php the_sub_field('faq_q');?></p></div>
</div>
</div>
<div class="ib answer"><p><?php the_sub_field('faq_a');?></p></div>
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
