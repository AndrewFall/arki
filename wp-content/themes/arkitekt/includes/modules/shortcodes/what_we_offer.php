<?php global $wp_query;
ob_start(); ?>
<div class="service-welcome">
 <h3 class="main-title"><?php echo $title;?></h3>
 <span class="main-subtitle"><?php echo $sub_title;?></span>

 <p> <?php echo $text;?></p>
</div>

<?php 

$output = ob_get_contents();
ob_end_clean(); ?>
