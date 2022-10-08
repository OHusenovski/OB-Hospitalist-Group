<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 05A-news-releases-details');

?>

<?php

$args = array(
	'banner_classes' => '',
	'title' => ''
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>

<div id="news-details">
	<div class="container">

		<div class="col-md-8 newsdet">

			<div class="detframe">
				<?php $image = get_field('news_img'); ?>
				<?php if (!$image) $image = get_opt('news_releases_default_image'); ?>
				<?php $size_url = $image['sizes']['large']; ?>
				<?php $post_featured_img = get_the_post_thumbnail($post->id, 'medium'); ?>

				<div class="detpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
				<h5><?php echo get_the_date('m/d/y'); ?></h5>
				<div class="dettxt">
					<h3><?php echo get_post()->post_title; ?></h3>
					<?php if (!empty($post_featured_img)) : ?>
						<div class="featured-img text-center">
							<?php echo $post_featured_img; ?>
						</div>
					<?php endif; ?>
					<?php $content = wpautop($post->post_content); ?>
					<?php echo $content; ?>
				</div>
				<div class="sharesection">
					<h5>Don't forget to share this post!</h5>
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
						<i class="fa fa-facebook fcb" aria-hidden="true"></i>
					</a>
					<a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank">
						<i class="fa fa-twitter twtr" aria-hidden="true"></i>
					</a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
						<i class="fa fa-linkedin lnk" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="col-md-4 rightsection">
			<?php include_locate('template-parts/sidebar-search.php'); ?>
			<?php include_locate('template-parts/sidebar-newsrelease.php'); ?>
			<?php include_locate('template-parts/sidebar-newsrelease-categories.php'); ?>
			<?php include_locate('template-parts/sidebar-other.php'); ?>
		</div>

	</div>

</div><!-- #main-details -->



<?php get_footer(); ?>