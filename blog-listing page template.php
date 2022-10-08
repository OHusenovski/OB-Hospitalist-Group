<?php /* Template Name: 07 - Blog Listing */ ?>
<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 
dev_comment('tpl: 07-blog-listing');
$breads = get_field('custom_breadcrumbs');
$bread = array();

if (is_array($breads) && count($breads)) {
	foreach ($breads as $b => $br) {
		$bread[$br['title']] = $br['link'];
	}
}

$args = array(
	'banner_classes' => '',
	'title' => '',
	'breadcrumbs' => $bread,
	'category' => 'category',
	'post_type' => 'post',
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>

<style>
	#page-banner .page-title {
		background: #01afecb3;
	}
</style>

<div id="news-content" class="blog-listing">
	<div class="container">
		<div class="row">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$posts_per_page = 10; //($paged == 1) ? 10 : 8;

			$wp_args = array(
				'post_type' => 'post',
				'posts_per_page' => $posts_per_page,
				'post_status'    => 'publish',
				'suppress_filters' => false,
				'orderby' => 'date',
				'order' => 'DESC',
				'paged' => $paged,
			);

			$obj = get_queried_object();
			if ($obj->term_id) {
				$additional = array(
					'tax_query' => array(
						array(
							'taxonomy' => $obj->taxonomy,
							'field' => 'term_id',
							'terms' => $obj->term_id
						)
					)
				);
				$wp_args = array_merge($wp_args, $additional);
			}

			if (isset($_GET['tagged'])) {
				$tags = explode(",", $_GET['tagged']);
				$additional = array(
					'tag' => $tags
				);
				$wp_args = array_merge($wp_args, $additional);
			}

			if (isset($_GET['search'])) {
				$search = $_GET['search'];
				$additional = array(
					's' => $search
				);
				$wp_args = array_merge($wp_args, $additional);
			}

			$wp_query = new WP_Query($wp_args);
			?>
			<div class="col-md-8 newsection">
				<?php $counter = 0; ?>
				<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<?php $counter = $counter + 1; ?>
						<?php if ($counter == 1 && $paged == 1) : ?>
							<div class="bigblock col-md-12">
								<div class="newsframe">
									<?php $size_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
									<?php if (!$size_url) {
										$image = get_opt('blog_default_image');
										$size_url = $image['sizes']['large'];
									} ?>
									<a href="<?php the_permalink(); ?>">
										<div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div>
									</a>
									<h5><?php echo get_the_date('m/d/y'); ?></h5>
									<div class="newstxt">
										<a href="<?php the_permalink(); ?>">
											<h3><?php echo get_post()->post_title; ?></h3>
										</a>
										<?php
										$post_object = get_post();
										$post_content = $post_object->post_content;
										?>
										<?php echo wpautop(excerpt(85, $post_object, $post_content)); ?>
									</div>
									<?php $post_id = $post_object->ID; ?>
									<?php
									$video_opts = get_field('post_video', $post_id);
									$video_src = $video_opts['video_source'];
									$hide_on_blog_main_page = $video_opts['hide_video'];
									?>
									<?php if ($hide_on_blog_main_page) : ?>
										<div class="hide-videos">
										<?php endif; ?>
										<?php if ($video_src == 'media') : ?>
											<?php $video_m = $video_opts['media_video'];
											if ($video_m) :
												$attr =  array(
													'mp4'      => $video_m,
													'preload'  => 'auto'
												);
											?>
												<div class="blog-post-media-video">
													<div class="embed-container">
														<?php echo wp_video_shortcode($attr); ?>
													</div>
												</div>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($video_src == 'oembed') : ?>
											<?php $video_o = $video_opts['oembed_video']; ?>
											<div class="blog-post-oembed-video">
												<div class="embed-container">
													<?php echo $video_o; ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if ($hide_on_blog_main_page) : ?>
										</div>
									<?php endif; ?>
									<a href="<?php the_permalink(); ?>">
										<span class="yellink">More</span>
									</a>
								</div>
							</div>
						<?php endif; ?>

						<?php if ($counter > 1 && $counter < 4 && $paged == 1) : ?>
							<div class="halfblock col-md-6">
								<div class="newsframe">
									<?php $size_url = get_the_post_thumbnail_url(); ?>
									<?php if (!$size_url) {
										$image = get_opt('blog_default_image');
										$size_url = $image['sizes']['large'];
									} ?>
									<a href="<?php the_permalink(); ?>">
										<div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div>
									</a>
									<h5><?php echo get_the_date('m/d/y'); ?></h5>
									<div class="newstxt">
										<a href="<?php the_permalink(); ?>">
											<h3><?php echo get_post()->post_title; ?></h3>
										</a>
										<?php
										$post_object = get_post();
										$post_content = $post_object->post_content;
										?>
										<?php echo wpautop(excerpt(22, $post_object, $post_content)); ?>
									</div>
									<a href="<?php the_permalink(); ?>"><i class="fa fa-plus"></i></a>
								</div>
							</div>
						<?php endif; ?>

						<?php if ($counter >= 4 || $paged > 1) : ?>
							<div class="circblock col-md-12">
								<div class="newsframe">
									<div class="col-md-2">
										<?php $size_url = get_the_post_thumbnail_url(); ?>
										<?php if (!$size_url) {
											$image = get_opt('blog_default_image');
											$size_url = $image['sizes']['large'];
										} ?>
										<a href="<?php the_permalink(); ?>">
											<div class="newspic" style="background-image: url('<?php echo $size_url; ?>');"></div>
										</a>
									</div>
									<div class="col-md-10">
										<h5><?php echo get_the_date('m/d/y'); ?></h5>
										<div class="newstxt">
											<a href="<?php the_permalink(); ?>">
												<h3 class="color-black"><?php echo get_post()->post_title; ?></h3>
											</a>
											<?php
											$post_object = get_post();
											$post_content = $post_object->post_content;
											?>
											<?php echo wpautop(excerpt(25, $post_object, $post_content)); ?>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
				<?php endwhile;
				endif; ?>
				<div class="col-md-12 site-navigation">
					<?php
					if (function_exists('custom_pagination')) {
						echo custom_pagination($wp_query->max_num_pages, "", $paged);
					} ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>

			<div class="col-md-4 rightsection">
				<?php include_locate('template-parts/blog-sidebar-signup.php'); ?>
				<?php include_locate('template-parts/sidebar-searchblog.php'); ?>
				<?php wdb_get_category_terms($args); ?>
				<?php include_locate('template-parts/sidebar-tags.php'); ?>
				<?php wdb_get_archived_posts($args); ?>
			</div>
		</div>
		<!--.row-->

	</div>

</div><!-- #news-content -->


<?php get_footer(); // Loads the footer.php template. 
?>