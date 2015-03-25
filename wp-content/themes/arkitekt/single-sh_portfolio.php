<?php get_header(); ?>


<div class="head-banner clearfix mb30">
  <div class="wrapper">
	<h4><?php the_title();?></h4>
	<?php echo get_the_breadcrumb(); ?>
	<div class="clear"></div>
  </div>
</div>


<section class="main-content wrapper dark">
    <div class="container clearfix">
        <div class="content column12 clearfix">
            
            <?php while( have_posts() ): the_post(); ?>
            
                <?php $meta = get_post_meta( get_the_id(), 'sh_portfolio_meta', true ); //printr( $meta ); 
				$page_opts = sh_set( sh_set( $meta, 'sh_page_options' ), 0 );
				$p_type = sh_set( sh_set( sh_set( $meta, 'sh_portfolio_type' ), 0 ), 'type' );
				$pull_content = ( sh_set( $page_opts, 'position' ) == 'right' ) ? ' pull-right' : ''; ?>
                
                <div class="column4<?php echo $pull_content; ?>">
                    <div class="portfolio_details">
                        <div class="details_section">
                            
                            <h3><?php _e('Item Details', SH_NAME); ?></h3>
                            	<?php the_content(); ?>
                            <hr>
                            
                            <ul>
                                <li class="version">
									<?php _e( 'Client:', SH_NAME); ?> 
                                	<span><a href="<?php echo esc_url(sh_set( $page_opts, 'demo_link' )); ?>" title="<?php echo sh_set( $page_opts, 'client_name' ); ?>"><?php echo sh_set( $page_opts, 'client_name' ); ?></a></span>
                                </li>
                                
                                <?php if( $skills = sh_set( $meta, 'skills' ) ): ?>
                                	
                                    <li class="update">
                                    	<?php _e('Skills: ', SH_NAME ); ?> 
                                		<span>
                                        	<?php foreach( $skills as $skill ): ?>
                                            	<a href="<?php echo esc_url(sh_set( $skill, 'link' )); ?>" title="<?php echo sh_set( $skill, 'skill' ); ?>"><?php echo sh_set( $skill, 'skill' ); ?></a>,
                                            <?php endforeach; ?>
                                        </span>
                                    </li>
                                    
                                <?php endif; ?>
                                
                                <?php if( $author_name = sh_set( $page_opts, 'author' ) ): ?>
                                	<li><?php _e('Author Name:', SH_NAME ); ?> <span><?php echo $author_name; ?></span></li>
                                <?php endif; ?>
                                <?php if( $author_url = sh_set( $page_opts, 'website' ) ): ?>
                                	<li><?php _e('Author URI:', SH_NAME ); ?> <span><?php echo $author_url; ?></span></li>
                                <?php endif; ?>
                                
                                <li class="release">
									<?php _e('Release Date: ', SH_NAME); ?>
                                    
                                    <?php if( $rel_date = sh_set( $page_opts, 'date' ) ): ?>
                                    	<span><?php echo date(get_option('date_format'), strtotime( $rel_date ) ); ?></span>
                                    <?php else: ?>
                                    	<span><?php the_date(); ?></span>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <!-- details section --> 
                    </div>
                    <!-- theme details --> 
                </div>
                <!-- end col-lg 8 -->
            
                <div class="column8">
                	
                    <?php $attachments = get_posts( array( 'post_type'=>'attachment', 'posts_per_page' => -1, 'post_parent' => get_the_id() ) ); ?>
                    <div class="item_image">
                        <?php if( count( $attachments ) > 1 && $p_type == 'slider' ): ?>
                            <div id="myCarousel" class="carousel slide">
                                <div class="carousel-inner">
                                    
                                    <?php foreach( $attachments as $k => $att ): ?>
                                        <div class="item<?php if( $k == 0 ) echo ' active'; ?>"> 
                                        	<?php echo wp_get_attachment_image( $att->ID, '919x534' ); ?>
                                        </div>
                                        <!-- end item -->
                                    <?php endforeach; ?>

                                </div>
                                <!-- carousel inner --> 
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="icon-prev"></span> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="icon-next"></span> </a> </div>
                        <?php elseif( $p_type == 'video' ): ?>
                        	<?php echo sh_set( sh_set( sh_set( $meta, 'sh_portfolio_type' ), 0 ), 'video' ); ?>
						<?php else: ?>
                        	<?php the_post_thumbnail( '919x534' ); ?>
                        <?php endif; ?>
                        <!-- end carousel --> 
                    </div>
                    <!-- end item_image --> 
                </div>
            <!-- end col-lg 8 -->
            
            <div class="clear"></div>
            <ul class="pager">
            
            	<li class="previous"><?php previous_post_link('%link', '&larr; Older', FALSE); ?></li>
                <li class="nextt"><?php next_post_link('%link', 'Newer &rarr;', FALSE); ?></li>
            </ul>
            
            <?php endwhile; ?>
            <div class="clearfix"></div>
            
        </div>
        <!-- end content --> 
    </div>
    <!-- end container --> 
</section>
<!-- end section -->

<?php get_footer(); ?>