<?php
   /**
    * Template Name: שאלות נפוצות
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */
   
   get_header(); ?>
<script>document.getElementsByTagName("html")[0].className += " js";</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.scss?version=1.1">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css?version=1.1">


<div id="main-content" class="main-content">
   <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main" style="max-width:100%;">
         <?php
            // Start the Loop.
            //while ( have_posts() ) : the_post();
            ?>
         <section class="faqContainer">
            <div class="trb">
               <div class="td fpe bn noCirc" style="background-image:url(<?php the_field('faq_top_img');?>);">
               </div>
               <div class="td boa">
                  <h1><?php the_field('faq_title');?></h1>
               </div>
            </div>
         <!--    <ul>
               <?php
                //   $num=1;
                //   if( have_rows('faqs') ):
                //   while ( have_rows('faqs') ) : the_row();
                  ?>
               <li class="trb">
                  <div class="ib green mq fpe">
                     <div class="table">
                        <div class="td  fNum"><?php 
                        //    if($num<10){
                        //    	echo '0'.$num;
                        //    }else{
                        //    	echo $num;
                        //    }
                           // $num++;?></div>
                        <div class="td green question">
                           <p><?php //the_sub_field('faq_q');?></p>
                        </div>
                     </div>
                  </div>
                  <div class="ib answer">
                     <p><?php //the_sub_field('faq_a');?></p>
                  </div>
               </li>
               <?php
                 // endwhile;
                 // endif;
                  ?>
            </ul>
         </section> -->
         <?php
            //endwhile;
            ?>
    <?php
            //Start the Loop.
            while ( have_posts() ) : the_post();
            ?>
	<section class="cd-faq js-cd-faq container max-width-xxl margin-top-lg margin-bottom-lg">

	<ul class="cd-faq__categories" style="display:none;">
	
	</ul> <!-- cd-faq__categories -->
	<div class="cd-faq__items">
		<ul id="basics" class="cd-faq__group">
		<?php
                  $num=1;
                  if( have_rows('faqs') ):
                  while ( have_rows('faqs') ) : the_row();
                  ?>
						<li class="cd-faq__item">
				<a class="cd-faq__trigger" href="#0"><span><?php the_sub_field('faq_q');?></span></a>
				<div class="cd-faq__content">
          <div class="text-component ib answer">
            <p><?php the_sub_field('faq_a');?></p>
          </div>
				</div> <!-- cd-faq__content -->
			</li>
		<?php
                  endwhile;
                  endif;
                  ?>
		</ul> <!-- cd-faq__group -->

			</div> <!-- cd-faq__items -->

	<a href="#0" class="cd-faq__close-panel text-replace">Close</a>
  
  <div class="cd-faq__overlay" aria-hidden="true"></div>
</section> <!-- cd-faq -->
<?php
            endwhile;
            ?>
</div>
      <!-- #content -->
   </div>
   <!-- #primary -->
</div>
<!-- #main-content -->

<?php
get_footer();
?>
<script src="<?php echo get_template_directory_uri();?>/js/main-faq.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/util.js"></script>