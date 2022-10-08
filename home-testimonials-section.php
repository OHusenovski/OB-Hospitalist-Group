<?php

dev_comment('tpl-part: home-before-after-gallery');

$args = array(
	'post_type' => 'testimonial',
	'post_status'    => 'publish',
	'meta_key'		=> 'featured',
	'meta_value'	=> true,
	'orderby' => 'date',
	'order' => 'ASC'
);

$slider = get_posts($args);

?>

<section id="home-testimonials-slider">

	<div class="container">

		<h2 class="heading color-green text-center cursive">
			Testimonials
		</h2>

		<?php if ( is_array($slider) && count($slider) ): wdb_use_slick(); ?>
				<div id="testimonials-slider" class="slick-enabled" >

					<?php foreach ($slider as $s => $slide): ?>
						
						<div>
							<p class="text">
								<?php echo get_field('text', $slide->ID); ?>
							</p>
							<p class="author">
								<?php echo get_field('author', $slide->ID); ?>
							</p>
						</div>		
				
					<?php endforeach; ?>

				</div>

			<script>
				(function($){
					$(document).ready(function(){

						$("#testimonials-slider").slick({
							dots: true,
							arrows: false,
							infinite: true,
							slidesToShow: 1,
							slidesToScroll: 1,
							adaptiveHeight: true,
							cssEase: 'linear'
						});

					});

				})(jQuery);
			</script>
		<?php endif ?>

	</div>

</section>