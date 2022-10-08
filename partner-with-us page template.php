<?php
/*
 *	Template Name: 16 - Partner With Us - Template
 */
?>

<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 16-partner-with-us-template');

?>

<?php

$args = array(
	'banner_classes' => '',
	'title' => ''
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>
<style>
	.partner-form h3 {
		text-align: left !important;
	}

	.partner-form p {
		text-align: left !important;
	}

	.partner-form div {
		margin: 0 !important;
	}

	p.states {
		height: 80px;
	}
	.content-above-title {
		margin:45px 0px;
	}
</style>
<div id="partner-content">
	<?php $content_above_title = get_field('content_above_title');
	if (!empty($content_above_title)) : ?>
		<div class="container">
			<div class="content-above-title">
				<?php echo wpautop($content_above_title); ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="container">
		<h2>Business Development Team</h2>
		<?php $rows = get_field('vice_presidents'); ?>
		<?php if ($rows) : ?>
			<div class="vpresidents row">
				<?php foreach ($rows as $row) : ?>
					<div class="vpr col-md-15 col-md-3 col-sm-6 col-xs-12">
						<div class="topv">
							<?php $image = $row['v_image']; ?>
							<?php $size_url = $image['sizes']['large']; ?>
							<div class="vpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
							<?php if ($row['v_title']) : ?>
								<h4><?php echo $row['v_title']; ?></h4>
							<?php endif; ?>
							<?php if ($row['v_text']) : ?>
								<?php echo wpautop($row['v_text']); ?>
							<?php endif; ?>
						</div>
						<?php if ($row['v_email']) : ?>
							<a class="elink" href="mailto:<?php echo $row['v_email']; ?>" target="_blank">
								<i class="fa fa-user"></i> E-mail
							</a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="partner-form">
			<?php
			if (have_posts()) :
				while (have_posts()) :
					the_post();
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>
</div><!-- #partner-content -->



<?php get_footer(); ?>