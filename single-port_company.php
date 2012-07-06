	<?php get_header(); ?>
<div class="heading">
	<div id="heading-inner">
		<h2>Portfolio Companies</h2>
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
				 
				  <?php the_post_thumbnail(); ?>

			 </div><!--end featured img-->
			  <?php endif; ?>
			<div class="the-content">
				<?php the_content(); ?>
				<?php if ( get_post_meta($post->ID, 'my_meta_box_text', true) ) : ?>
						<div class="port-website">
				       <a target="_blank" href="<?php echo get_post_meta($post->ID, 'my_meta_box_text', true) ?>"><span class="plus">+</span> View Website</a>
				       </div>
				<?php endif; ?>
				
			</div><!--end the-content-->
		</div><!--end post-->
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
			
			
			
			
	