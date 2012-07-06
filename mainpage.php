<?php /* Template Name: Home
 */ ?>

<?php get_header(); ?>
	<div class="slider-contain">
		<div class="flexslider">
		  <ul class="slides">
		  	<li>
		  		<img src="<?php bloginfo('template_url'); ?>/images/slider_test.jpeg" />
		  	</li>
		<?php
		
		 $loop = new WP_Query( array( 'post_type' => 'port_company', 'posts_per_page' => 50 ) ); ?>
		
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					  	
				<?php if ( get_post_meta($post->ID, '_cd_opengraph_image', true) ) : ?>
						<li style="background-color:<?php echo get_post_meta($post->ID, '_cd_opengraph_desc', true) ?> ;">
				       <a href=" <?php the_permalink(); ?> "><img src="<?php echo get_post_meta($post->ID, '_cd_opengraph_image', true) ?>"></a>
				       </li>
				<?php endif; ?>
					  	
			<?php endwhile; ?>

		  </ul>
		</div>
	</div>
<div class="clearfix"></div>
<div class="heading">
	<div id="heading-inner">
		<h2>Welcome to <span class="blue">High Country Venture</span> of Boulder, CO</h2>
		<p class="small-text">We Have a Passion for Technology, Innovation and Entrepreneurship.</p>
	</div><!--end heading-inner-->
</div><!--end heading-->
<div id="container">
	<div id="page">
		<div class="quicklinks">
			<section>
			<h5>Our mission</h5>
			<p>High Country Venture invests in the most promising and innovative early stage companies in Colorado.</p>
			<a href="http://highcountryventure.com/newsite/wordpress/?page_id=2"><span class="plus">+</span> More Details</a>
			</section>
			<section>
			<h5>HCV History</h5>
			<p>High Country Venture, LLC (HCV) was
			founded in 2005  by principals affiliated
			with the private investment company
			Tango.</p>
			<a href="http://highcountryventure.com/newsite/wordpress/?page_id=2"><span class="plus">+</span> More Details</a>
			</section>
			
			<section>
			<h5>Investment Strategy</h5>
			<p>HCV manages approximately $50mm
			in venture funds  and invests primarily
			in the areas of life sciences and IT</p>
			<a href="http://highcountryventure.com/newsite/wordpress/?page_id=21"><span class="plus">+</span> More Details</a>
			</section>			
		</div><!--end quicklinks-->
		</div><!--end page-->
	</div><!--end container-->
	<div class="clearfix"></div>
	<?php get_footer(); ?>
			
			
			
			
	