<?php
/*
 *	Template Name: 29 - Awards - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 29-awards-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="awards-content">	
<div class="container">

	<div class="top-section">
		<?php $toptitle = get_field('top_title'); ?>
		<?php if( $toptitle ) : ?>
			<h2 class="hleader"><?php echo $toptitle; ?></h2>
		<?php endif; ?>
		<?php $toptext = get_field('top_text'); ?>
		<?php if( $toptext ) : ?>
			<?php echo wpautop($toptext); ?>
		<?php endif; ?>

		<div class="container">
		<?php $rows = get_field('awards_items'); ?>
		<?php if ($rows) : ?>
		<div class="awards">
			<?php foreach ($rows as $row) : ?>
				<div class="col-md-12 awitem">
					<?php $image = $row['add_image']; ?>
					<?php $size_url = $image['sizes']['large']; ?>
					<div class="col-md-3">
				   		<div class="awardpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
				   	</div>
				   	<div class="col-md-8">
					   	<?php if ($row['award_title']) : ?>
							<h4><?php echo $row['award_title']; ?></h4> 
						<?php endif; ?>
						<?php if ($row['add_years']) : ?>
							<h5><?php echo $row['add_years']; ?></h5> 
						<?php endif; ?>
						<?php if ($row['add_text']) : ?>
							<?php echo wpautop($row['add_text']); ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		</div>
	</div>

</div> <!-- container -->	
</div><!-- #content -->

<?php get_footer(); ?>