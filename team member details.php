<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 25-executiveteam-detail');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="team-details">
	<div class="container">
			
		<?php 
			$args = array(
				'post_type' => 'executive_leadership'
			);
			$posts = get_posts($args);
		?>
		
		<?php if( $posts ): ?>
			<div class="detailpage">
				<?php $image = get_field('image',$p->ID); ?>
				<?php $position = get_field('position',$p->ID); ?>
				<?php $size_url = $image['sizes']['large']; ?>
				<div class="col-md-4">
					<div class="portrait" style="background-image: url('<?php echo $size_url; ?>')"></div>
				</div>
				<div class="col-md-8">
					<h4><?php echo get_post($p->ID)->post_title; ?></h4>
					<h5><?php echo $position; ?></h5>
					<?php $content = wpautop( $post->post_content ); ?>
					<div class="detailtxt"><?php echo $content ?></div>
				</div>
			</div>			
		<?php endif; ?>
		
	</div>	
</div><!-- #team-details -->



<?php get_footer(); ?>