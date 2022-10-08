<?php
/*
 *	Template Name: 24 - Team - Template
 */ ?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 24-team-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="team-content">	
	<div class="container">

		<h2 class="text-center">Executive Leadership</h2>

		<?php 
			$args = array(
				'post_type' 	 => 'executive_leadership',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			);
			$posts = get_posts($args);
		?>
		<?php if( $posts ): ?>
			<div class="portraits">
			<?php foreach( $posts as $p) : ?>
				<div class="col-md-4 col-sm-6 col-xs-12 leader">			
					<?php $image = get_field('image',$p->ID); ?>
					<?php $position = get_field('position',$p->ID); ?>
					<?php $size_url = $image['sizes']['large']; ?>
					<a href="<?php the_permalink($p->ID);?>">
						<div class="portrait" style="background-image: url('<?php echo $size_url; ?>')"></div>
						<h4><?php echo get_post($p->ID)->post_title; ?></h4>
						<h5><?php echo $position; ?></h5>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<h2 class="text-center">Clinical Leadership</h2>

		<?php 
			$args = array(
				'post_type' 	 => 'clinical_leadership',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			);
			$posts = get_posts($args);
		?>
		<?php if( $posts ): ?>
			<div class="portraits">
			<?php foreach( $posts as $p) : ?>
				<div class="col-md-4 col-sm-6 col-xs-12 leader">			
					<?php $image = get_field('image',$p->ID); ?>
					<?php $position = get_field('position',$p->ID); ?>
					<?php $size_url = $image['sizes']['large']; ?>
					<a href="<?php the_permalink($p->ID);?>">
						<div class="portrait" style="background-image: url('<?php echo $size_url; ?>')"></div>
						<h4><?php echo get_post($p->ID)->post_title; ?></h4>
						<h5><?php echo $position; ?></h5>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
		<?php endif; ?>	
		
	</div>	
</div><!-- #team-content -->



<?php get_footer(); ?>