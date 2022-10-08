<?php
/*
 *	Template Name: 23 - Hospital - Leaders - Template
 */
?>

<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 23-hospital-leaders-template');

?>

<?php

$args = array(
	'banner_classes' => '',
	'title' => ''
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>

<div id="clinician-content">
	<div id="hleaders">

		<div class="container">
			<div class="top-section">
				<div class="col-md-6 col-xs-12 leftsec">
					<?php $toptitle = get_field('top_title'); ?>
					<?php if ($toptitle) : ?>
						<h2 class="hleader"><?php echo $toptitle; ?></h2>
					<?php endif; ?>
					<?php $toptext = get_field('top_text'); ?>
					<?php if ($toptext) : ?>
						<?php echo wpautop($toptext); ?>
					<?php endif; ?>
					<?php
					$link = get_field('top_link');
					if ($link) : ?>
						<a class="top-sec-a" href="<?php echo $link['url']; ?>" target="_blank">
							<?php echo $link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
				<div class="col-md-6 col-xs-12 rightsec">
					<div class="embed-container">
						<?php echo get_field('add_video'); ?>
					</div>
				</div>
			</div>
		</div> <!-- container -->

		<div class="grey-section">
			<div class="container">
				<div class="col-md-6 leftsec">
					<?php $image = get_field('grey_image'); ?>
					<?php $size_url = $image['sizes']['large']; ?>
					<div class="greypic" style="background-image: url('<?php echo $size_url; ?>');"></div>
				</div>
				<div class="col-md-6 rightsec">
					<?php $greytitle = get_field('grey_title'); ?>
					<?php if ($greytitle) : ?>
						<h2><?php echo $greytitle; ?></h2>
					<?php endif; ?>
					<?php $greytext = get_field('grey_text'); ?>
					<?php if ($greytext) : ?>
						<?php echo wpautop($greytext); ?>
					<?php endif; ?>
					<?php
					$link = get_field('grey_link');
					if ($link) : ?>
						<a href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="twoblocks">
			<div class="col-md-6">
				<?php $image = get_field('block_img1'); ?>
				<?php $size_url = $image['sizes']['large']; ?>
				<div class="blockpic" style="background-image: url('<?php echo $size_url; ?>');">
					<div class="bltext">
						<?php $blocktitle = get_field('block_title1'); ?>
						<?php if ($blocktitle) : ?>
							<h2><?php echo $blocktitle; ?></h2>
						<?php endif; ?>
						<?php
						$link = get_field('block_link1');
						if ($link) : ?>
							<a class="button" href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php $image = get_field('block_img2'); ?>
				<?php $size_url = $image['sizes']['large']; ?>
				<div class="blockpic" style="background-image: url('<?php echo $size_url; ?>');">
					<div class="bltext">
						<?php $blocktitle = get_field('block_title2'); ?>
						<?php if ($blocktitle) : ?>
							<h2><?php echo $blocktitle; ?></h2>
						<?php endif; ?>
						<?php
						$link = get_field('block_link2');
						if ($link) : ?>
							<a class="button" href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<br clear="both">
		<div class="container">
			<div class="benefitssec">
				<?php $beneftitle = get_field('benef_title'); ?>
				<?php if ($beneftitle) : ?>
					<h2 class="centered"><?php echo $beneftitle; ?></h2>
				<?php endif; ?>

				<?php $beneftext = get_field('benef_text'); ?>
				<?php if ($beneftext) : ?>
					<?php echo wpautop($beneftext); ?>
				<?php endif; ?>

				<?php $rows = get_field('benefits_items'); ?>
				<?php if ($rows) : ?>
					<div class="benelements">
						<?php foreach ($rows as $row) : ?>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<?php $image = $row['benef_image']; ?>
								<?php $size_url = $image['sizes']['large']; ?>
								<div class="bbpic" style="background-image: url('<?php echo $size_url; ?>');">
									<div class="transp">
										<?php if ($row['benefits_title']) : ?>
											<h4 class="coltitle"><?php echo $row['benefits_title']; ?></h4>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<br clear="both">
					<div class="centered">
						<?php
						$link = get_field('add_custom_link');
						if ($link) : ?>
							<a class="orangeanchor" href="<?php echo $link['url']; ?>">
								<?php echo $link['title']; ?>
							</a>
						<?php endif; ?>
					<?php endif; ?>
					</div>
			</div>
		</div>
		<br clear="both">
		<div class="blacksec">
			<div class="container">
				<?php $rows = get_field('statistics_items'); ?>
				<?php if ($rows) : ?>
					<div class="flexicons">
						<?php foreach ($rows as $row) : ?>
							<div class="col-md-2 col-sm-4 col-xs-6">
								<?php $image = $row['add_icon']; ?>
								<?php $size_url = $image['sizes']['large']; ?>
								<div class="statpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
								<?php if ($row['add_title']) : ?>
									<h4 class="icontitle"><?php echo $row['add_title']; ?></h4>
								<?php endif; ?>
								<?php if ($row['add_amount']) : ?>
									<h2 class="iconamount"><?php echo $row['add_amount']; ?></h2>
								<?php endif; ?>
								<?php if ($row['add_message']) : ?>
									<p class="iconmessage"><?php echo $row['add_message']; ?></p>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<br clear="both">
		<div class="container">
			<div class="benefitssec">
				<div class="principles">
					<?php $principlestitle = get_field('principle_title'); ?>
					<?php if ($principlestitle) : ?>
						<h2 class="centered"><?php echo $principlestitle; ?></h2>
					<?php endif; ?>

					<?php $principlestext = get_field('principle_text'); ?>
					<?php if ($principlestext) : ?>
						<?php echo wpautop($principlestext); ?>
					<?php endif; ?>

					<?php $rows = get_field('principles_items'); ?>
					<?php $counter = 0; ?>
					<?php if ($rows) : ?>
						<?php $total = count($rows);
						$cut_off = $total - $total % 3; ?>

						<div class="flexicons">
							<?php foreach ($rows as $row) : ?>
								<?php if ($counter < $cut_off) : ?>
									<div class="col-md-4 col-xs-12">
										<?php $image = $row['principle_image']; ?>
										<?php $size_url = $image['sizes']['large']; ?>
										<div class="coloredframe">
											<div class="benefpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
										</div>
										<?php if ($row['add_title']) : ?>
											<h4 class="icontitle"><?php echo $row['add_title']; ?></h4>
										<?php endif; ?>
									</div>
								<?php endif; ?>

								<?php if ($counter >= $cut_off) : ?>
									<?php if ($counter == $cut_off) : ?>
										<div class="spccontainer">
										<?php endif; ?>
										<div class="col-md-6 col-xs-12">
											<?php $image = $row['principle_image']; ?>
											<?php $size_url = $image['sizes']['large']; ?>
											<div class="coloredframe">
												<div class="benefpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
											</div>
											<?php if ($row['add_title']) : ?>
												<h4 class="icontitle"><?php echo $row['add_title']; ?></h4>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<?php $counter = $counter + 1; ?>
								<?php endforeach; ?>

								<?php if ($cut_off != $total) : ?>
										</div>
									<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
</div><!-- #content -->

<div class="container">
	<div class="twoblocks">
		<div class="col-md-6 leftsec">
			<?php $image = get_field('box_image1'); ?>
			<?php $size_url = $image['sizes']['large']; ?>
			<div class="blockpic" style="background-image: url('<?php echo $size_url; ?>');">
				<div class="bltext">
					<?php $blocktitle = get_field('box_title1'); ?>
					<?php if ($blocktitle) : ?>
						<h2><?php echo $blocktitle; ?></h2>
					<?php endif; ?>
					<?php
					$link = get_field('box_link1');
					if ($link) : ?>
						<a class="button" href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col-md-6 rightsec">
			<?php $image = get_field('box_image2'); ?>
			<?php $size_url = $image['sizes']['large']; ?>
			<div class="blockpic" style="background-image: url('<?php echo $size_url; ?>');">
				<div class="bltext">
					<?php $blocktitle = get_field('box_title2'); ?>
					<?php if ($blocktitle) : ?>
						<h2><?php echo $blocktitle; ?></h2>
					<?php endif; ?>
					<?php
					$link = get_field('box_link2');
					if ($link) : ?>
						<a class="button" href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>
<?php $last_cta = get_field('hl_cta_btn');
if (!empty($last_cta)) : ?>
	<div class="cta-before-footer text-center">
		<a href="<?php echo $last_cta['url']; ?>" target="<?php echo $last_cta['target']; ?>"><?php echo $last_cta['title']; ?></a>
	</div>
<?php endif; ?>





<?php get_footer(); ?>