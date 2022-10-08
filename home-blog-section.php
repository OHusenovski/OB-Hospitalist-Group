<?php

dev_comment('tpl-part: home-blog-section');

$args = array(
	'post_type' => 'post',
	'post_status'    => 'publish',
	'orderby' => 'date',
	'order' => 'DESC'	
);

$slider = get_posts($args);

?>

<section id="home-blog-section">

	<div class="container">

		<h2 class="heading color-green text-center cursive">
			Blog Updates
		</h2>

		<?php if ( is_array($slider) && count($slider) ): wdb_use_slick(); ?>

			<div id="home-blog-slider" class="slick-enabled" >
				<?php foreach ($slider as $s => $slide): ?>						
					<a href="<?php echo get_the_permalink($slide->ID); ?>" style="display: block;">
						<?php 
							$p = get_post($slide->ID);
							$content = $p->post_content; 
						?>
						<?php $img = get_the_post_thumbnail_url($p,'medium'); ?>
						<?php if(!$img) $img = get_opt('blog_default_image')['url']; ?>
						<div style="background-image: url(<?php echo $img; ?>);" class="slide-img"></div>
						<div class="slide-content">
							<p class="date"><?php echo get_the_date('m/d/y',$slide->ID); ?></p>
							<h4><?php echo get_the_title($slide->ID); ?></h4>
							<p><?php echo excerpt(25,false,strip_shortcodes($content)) ?></p>
							<span class="plus-icon">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>

			<script>
				(function($){
					$(document).ready(function(){

						$("#home-blog-slider").slick({
							dots: false,
							arrows: true,
							infinite: true,
							slidesToShow: 3,
							slidesToScroll: 1,
							adaptiveHeight: true,
							cssEase: 'linear',
							responsive: [
							    {
							      breakpoint: 991,
							      settings: {
							        slidesToShow: 2
							      }
							    },
							    {
							      breakpoint: 768,
							      settings: {
							        slidesToShow: 1,
							        arrows: false,
							        dots: true
							      }
							    }
							  ]
						});

					});

				})(jQuery);
			</script>

		<?php endif ?>

	</div>

</section>