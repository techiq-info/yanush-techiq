<?php
/**
 * Template Name: אנחנו
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
				<section>
                <div  class="usTop">
        <h1><b><?php the_field('us_top_bold');?></b>&nbsp;<?php the_field('us_top_regular');?></h1>   
        <div class="table">
        <div class="ib urightP">
        <p><?php the_field('us_top_right_p');?></p> </div>
         <div class="ib uleftP">
          <h2>
		    <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/usqt.svg" class="bl">
		  <?php the_field('us_top_left_p');?>
           <img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/yn/images/usqb.svg">
          </h2> 
          </div>
          </div>
          </div>
          <div class="usBulletsCon">
          <ul class="usBullets">
          
          <?php
		  
if( have_rows('us_top_bullets') ):

    while ( have_rows('us_top_bullets') ) : the_row();
?>
<li><span class="mb"><?php the_sub_field('us_top_bullet');?></span></li>

<?php
    endwhile;



endif;

		  
		  ?>
          
          
          
          </ul>
          </div>
        </section>   
        
       
        <section class="teamArea">
       
         <ul class="teamMembers">
        <?php
		$member=1;
		$bullet=1;
		$adj=1;
		$even=false;
		if( have_rows('us_team_members') ):

    while ( have_rows('us_team_members') ) : the_row();
?>

<?php if($bullet!=2){?>
<li class="clickableMember member <?php if($even==false){echo ' left ';$even=true;}else{echo ' right ';$even=false;}; if($adj==3){echo ' t4';$adj=1;}else{$adj++;};?>" id="member<?php echo $member;?>"><div class="teamMemberImageCon">
<img src="<?php the_sub_field('us_team_member_img_color');?>" class="color">

<img src="<?php the_sub_field('us_team_member_img_bw');?>" class="bw">
</div>
<div class="teamMemberDetailsCon">
<div class="pa">
<div class="table">
<div class="table-cell">
<h3><?php the_sub_field('us_team_member_name');?></h3>
<h4><?php the_sub_field('us_team_member_title');?></h4>
<p><?php the_sub_field('us_team_member_des');?></p>
<p class="addKav"><b>"<?php the_sub_field('us_team_member_cite');?>"</b>&nbsp;(<?php the_sub_field('us_team_member_cited');?>)</p>


<p  class="addKav"><b>פרויקט אהוב במיוחד:</b>&nbsp;<?php the_sub_field('us_team_member_loved_project');?></p>
</div>
</div>
</div>
</div>
</li>
<?php 
$member++;
$bullet++;
} else {
	?>
	<li class="member  mh <?php if($adj==3){echo 't4';$adj=1;}else{$adj++;};?>"> 
     <div class="pa">
    <div class="table teamMemberDetailsCon">
     <div class="table-cell">
    <h2><?php the_field('us_top_team_general');?></h2>
    </div>
    </div>
    </div>
    </li>
    <li class="clickableMember member <?php if($even==false){echo ' left';$even=true;}else{echo ' right';$even=false;}; if($adj==3){echo ' t4';$adj=1;}else{$adj++;};?>" id="member<?php echo $member;?>"><div class="teamMemberImageCon"><img src="<?php the_sub_field('us_team_member_img_bw');?>"  class="bw"><img src="<?php the_sub_field('us_team_member_img_color');?>" class="color"></div>
<div class="teamMemberDetailsCon">
<div class="pa">
<div class="table">
<div class="table-cell">
<h3><?php the_sub_field('us_team_member_name');?></h3>
<h4><?php the_sub_field('us_team_member_title');?></h4>
<p><?php the_sub_field('us_team_member_des');?></p>
<p class="addKav"><b>"<?php the_sub_field('us_team_member_cite');?>"</b>&nbsp;(<?php the_sub_field('us_team_member_cited');?>)</p>


<p  class="addKav"><b>פרויקט אהוב במיוחד:</b>&nbsp;<?php the_sub_field('us_team_member_loved_project');?></p>
</div></div></div></div></li>
	<?php
	$member++;
	$bullet++;
}?>
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
