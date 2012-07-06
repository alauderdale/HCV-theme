	<?php get_header(); ?>
<div class="heading">
	<div id="heading-inner">
		<h2>HCV News</h2>
	</div><!--end heading-inner-->
</div><!--end heading-->
<div id="container">
	<div id="main-content">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h1><?php the_title(); ?></h1>
			<ul class="post-meta">
				<li><?php the_time('d'); ?> <span><?php the_time('M'); ?> </span><span><?php the_time('Y'); ?></span></li>
			</ul>
			<?php if ( has_post_thumbnail()) : ?>
			<div class="featuredimg">
				  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				  <?php the_post_thumbnail(); ?>
				  </a>
			 </div><!--end featured img-->
			  <?php endif; ?>
			<div class="the-content">
				<?php the_content(); ?>
			</div><!--end the-content-->
		</div><!--end post-->
		<div class="pagination">
		<p class="older"><?php previous_post_link('%link', '«Previous Post'); ?> </p>
		<p class="newer"> <?php next_post_link('%link', 'Next Post»'); ?>  </p>
		</div>
		<?php endwhile; ?>	
	</div><!--end main content-->
	<?php else : ?>
			<h3>Sorry!</h3>
		<div id="container">
			<div id="main-content">
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
			
			
			
			
	