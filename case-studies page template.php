<?php
/*
 *	Template Name: 19 - Case - Studies - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 19-case-studies-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

	?>

	<div id="clinicians-content">
		<div class="casestudie">

			<div class="container">

				<?php 
				$hospital_name = NULL;
				if(isset($_GET) && $_GET['hospital_name'] != ""){
					$hospital_name = urldecode($_GET['hospital_name']);
				}
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$posts_per_page = 4;

				$args = array(
					'post_type' => 'case-studies',
					'post_status'    => 'publish',
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					);
				if($hospital_name){
					$args['meta_key'] = 'hospital_name';
					$args['meta_value'] = stripslashes($hospital_name);
				}
				$wp_query = new WP_Query($args);
				?>

				<div class="col-md-9 newsection">

					<?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<?php $file = get_field('attach_file'); ?>

						<div class="circblock">
							<div class="newsframe">
								<div class="col-md-3 col-xs-3">
									<?php $image = get_field('case_img'); ?>
									<?php $size_url = $image['sizes']['large']; ?>
									<a href="<?php echo $file['url']; ?>" target="_blank"><div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div>
									</div></a>
									<div class="col-md-9">
										<div class="newstxt">
											<h5>
												<?php
												$post_object = get_post();									
												$post_title = $post_object->post_title;									
												?>
												<?php echo $post_title; ?>
											</h5>
											<div class="textual">
												<?php
												$post_object = get_post();									
												$post_content = $post_object->post_content;									
												?>
												<?php echo wpautop($post_content); ?>
											</div>
										</div>
									</div>
									<?php if( $file ) : ?>
										<a class="fa-wrapper" href="<?php echo $file['url']; ?>" target="_blank"><i class="fa fa-plus"></i></a>
									<?php endif; ?>	
								</div>
							</div>

						<?php endwhile; endif; ?>

						<?php if (function_exists(custom_pagination)) : ?>
							<?php $navigation = custom_pagination($wp_query->max_num_pages,"",$paged); ?>
							<?php if ($navigation) : ?>
								<div class="blogsite-navigation">
									<?php echo $navigation; ?>	    		
								</div>
							<?php endif; ?>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>

					</div>

					<div class="col-md-3 rightsection">
						<?php include_locate( 'template-parts/sidebar-casestudies.php' ); ?>
					</div>

				</div>	<!-- container -->
			</div>
		</div><!-- #casestudies-content -->



		<?php get_footer(); ?>