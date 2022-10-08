<?php
/*
 *	Template Name: 20 - Testimonials - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 20-testimonials-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="testimonials-content">
<div class="container">
	<?php 

		$args = array(
				'post_type' => 'testimonial',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'DESC',
			);
		$posts = get_posts($args);
	?>
	
	<?php if( $posts ): ?>
	<div id="testimcolumns">
		<?php foreach( $posts as $p) : ?>
		<?php $bckcolor = get_field_object('block_background',$p->ID); ?>
		<div class="testimblock <?php echo $bckcolor["value"]; ?>">
			<i class="fa fa-quote-left"></i>
			<?php $testimtext = get_field('text',$p->ID); ?>
			<?php if ($testimtext) : ?>
				<?php echo wpautop( $testimtext.'"' ); ?>
			<?php endif; ?>
			<?php $author = get_field('author',$p->ID); ?>
			<?php if ($author) : ?>
				<h5><?php echo $author; ?></h5>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>	
</div><!-- #testimonials-content -->



<?php get_footer(); ?>