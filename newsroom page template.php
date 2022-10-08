<?php
/*
 *	Template Name: 03 - Newsroom - Template
 */ ?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

wdb_use_slick();

dev_comment('tpl: 03-newsroom-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="newsroom-content">

	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
	<?php the_post();  ?>

	<div class="container">
		<p><?php the_content(); ?></p>

		<div class="blulinks">
		<?php 
		$roomlinks = get_field('roomlinks');
		$link = $roomlinks['link1'];
		if( $link ): ?>
		<div class="col-sm-4 blubtn">
			<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
				<p><?php echo $link['title']; ?></p>
			</a>
		<?php endif; ?>
		</div>
		
		<?php $link = $roomlinks['link2'];
		if( $link ): ?>
		<div class="col-sm-4 blubtn">
			<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
				<p><?php echo $link['title']; ?></p>
			</a>
		<?php endif; ?>
		</div>

		<?php $link = $roomlinks['link3'];
		if( $link ): ?>
		<div class="col-sm-4 blubtn">
			<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
				<p><?php echo $link['title']; ?></p>
			</a>
		<?php endif; ?>
		</div>

		<?php endwhile; ?>
		<?php endif; ?>
		</div>
		
	</div>	<!-- container -->

	<?php 
		$args = array(
				'post_type' => 'news',
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
			);
		$slider = get_posts($args);
	?>

	<div class="greypartition">
	<div class="container">
		<section id="newsroom-news">	
			<h2 class="text-center">
				In The News
			</h2>

			<?php if ( is_array($slider) && count($slider) ): wdb_use_slick(); ?>

				<div id="news-slider" class="slick-enabled">
				<?php foreach ($slider as $s => $slide): ?>
					<div class="halfblock">
					<div class="newsframe">
						<?php $image = get_field('news_img',$slide->ID); ?>
						<?php if(!$image) $image = get_opt('news_default_image'); ?>
						<?php $size_url = $image['sizes']['medium']; ?>
					   	<a href="<?php the_permalink($slide->ID);?>"><div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div></a>	
					   	<h5><?php echo get_the_date('m/d/y',$slide->ID); ?></h5>
					   	<div class="newstxt">
							<a href="<?php the_permalink($slide->ID);?>"><h3><?php echo get_post($slide->ID)->post_title; ?></h3></a>
							<?php
								$post_object = get_post($slide->ID);									
								$post_content = $post_object->post_content;									
							?>
							<?php echo wpautop(excerpt(17,$post_object,$post_content)); ?>
						</div>
						<a href="<?php the_permalink($slide->ID);?>"><i class="fa fa-plus"></i></a>
				  	</div>
				  	</div>
				 <?php endforeach; ?>
				</div>

			<script>
					(function($){
						$(document).ready(function(){

							$("#news-slider").slick({
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
			
			<?php endif; ?>

			<div class="centered">
				<a href="https://www.obhg.com/news-listings/">All News</a>
			</div>
		</section>
	</div>
	</div>
		

	<?php 
		$args = array(
				'post_type' => 'news_releases',
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
			);
		$slider = get_posts($args);
	?>

	<div class="container">
		<section id="newsroom-releases">	
			<h2 class="text-center">
				News Releases
			</h2>

			<?php if ( is_array($slider) && count($slider) ): wdb_use_slick(); ?>

				<div id="releases-slider" class="slick-enabled">
				<?php foreach ($slider as $s => $slide): ?>
					<div class="halfblock">
					<div class="newsframe">
						<?php $image = get_field('news_img',$slide->ID); ?>
						<?php if(!$image) $image = get_opt('news_releases_default_image'); ?>
						<?php $size_url = $image['sizes']['medium']; ?>
					   	<a href="<?php the_permalink($slide->ID);?>"><div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div></a>	
					   	<h5><?php echo get_the_date('m/d/y',$slide->ID); ?></h5>
					   	<div class="newstxt">
							<a href="<?php the_permalink($slide->ID);?>"><h3><?php echo get_post($slide->ID)->post_title; ?></h3></a>
							<?php
								$post_object = get_post($slide->ID);									
								$post_content = $post_object->post_content;									
							?>
							<?php echo wpautop(excerpt(17,$post_object,$post_content)); ?>
						</div>
						<a href="<?php the_permalink($slide->ID);?>"><i class="fa fa-plus"></i></a>
				  	</div>
				  	</div>
				 <?php endforeach; ?>
				</div>

			<script>
					(function($){
						$(document).ready(function(){

							$("#releases-slider").slick({
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
			
			<?php endif; ?>

			<div class="centered">
				<a href="https://www.obhg.com/news-releases/">All News Releases</a>
			</div>

		</section>	
	</div>	<!-- container -->	
	
</div><!-- #newsroom-content -->



<?php get_footer(); ?>