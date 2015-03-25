<?php 
get_header(); ?>
<?php global $current_user, $post;
get_currentuserinfo();

$meta = get_user_meta( $current_user->ID, '_os_product_wishlist', true );
$meta = array_filter( (array)$meta );
$meta_settings = get_post_meta($post->ID, 'sh_post_meta', true); 
$meta_setting = sh_set( $meta_settings, 'sh_post_options' ); 
$page_banner = sh_set( sh_set($meta_setting, 0), 'page_banner'); ?>

<div class="category-full-image"> 
    <ul class="category-slider">
    	<li> <img src="<?php echo ($page_banner)? $page_banner : get_template_directory_uri()."/media/page-title-bg.jpg";?>" ></li>
    </ul>
</div>

<section  id="columns" class="container_9 clearfix col2-right"> 
    <div class="container_9 title-container">
        <div class="page-title first-bg"> <?php echo get_the_title(); ?> </div>
        <?php echo get_the_breadcrumb(); ?>
    </div>
    <section  id="columns" class="container_9 clearfix col2-right"> 
        
        <!-- Center -->
        <article id="center_column" class=" grid_5">
           
		   <?php while( have_posts() ): the_post(); ?>
				<?php the_content();?>
           <?php endwhile;?>
           
           <?php if( is_user_logged_in() ): ?>
                       
            <div class="block-center" id="block-history">
                <table class="std data-table table">
                    
                    <thead>
                        <tr>
                            <th class="first_item"><?php _e('Image', SH_NAME); ?></th>
                            <th class="first_item"><?php _e('Name', SH_NAME); ?></th>
                            <th class="item mywishlist_second"><?php _e('Direct Link', SH_NAME); ?></th>
                            <th class="last_item mywishlist_first"><?php _e('Delete', SH_NAME); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach( (array)$meta as $met ): ?>
                        
                            <tr id="wishlist_3">
                                <td style="width:50px;">
                                    <?php echo get_the_post_thumbnail( $met, array(50, 50) ); ?>
                                </td>
                                <td style="width:200px;">
                                    <a href="<?php echo get_permalink( $met ); ?>"><?php echo get_the_title( $met ); ?></a>
                                </td>
                                <td><a href="<?php echo get_permalink( $met ); ?>"><?php _e('View', SH_NAME); ?></a></td>
                                <td class="wishlist_delete">
                                    <a class="" rel="product_del_wishlist" data-id="<?php echo $met; ?>" href="javascript:;"><?php _e('Delete', SH_NAME); ?></a>
                                </td>
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                    
                </table>
            </div>
           <?php else: ?>
           
				<?php $acc_page = get_option('user_account_url'); ?>
           		<h2><?php printf(__('To view this page sign in at <a href="%s" title="Account Page">Account Page</a>', SH_NAME), $acc_page); ?></h2>
           <?php endif; ?>
        </article>
        
        <aside id="right_column" class="column grid_2 omega">
			<?php dynamic_sidebar( sh_set(sh_set($meta_setting,0), 'sidebar', 'default-sidebar') ); ?>
        </aside>

	</section>
    
</section>

<?php get_footer(); ?>

