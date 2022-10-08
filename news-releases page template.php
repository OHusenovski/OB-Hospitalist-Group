<?php
/*
 *	Template Name: 04A - News-Releases - Listing - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 04A-news-releases-listing-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="news-content">
	
	<div class="container">
	<div class="row">
		<?php 
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$posts_per_page = 10; //($paged == 1) ? 10 : 8;
			$args = array(
					'post_type' => 'news_releases',
					'posts_per_page' => $posts_per_page,
					'post_status'    => 'publish',
					'orderby' => 'date',
					'order' => 'DESC',
					'paged' => $paged,
				);
			$wp_query = new WP_Query($args);
		?>
		<div class="col-md-8 newsection">
		<?php $counter = 0; ?>
		<?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<?php $counter = $counter + 1; ?>
			<?php if($counter == 1 && $paged == 1) : ?>
			<div class="bigblock col-md-12">
				<div class="newsframe">
					<?php $image = get_field('news_img'); ?>
					<?php if(!$image) $image = get_opt('news_releases_default_image'); ?>
					<?php $size_url = $image['sizes']['large']; ?>
				   	<a href="<?php the_permalink();?>"><div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div></a>	
				   	<h5><?php echo get_the_date('m/d/y'); ?></h5>
				   	<div class="newstxt">
						<a href="<?php the_permalink();?>"><h3><?php echo get_post()->post_title; ?></h3></a>
						<?php
							$post_object = get_post();									
							$post_content = $post_object->post_content;									
						?>
						<?php echo wpautop(excerpt(85,$post_object,$post_content)); ?>
					</div>
					<a href="<?php the_permalink();?>">
					<span class="yellink">More</span>
					</a>
			  	</div>
			</div>
			<?php endif; ?>

			<?php if($counter > 1 && $counter < 4 && $paged == 1) : ?>
			<div class="halfblock col-md-6">
				<div class="newsframe">
					<?php $image = get_field('news_img'); ?>
					<?php if(!$image) $image = get_opt('news_releases_default_image'); ?>
					<?php $size_url = $image['sizes']['large']; ?>
				   	<a href="<?php the_permalink();?>"><div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div></a>	
				   	<h5><?php echo get_the_date('m/d/y'); ?></h5>
				   	<div class="newstxt">
						<a href="<?php the_permalink();?>"><h3><?php echo get_post()->post_title; ?></h3></a>
						<?php
							$post_object = get_post();									
							$post_content = $post_object->post_content;									
						?>
						<?php echo wpautop(excerpt(22,$post_object,$post_content)); ?>
					</div>
					<a href="<?php the_permalink();?>"><i class="fa fa-plus"></i></a>
			  	</div>
			</div>
			<?php endif; ?>

			<?php if($counter >= 4 || $paged > 1) : ?>
			<div class="circblock col-md-12">
				<div class="newsframe">
					<div class="col-md-2">
						<?php $image = get_field('news_img'); ?>
						<?php if(!$image) $image = get_opt('news_releases_default_image'); ?>
						<?php $size_url = $image['sizes']['large']; ?>
						<a href="<?php the_permalink();?>">
					   	<div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div>
					   	</a>
				   	</div>
				   	<div class="col-md-10">
					   	<h5><?php echo get_the_date('m/d/y'); ?></h5>
					   	<div class="newstxt">
					   		<a href="<?php the_permalink();?>">
							<h3><?php echo get_post()->post_title; ?></h3>
							</a>
							<?php
								$post_object = get_post();									
								$post_content = $post_object->post_content;									
							?>
							<?php echo wpautop(excerpt(25,$post_object,$post_content)); ?>
						</div>
					</div>
			  	</div>
			</div>
			<?php endif; ?>

			
		<?php endwhile; endif; ?>

		<div class="col-md-12 site-navigation">
			<?php
				if (function_exists(custom_pagination)) {
				   	echo custom_pagination($wp_query->max_num_pages,"",$paged);
				} ?>
			<?php wp_reset_postdata(); ?>	
		</div>

		</div>

		<div class="col-md-4 rightsection">
			<?php include_locate( 'template-parts/sidebar-search.php' ); ?>
			<?php include_locate( 'template-parts/sidebar-newsrelease.php' ); ?>
			<!-- <?php include_locate( 'template-parts/sidebar-newsrelease-categories.php' ); ?> -->
			<?php include_locate( 'template-parts/sidebar-other.php' ); ?>
		</div>
		
	</div><!--.row-->

	</div>	

</div><!-- #news-content -->



<?php get_footer(); ?>