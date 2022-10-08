<?php
/*
 *	Template Name: 22 - RFP - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 22-RFP-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="contact-content">
<div id="rfp-content">
<div class="container">
	<div class="uppersec">
		<?php $toptitle = get_field('add_title'); ?>
		<?php if( $toptitle ) : ?>
			<h2><?php echo $toptitle; ?></h2>
		<?php endif; ?>
		<div class="col-md-6">
			<?php $toptext = get_field('add_text'); ?>
			<?php if( $toptext ) : ?>
				<?php echo wpautop($toptext); ?>
			<?php endif; ?>	
		</div>
		<div class="col-md-6 rightsec">
			<?php 
				$form_object = get_field('rfp-form');
				echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="true" description="true" ajax="true"]');
			?>
		</div>
		<br clear="both">
	</div>
	<div class="rfpblocks">
		<?php $rows = get_field('block_items'); ?>
		<?php if ($rows) : ?>
		<div class="twoblocks row">
			<?php foreach ($rows as $row) : ?>
				<div class="col-md-6">
					<?php $image = $row['block_img']; ?>
					<?php $size_url = $image['sizes']['large']; ?>
				   	<div class="blockpic" style="background-image: url('<?php echo $size_url; ?>');">
				   		<div class="bltext">
				   		<?php $blocktitle = $row['block_title']; ?>
						<?php if( $blocktitle ) : ?>
							<h2><?php echo $blocktitle; ?></h2>
						<?php endif; ?>
						<?php 
						$link = $row['block_link'];
						if( $link ): ?>					
							<a class="button" href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						<?php endif; ?>
						</div>
				   	</div>
			    </div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>	
	</div>
</div>		
</div>	
</div><!-- #content -->


<script>
	jQuery(document).on("gform_confirmation_loaded", function (e, form_id) {
		var download_url = '<?php echo get_field('example_rfp')['url'] ?>';
		window.location = download_url;
});

</script>
<?php get_footer(); ?>