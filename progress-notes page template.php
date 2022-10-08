<?php
/*
 *	Template Name: 28 - Progress - Notes - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 28-progress-notes-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="clinicians-content">
	<div id="prnotes">
	<?php $page_content = $post->post_content;
		if(!empty($page_content)):?>
			<div class="container">
			<div class="row">
				<div class="col-md-12 mb--40">
					<?php echo wpautop($page_content); ?>
				</div>
			</div>
		</div>
		<?php endif;?>
	
		<div class="container">
			<?php 
				$args = array(
						'post_type' => 'progress_note',
						'post_status'    => 'publish',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => -1
					);
				$wp_query = new WP_Query($args);
			?>

			<?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				
			<div class="col-md-3 col-xs-6 fullcol">
			<div class="prnote">
				<?php $file = get_field('attach_file'); ?>
				<?php if( $file ) : ?>
					<a href="<?php echo $file['url']; ?>">
						<?php $image = get_field('progress_img'); ?>
						<?php $size_url = $image['sizes']['large']; ?>
						<div class="progpic" style="background-image: url('<?php echo $size_url; ?>');">
							<?php $year = get_field('add_year'); ?>
							<?php if( $year ) : ?>
								<h5><?php echo $year; ?></h5>
							<?php endif; ?>	
						</div>
					</a>
				<?php endif; ?>	  	
			</div>
			</div>
			<?php endwhile; endif; ?>
		
		</div>	<!-- container -->
	</div>
</div><!-- #content -->



<?php get_footer(); ?>