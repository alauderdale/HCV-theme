<?php get_header(); ?>
<div class="heading">
	<div id="heading-inner">
		<h2><?php the_title(); ?></h2>
	</div><!--end heading-inner-->
</div><!--end heading-->
<div id="container">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
		<div id="page">
		<?php the_content(''); ?>
		</div><!--end page-->
</div><!--end container-->
		<?php endwhile; ?>	
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
		<div class="clearfix"></div>
	<?php get_footer(); ?>
			
			
			
			
	