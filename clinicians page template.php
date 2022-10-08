<?php
/*
 *	Template Name: 18 - Clinicians - Template
 */
?>

<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 18-clinicians-template');

?>

<?php

$args = array(
	'banner_classes' => '',
	'title' => ''
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>

<div id="clinician-content">

	<div class="container">

		<div class="top-section">
			<div class="col-md-6 col-xs-12 leftsec">
				<?php $toptitle = get_field('top_title'); ?>
				<?php if ($toptitle) : ?>
					<h2><?php echo $toptitle; ?></h2>
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
	<div clear="both"></div>
	<div class="container">
		<div class="twoblocks">
			<div class="col-md-6 leftsec">
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
			<div class="col-md-6 rightsec">
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
	</div>
	<div clear="both"></div>
	<div class="clinadv">
		<div class="container">
			<?php $advtitle = get_field('adv_title'); ?>
			<?php if ($advtitle) : ?>
				<h2><?php echo $advtitle; ?></h2>
			<?php endif; ?>
			<?php $rows = get_field('advantages_items'); ?>
			<?php if ($rows) : ?>
				<div class="flexicons">
					<?php foreach ($rows as $row) : ?>
						<div class="col-md-4 col-xs-6">
							<?php $image = $row['add_icon']; ?>
							<?php $size_url = $image['sizes']['large']; ?>
							<div class="advpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
							<?php if ($row['adv_title']) : ?>
								<h4 class="icontitle"><?php echo $row['adv_title']; ?></h4>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php $all_advantages_link = get_field('all_clinician_advantages_link');
			if (!empty($all_advantages_link)) : ?>
				<div class="visit-all-advantages text-center">
					<a class="btn btn-default" href="<?php echo $all_advantages_link['url']; ?>" target="<?php echo $all_advantages_link['target']; ?>"><?php echo $all_advantages_link['title']; ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="jobalerts">
		<div class="container">
			<h3>
				<?php $mail = get_field('mail_message'); ?>
				<a class="btn btn-default" href="/job-alerts/"><?php echo $mail; ?></a>
			</h3>
		</div>
	</div>

</div><!-- #clinician-content -->



<?php get_footer(); ?>