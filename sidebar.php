	<div id="sidebar">	
	<form id="search" method="get" action="<?php get_option('home') ?>">
		<fieldset>
			<input type="text" class="search-bar" name="s" id="s" />
			<input type="submit" value="" class="search-btn" />
		</fieldset>
	</form>				
		<ul id="categories">
		<h3> Categories </h3>
			<?php wp_list_categories( 'show_count=0&title_li=&hide_empty=0&exclude=1'); ?>
		</ul>
		<div class="widgets">
			<?php dynamic_sidebar('main sidebar')  ?>
		</div>
	</div><!--end sidebar-->
</div><!--end container-->
<div class="clearfix"></div>	