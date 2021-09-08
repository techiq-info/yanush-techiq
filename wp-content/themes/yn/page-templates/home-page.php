<?php
   /**
    * Template Name: עמוד הבית
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
         <div class="sidesContent">
            <div class="gath">
               <div class="hb_side unclikced">
                  <div class="hbGal">
                     <?php
                        if( have_rows('hb_home_gallery') ):
                        
                            while ( have_rows('hb_home_gallery') ) : the_row();
                        ?>
                     <div class="hbGalImg unpopulated" data-bgimg="<?php the_sub_field('hb_home_img');?>"></div>
                     <?php
                        endwhile;
                        
                        
                        
                        endif;
                        
                        
                        
                        ?>
                     <div class="hbGalImg" style="background-image:url(<?php the_field('hb_bg_img');?>);"></div>
                  </div>
                  <div class="hb_side_inner">
                     <div class="hbSideOver">
                     </div>
                     <div class="sideContentCell">
                        <div class="contentA">
                           <?php
                              $svgContetn = file_get_contents(get_field('hb_icon'));
                              $sp =  explode("<svg", $svgContetn);
                              		echo '<div class="svgCon"><svg '.$sp[1].'</svg></div>';
                              		?>
                           <h2><?php the_field('hb_title');?></h2>
                           <p><?php the_field('hb_roll_over_text');?></p>
                        </div>
                        <div class="conBCon">
                           <div class="table">
                              <div class="table-cell">
                                 <div class="contentB">
                                    <h2><?php the_field('hb_title');?></h2>
                                    <div class="hpText"><?php
                                       echo get_field('hb_hp_text');?></div>
                                    <div class="additional">
                                       <h3><?php the_field('special_p_title');?></h3>
                                       <ul>
                                          <?php
                                             // check if the repeater field has rows of data
                                             if( have_rows('special_p_list') ):
                                             
                                                 while ( have_rows('special_p_list') ) : the_row();
                                             ?>
                                          <li>
                                             <div class="table">
                                                <div class="td"><img src="<?php the_sub_field('special_p_list_icn');?>"></div>
                                                <p><?php the_sub_field('special_p_list_txt');?></p>
                                             </div>
                                          </li>
                                          <?php
                                             endwhile;
                                             
                                             
                                             
                                             endif;
                                             
                                             ?>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="yz_side unclikced">
                  <div class="yzBdiCon">
                     <div class="bdi table">
                        <p class="tableCell bdir"><?php the_field('bdi_r_t_yz');?></p>
                        <a href="<?php the_field('bdi_link');?>" class="tableCell bdiLogo" title="לאתר BDI" target="_blank"><img src="<?php the_field('bdi_logo_yz');?>" alt="לוגו BDI"></a>
                        <p class="tableCell bdil"><?php the_field('bdi_l_t_yz');?></p>
                     </div>
                  </div>
                  <div class="yzGal">
                     <?php
                        if( have_rows('yz_home_gallery') ):
                        
                            while ( have_rows('yz_home_gallery') ) : the_row();
                        ?>
                     	<div class="yzGalImg unpopulated" data-bgimg="<?php the_sub_field('yz_home_img');?>">
						</div>
                     <?php
                        endwhile;
                        
                        
                        
                        endif;
                        
                        
                        
                        ?>
                     <div class="yzGalImg" style="background-image:url(<?php the_field('yz_bg_img');?>);"></div>
                  </div>
                  <div class="yz_side_inner">
                     <div class="yzSideOver">
                     </div>
                     <div class="sideContentCell">
                        <div class="contentA">
                           <?php
                              $svgContetn = file_get_contents(get_field('yp_iocn'));
                              $sp =  explode("<svg", $svgContetn);
                              		echo '<div class="svgCon"><svg '.$sp[1].'</svg></div>';
                              		?>
                           <h2><?php the_field('yp_title');?></h2>
                           <p><?php the_field('yp_roll_over_text');?></p>
                        </div>
                        <div class="conBCon">
                           <div class="table">
                              <div class="table-cell">
								  	<style>
										  .contentC .movable{
											display: none;
										  }
										  .contentC .active{
											display: block !important;
										  }
										  .contentC h2 {
											display: block;
											margin-top: -5rem;
											}
											.contentC h2, .contentC p {
												text-shadow: 0 -1px 30px rgb(0 0 0);
											}
											.contentC h2 {
												font-size: 6rem;
												position: relative;
												letter-spacing: .6rem;
												color: #fff;
												font-family: almoni-tzar, sans-serif;
											}
									</style>
                                 <div class="contentC" style="display:none">
								 	<!-- <div class="movable"> -->
										<div class="movable active">
											<h2><?php the_field('yp_title');?></h2>
												<div class="hpText"><?php
											echo get_field('yz_hp_text');?></div>
										</div>
										<?php
										
											if( have_rows('yz_home_gallery') ):										
												while ( have_rows('yz_home_gallery') ) : the_row();
											?>
											<div class="movable">
												<h2><?php the_sub_field('yz_home_title');?></h2>
												<div class="hpText"><?php
												echo the_sub_field('yz_home_description');?></div>
											</div>	
											<?php
												endwhile;
												endif;		
										?>
									<!-- </div> -->
                                 </div>
                                 <div class="contentB">
                                    <h2><?php the_field('yp_title');?></h2>
                                    <div class="hpText"><?php
                                       echo get_field('yz_hp_text');?></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mainInfo">
                  <div class="mit">
                     <div class="mitc">
                        <a href=""><img src="<?php the_field('main_logo');?>"></a>
                        <h1><?php the_field('head_title');?></h1>
                        <h2><?php the_field('st_1');?></h2>
                        <h3><?php the_field('st_2');?></h3>
                        <div class="bdicon">
                           <div class="bdi table">
                              <p class="tableCell bdir"><?php the_field('bdi_r_t');?></p>
                              <a href="<?php the_field('bdi_link');?>" class="tableCell bdiLogo" title="לאתר BDI" target="_blank"><img src="<?php the_field('bdi_logo');?>" alt="לוגו BDI"></a>
                              <p class="tableCell bdil"><?php the_field('bdi_l_t');?></p>
                           </div>
                        </div>
                        <div class="bottomLogos">
                           <ul>
                              <?php
                                 if( have_rows('bottom_logos') ):
                                 
                                     while ( have_rows('bottom_logos') ) : the_row();
                                 ?>
                              <li><img src="<?php the_sub_field('p_logo');?>"></li>
                              <?php
                                 endwhile;
                                 
                                 
                                 endif;
                                 
                                 ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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