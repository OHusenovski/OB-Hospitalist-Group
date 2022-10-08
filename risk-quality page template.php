<?php
/*
 *	Template Name: 26 - Risk - Quality - Template
 */
?>

<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 26-risk-quality-template');

?>

<?php

$args = array(
	'banner_classes' => '',
	'title' => ''
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>

<div id="riskquality">
	<div class="container">
		<div class="top-section">
			<div class="col-md-4 col-xs-12">
				<?php $image = get_field('add_image'); ?>
				<?php $size_url = $image['sizes']['large']; ?>
				<div class="emblempic" style="background-image: url('<?php echo $size_url; ?>');"></div>
			</div>
			<div class="col-md-8 col-xs-12">
				<?php $toptext = get_field('add_text_risk'); ?>
				<?php if ($toptext) : ?>
					<?php echo wpautop($toptext); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="blusec">
		<div class="container">
			<?php $blutitle = get_field('blu_title'); ?>
			<?php if ($blutitle) : ?>
				<h2><?php echo $blutitle; ?></h2>
			<?php endif; ?>
			<?php $rows = get_field('blu_items'); ?>
			<?php if ($rows) : ?>
				<div class="bluitems">
					<?php $blocks_count = 0; ?>
					<?php foreach ($rows as $row) : ?>
						<?php $blocks_count++; ?>
						<div class="col-md-4 col-sm-4 rborder">
							<div class="ttable">
								<?php if ($row['message']) : ?>
									<h5 class="tcell"><?php echo $row['message']; ?></h5>
								<?php endif; ?>
							</div>
						</div>
						<?php if ($blocks_count % 3 == 0  && !(count($rows) == $blocks_count && count($rows) % 3 == 0)) : ?>
				</div>
				<div style="clear: both;"></div>
				<hr class="wline">
				<div class="row mrg0">
				<?php endif; ?>

			<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="clinadv">
		<div class="container">
			<?php $middletitle = get_field('middle_title'); ?>
			<?php if ($middletitle) : ?>
				<h2><?php echo $middletitle; ?></h2>
			<?php endif; ?>
			<?php $rows = get_field('trend_items'); ?>
			<?php if ($rows) : ?>
				<div class="flexicons">
					<?php foreach ($rows as $row) : ?>
						<div class="col-md-4 col-xs-12 trends">
							<?php $uppertitle = $row['top_title']; ?>
							<?php if ($uppertitle) : ?>
								<h4><?php echo $uppertitle; ?></h4>
							<?php endif; ?>
							<?php $image = $row['add_image']; ?>
							<?php $size_url = $image['sizes']['large']; ?>
							<div class="trendpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
							<?php if ($row['bottom_title']) : ?>
								<h6><?php echo $row['bottom_title']; ?></h6>
							<?php endif; ?>
							<?php if ($row['bottom_p']) : ?>
								<p><?php echo $row['bottom_p']; ?></p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="container">
		<div class="benefitssec">
			<?php $addtitle = get_field('add_title'); ?>
			<?php if ($addtitle) : ?>
				<h2 class="centered"><?php echo $addtitle; ?></h2>
			<?php endif; ?>
			<div class="col-md-6 leftsec">
				<?php $toptext = get_field('add_text1'); ?>
				<?php if ($toptext) : ?>
					<?php echo wpautop($toptext); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 rightsec">
				<?php $toptext = get_field('add_text2'); ?>
				<?php if ($toptext) : ?>
					<?php echo wpautop($toptext); ?>
				<?php endif; ?>
			</div>

			<?php $rows = get_field('safe_items'); ?>
			<?php if ($rows) : ?>
				<div class="safeblocks">
					<?php foreach ($rows as $row) : ?>
						<div class="col-md-12 lgrey">
							<div class="col-md-3">
								<?php $image = $row['add_image']; ?>
								<?php $size_url = $image['sizes']['large']; ?>
								<div class="trendpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
							</div>
							<div class="col-md-9">
								<?php $rows1 = $row['list_items']; ?>
								<?php if ($rows1) : ?>
									<ul>
										<?php foreach ($rows1 as $row1) : ?>
											<?php if ($row1['textitem']) : ?>
												<li><?php echo $row1['textitem']; ?></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<br clear="both">
		<div class="hotline">
			<?php $textarea = get_field('add_text'); ?>
			<?php if ($textarea) : ?>
				<p><?php echo $textarea; ?></p>
			<?php endif; ?>
			<?php $hotline = get_field('phone_number'); ?>
			<?php if ($hotline) : ?>
				<h3><?php echo $hotline; ?></h3>
			<?php endif; ?>
		</div>
		<?php if (get_field('button_label')) : ?>
			<div class="button-hotline">
				<div class="row form-group">
					<img src="<?php echo get_field('button_image')['url']; ?>">
				</div>
				<div class="row form-group">
					<a class="btn-hotline" href="<?php echo get_field('button_url'); ?>" target="_blank"><?php echo get_field('button_label'); ?></a>
				</div>
			</div>
		<?php endif; ?>

	</div>
	<?php $last_cta = get_field('rq_cta_btn');
	if (!empty($last_cta)) : ?>
		<div class="cta-before-footer text-center">
			<a href="<?php echo $last_cta['url']; ?>" target="<?php echo $last_cta['target']; ?>"><?php echo $last_cta['title']; ?></a>
		</div>
	<?php endif; ?>

</div><!-- #riskquality -->



<?php get_footer(); ?>