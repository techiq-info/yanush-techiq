<div  class="arch-item">
						<a href="<?php the_permalink(); ?>"><h1 class="heading1"><?php the_title(); ?></h1></a>

						<div class="blog-date">
							<ul id="article-date">
								<li><?php echo date_i18n( the_date()); ?></li>
								<li><span class="separator">|</span></li>
								<li>
									<?php
									$term_list = wp_get_post_terms($post->ID, 'blog_theme', array("fields" => "all"));
									

					/*get image for category*/

						 $meta_image = $term_list[0]->term_id;

						 switch ($meta_image) {
						 	case 75:
						 		$img = 'http://www.yanush.co.il/wp-content/uploads/2017/01/handasaLogo-3.png';
						 		
						 	break;
						 	case 76:
						 		$img = 'http://www.yanush.co.il/wp-content/uploads/2017/01/yzumUpituahLogo-2.png';
						 	
						 	break;
						 	
						 	default:
						 		$img = 'http://www.yanush.co.il/wp-content/uploads/2017/01/yzumUpituahLogo-2.png';
						 		break;
						 }
						

									echo '<div  align="center" width="24px"><img class="cat-img" src="' . $img . '" alt="' . $img . '" ></div>';?>
								</li>
								<li><?php echo $term_list[0]->name; ?></li>	
							</ul>


						</div>
						<div class="arch-content">
							<div id="blog-img">
						    <?php if ( ( function_exists('has_post_thumbnail') ) && ( has_post_thumbnail() ) ) { 
						        $post_thumbnail_id = get_post_thumbnail_id();
						        $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
						        ?>
						        <div class="post-image">
						            <img title="image title" alt="thumb image" class="wp-post-image" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:auto;">
						        </div>
						    <?php } ?>
						    <div class="articles-content">
								<p>	
									<?php the_excerpt(); ?>	
								</p>
							</div>
							<div><a href="<?php the_permalink(); ?>" class="r-more">קרא עוד</a></div>
						</div>
						</div><!-- / #blog-img-->	
					</div><!-- / .arch-item-->