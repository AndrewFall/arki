

<div class="dark mb30">
	<?php $count=0;?>

	<?php while( have_posts() ): the_post(); ?>

		<?php if(($count%3) == 0 && $count != 0):?>
				<div class="clear"></div>
			</div>
			<div class="dark mb30">
		<?php endif; ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('column4'); ?>>

		<div class="view view-first">
			<?php the_post_thumbnail('270x211');?>
			<div class="mask">
				<div class="i-icons"> <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>" class="re-details"><i class="fa fa-arrow-circle-o-right"></i></a> </div>
			</div>
		</div>
		<div class="repost-text"> <a href="<?php the_permalink();?>">
			<h4>
				<?php the_title();?>
			</h4>
			</a>
			<p><?php echo _sh_trim( get_the_excerpt(), 25 );?></p>
		</div>
		<ul class="post-tags clearfix">
			<li><a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute(); ?>"><i class="fa fa-comment"></i>
				<?php comments_number('0', '1', '%' );?>
				comments</a></li>
			<li><a href="#"><i class="fa fa-calendar"></i>
				<?php the_time( get_option( 'date_format' ) ); ?>
				</a></li>
		</ul>
	</div>
	<!-- End column4 -->
	
	<?php $count++; endwhile; ?>
</div>