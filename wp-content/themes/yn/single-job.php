<?php


get_header(); ?>

<div id="main-content" class="main-content">



	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>

            
       <div class="drushimGrdid singleFlex">
           
           
         <ul class="mobileNav">
             
             <li><button data-index="dets" class="active">תיאור משרה</button></li>     
             <li><button data-index="form">הגש מועמדות</button></li>     
             
           </ul>
           
           
           
        <div class="jobDets">
            <a class="goBackToJobs" href="<?php echo get_permalink(2715);?>">צפה בכל המשרות</a>
            <h1><?php the_title();?></h1>
            
            <div class="jobText">
                <p><?php echo returnMeta('top_pa');?></p>
                <h2><?php echo returnMeta('jobdestitle');?></h2>
                <?php echo returnMeta('pos_desc');?>
                <p><b><?php echo returnMeta('btext');?></b></p>
                
                
                <p>שתפו משרה!</p>
                <div class="shareJobArea">
                <button id="productFbShare" class="fbShare" aria-label="שתף בפייסבוק"></button>
                <a href="whatsapp://send?text=<?php echo home_url( $wp->request );?>" class="whatsapp" data-action="share/whatsapp/share" aria-label="share on whatsap" aria-label="שתף בווטסאפ"></a>
                <button aria-label="שתף בלינקדאין" id="productInShare" class="inShare"></button>
                </div>
            </div>
           </div>
           
           
           
           <div class="jobForm">
               <h2>הגש מועמדות למשרה</h2>
               <?php echo do_shortcode('[contact-form-7 id="2738" title="טופס משרה חדש"]');?>
               
               
           </div>
           
            </div>
            
<?php
				
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->
<script>
    var jobName = jQuery('h1').text();
    jQuery('#jobName').val(jobName);
</script>
<?php

get_footer();
?>
