<?php
/*
 *	Template Name: 17 - History - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 17-history-template');

?>

<?php 

$args = array(
	'banner_classes' => '',
	'title' => ''
	);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php
	wdb_use_vertical_timeline(); // Located in _wdbar/functions.php

	?>

	<div id="history-content">
		<div class="container">
			<div class="top-section">
				<div class="col-md-8 leftsec">
					<?php $rows = get_field('upperleft_items'); ?>
					<?php if ($rows) : ?>
						<div>
							<?php foreach ($rows as $row) : ?>
								<div>
									<?php $toptitle = $row['top_title']; ?>
									<?php if( $toptitle ) : ?>
										<h2><?php echo $toptitle; ?></h2>
									<?php endif; ?>
									<?php $toptext = $row['top_text']; ?>
									<?php if( $toptext ) : ?>
										<?php echo wpautop($toptext); ?>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-4 rightsec">
					<?php $image = get_field('histright_image'); ?>
					<?php $size_url = $image['sizes']['large']; ?>
					<div class="histpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
					<?php $toptext = get_field('histtext'); ?>
					<?php if( $toptext ) : ?>
						<?php echo wpautop($toptext); ?>
					<?php endif; ?>
				</div>
			</div>		
		</div> <!-- container -->

		<div class="historytimeline">
		<h2 style="color: #fff; text-align: center; padding-bottom: 50px;"><?php echo get_field('timeline_heading'); ?></h2>
			<div class="container">
				<?php $rows = get_field('timeline_items'); ?>
				<?php if ($rows) : ?>
					<section class="cd-timeline js-cd-timeline">
						<div class="cd-timeline__container">
							<?php foreach ($rows as $row) : ?>
								<div class="cd-timeline__block js-cd-block">
									<div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
										<p><?php echo $row['add_year']; ?></p>
									</div>
								</div> <!-- cd-timeline__block -->
								<?php $rows1 = $row['event_items']; ?>
								<?php if ($rows1) : ?>
									<?php foreach ($rows1 as $row1) : ?>
										<div class="cd-timeline__block js-cd-block">
											<div class="cd-timeline__content js-cd-content nth">
												<?php if ($row1['timeline_img']) : ?>
													<div class="historyimg" style="background: url('<?php echo $row1['timeline_img']['url']; ?>') no-repeat center"></div>
												<?php endif; ?>
												<?php if ($row1['timeline_title']) : ?>
													<?php $bckcolor = $row1['heading_background']; ?>
													<h4 class="<?php echo $bckcolor["value"]; ?>">
														<span class="caret <?php echo $bckcolor["label"]; ?>"></span>
														<?php echo $row1['timeline_title']; ?>
													</h4> 
												<?php endif; ?>
												<?php if ($row1['timeline_text']) : ?>
													<?php echo wpautop($row1['timeline_text']); ?>
												<?php endif; ?>
											</div> <!-- cd-timeline__content -->
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</section> <!-- cd-timeline -->
					<?php endif; ?>	
				</div>
			</div>

		</div><!-- #history-content -->

		<?php get_footer(); ?>