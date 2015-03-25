<?php global $wp_query;

wp_enqueue_script( array( 'jquery.carouFredSel-6.2.1-packed.js', 'jquery.fancybox-1.3.4.pack.js' ) );

ob_start(); ?>
<?php if( have_posts()):?>

  <div class="recent-work">
  
          <h3 class="main-title"><?php echo $title;?></h3>
          <span class="main-subtitle"><?php echo $sub_title?></span>
          <div class="list_carousel responsive">
              <ul id="foo4">
              
                      <?php while( have_posts() ): the_post(); 
         //$meta = get_post_meta( get_the_id(), 'sh_services_option', true );//printr($meta);?>
                   <?php
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				$url = $thumb['0'];
			?>
                  <li>
                    <div class="view view-sixth">
						  <?php the_post_thumbnail('384x295');?>
						  <div class="mask">
							  <a href="<?php echo $url;?>" data-fancybox-group="group"><i class="fa fa-search"></i></a>
							  <a href="<?php the_permalink();?>"><i class="fa fa-file-o"></i></a>
						  </div>
					  </div>
					  <div class="desc">
						  <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
						  <span><?php echo get_the_term_list(get_the_id(), 'portfolio_category', '', ', '); ?></span>
					  </div>
                  </li>
                  
                      <?php endwhile; ?>
      
              </ul>
              
              <div class="clearfix">
              </div>
              <a id="prev3" class="prev" href="#">&lt;</a>
              <a id="next3" class="next" href="#">&gt;</a>
          </div>
          <!-- End List Carousel -->
      </div>
	<!-- End Recent Works -->

<?php endif; 

$output = ob_get_contents();
ob_end_clean(); ?>
