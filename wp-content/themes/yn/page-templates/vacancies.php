<?php
/**
 * Template Name: דרושים
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
		
        <section class="contactTop" style="background-image:url(<?php the_field('c_img','option');?>);">
        
        <h1><?php the_field('contact_page_head','option');?></h1>
        <div class="cc">
        <div class="table nf">
       
       
       
        <div class="table-cell bo">
        <div class="table">
        <div class="table-cell">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/contact_location.svg" alt="כתובת">
        
        </div>
        <div class="table-cell p">
        <b><?php the_field('street','option');?></b>&nbsp;<?php the_field('number','option');?><br>
        <b><?php the_field('city','option');?></b>&nbsp;<?php the_field('zip','option');?>
        </div>
        </div>
        </div>
        
        
        <div class="table-cell bo">
             <div class="table nf">
            <div class="table-cell">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/contact_phone.svg" alt="כתובת">
        
        </div>
		     <div class="table-cell ltr p">
		   <?php the_field('phone','option');?>&nbsp;<b>P</b><br>
        <?php the_field('fax','option');?>&nbsp;<b>F</b>
        </div>
      </div>
        </div>
        
        
        <div class="table-cell bo">
             <div class="table nf">
           <div class="table-cell">
        <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/contact_envelope.svg" alt="כתובת">
        
        </div>
           <div class="table-cell p">
          <a href="mailto:<?php the_field('mail','option');?>"><?php the_field('mail','option');?></a>
          </div>
          </div>
        </div>
        
        
        <div class="table-cell soc">
        
        
        
           
             <?php 
		$defaults = array(
	
	'menu'            => '4',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'topMenu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '<span class="fSep"></span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );
		
		
		?>
            
            
           
            
        
        
        </div>
         </div>
        </div>
        
        </section>        
<section class="dr">
        <h2>דרושים</h2>
        
        
        <ul class="drushim">
        
        <?php

if( have_rows('pos') ):

 	// loop through the rows of data
    while ( have_rows('pos') ) : the_row();
?>
<li>
<a href="mailto:<?php the_sub_field('pos_mail');?>?subject=<?php  the_sub_field('mail_subject');?>">
<div class="pa">
<div class="table">
<div class="table-cell">
<h3><?php the_sub_field('position');?></h3>
<p><?php the_sub_field('pos_desc');?></p>
<h4>דרישות</h4>
<p class="requirments"><?php the_sub_field('req');?><br><u>שליחת קורות חיים</u>

</p>
</div>
</div>
</div>
</a>
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
