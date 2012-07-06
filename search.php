<?php get_header(); ?>
<div class="heading">
	<div id="heading-inner">
		<h2>Results for <span class="blue"><?php the_search_query(); ?> </span></h2>
	</div><!--end heading-inner-->
</div><!--end heading-->
<div id="container">
	<div id="main-content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<ul class="post-meta">
				<li><?php the_time('d'); ?> <span><?php the_time('M'); ?> </span><span><?php the_time('Y'); ?></span> - <a href="#"><?php the_category(', '); ?></a></li>
			</ul>
			<?php if ( has_post_thumbnail()) : ?>
			<div class="featuredimg">
				  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				  <?php the_post_thumbnail(); ?>
				  </a>
			 </div><!--end featured img-->
			  <?php endif; ?>
			<div class="the-content">
				<?php the_excerpt(); ?>
			</div><!--end the-content-->
			<ul class="read-more">
			<a href="<?php the_permalink(); ?>">Continue Reading</a>
			</ul>
		</div><!--end post-->
		<?php endwhile; ?>	
		<div class="pagination">
		<p class="older"><?php next_posts_link('Older posts'); ?></p>
		<p class="newer"><?php previous_posts_link('Newer posts'); ?></p>
		</div>
	</div><!--end main content-->		
		<?php else : ?>
			<h3>Sorry!</h3>
				<div class="post">
				<p>
					But your looking for something that isnt here
				</p>
				<p><a href="<?php echo get_option('home'); ?>">Return to the homepage</a></p>
				</div>
			</div>
		<?php endif; ?>	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
			
			
			
			
	