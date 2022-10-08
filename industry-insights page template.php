<?php
/*
 *	Template Name: 30 - Industry-Insights - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 30-industry-insights-listing-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="news-content">
	<div id="insights">
		
		<div class="container">
			<div class="row">
				<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$posts_per_page = 10; //($paged == 1) ? 10 : 8;
			$args = array(
				'post_type' => 'industry_insight',
				'posts_per_page' => $posts_per_page,
				'post_status'    => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
				'paged' => $paged,
				);
			$wp_query = new WP_Query($args);
			?>

			<?php $topsectext = get_field('top_text'); ?>
			<?php if( $topsectext ) : ?>
				<div class="col-md-12 toptext">
					<?php echo wpautop($topsectext); ?>
				</div>
			<?php endif; ?>

			<div class="col-md-8 newsection">
				<?php $counter = 0; ?>
				<?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

					<div class="circblock col-md-12">
							<div class="newsframe">
								<div class="col-md-2">
									<?php $image = get_field('ins_image'); ?>
									<?php $size_url = $image['sizes']['large']; ?>
									<a href="<?php the_permalink();?>">
										<div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div>
									</a>
								</div>
								<div class="col-md-10 padleft">
									<h5><?php// echo get_the_date('m/d/y'); ?></h5>
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
				<h2 class="sidebar-title">More Topics</h2>

				<div id="sidebar-news">

					<?php $args = array(
						'post_type' => 'industry_insight',
						'posts_per_page'    => -1,
						'post_status'    => 'publish',		
						'orderby' => 'date',
						'order' => 'DESC',
						); ?>	
						<?php $posts = get_posts($args); ?>
						<ul>
							<?php foreach ($posts as $p): ?>
								<li>
									<a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				
			</div><!--.row-->

		</div>	

	</div>
</div><!-- #news-content -->



<?php get_footer(); ?>