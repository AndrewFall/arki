<form action="<?php echo home_url(); ?>" id="searchform" method="get">
    <div class="search mb30">
        <input type="text" name="s" data-value="<?php _e('Search Here', SH_NAME); ?>" value="<?php echo get_search_query(); ?>" />
		<input type="submit" value="" id="searchsubmit" />
	</div>
</form>