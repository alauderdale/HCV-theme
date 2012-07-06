	<?php /* Template Name: Port Companies
	 */ ?>
	 <?php get_header(); ?>
	<div class="heading">
		<div id="heading-inner">
			<h2><?php the_title(); ?></h2>
		</div><!--end heading-inner-->
	</div><!--end heading-->
	<div id="container">
		<div id="page">
		<?php
		
		 $loop = new WP_Query( array( 'post_type' => 'port_company', 'posts_per_page' => 50 ) ); ?>
		
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="port-company">
				<?php if ( has_post_thumbnail()) : ?>
				<div class="port-thumb">
					  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
					  <?php the_post_thumbnail(); ?>
					  </a>
				 </div><!--end port-thumb-->
				  <?php endif; ?>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>"><span class="plus">+</span> view</a>
			</div><!--end port-company-->
			<?php endwhile; ?>
		</div><!--end page-->
	</div><!--end container-->
	<div class="clearfix"></div>
	<?php get_footer(); ?>

