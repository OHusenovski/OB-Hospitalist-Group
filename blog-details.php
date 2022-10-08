<?php
// File Security Check
if (!function_exists('wp') && !empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
}

get_header(); // Loads the header.php template. 
dev_comment('tpl: 08-blog-details');
$breads = get_field('custom_breadcrumbs');
$bread = array();

if (is_array($breads) && count($breads)) {
	foreach ($breads as $b => $br) {
		$bread[$br['title']] = $br['link'];
	}
}

$args = array(
	'banner_classes' => '',
	'title' => 'Blog',
	'breadcrumbs' => $bread,
	'category' => 'category',
	'post_type' => 'post'
);

wdb_get_banner($args); // Located in _wdbar/functions.php

?>

<style>
	#page-banner .page-title {
		background: #01afecb3;
	}
	
	.wp-video-container .wp-video,
	.wp-video-container {
		width:100% !important;
	}
</style>

<div id="news-content" class="blog-details">
	<div class="container">
		<div class="row">

			<div class="col-md-8 newsection">
				<div id="page-content">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : ?>
							<?php the_post(); // Loads the post data. 
							?>
							<article <?php hybrid_attr('post'); ?>>
								<?php $size_url = get_the_post_thumbnail_url(); ?>

								<div class="post-featured-image">
									<img src='<?php echo $size_url; ?>'>
								</div>

								<h6 class="details">
									<?php echo get_the_date('m/d/y'); ?>
								</h6>

								<h1><?php echo get_the_title(); ?></h1>

								<div <?php hybrid_attr('entry-content'); ?>>
									<?php the_content(); ?>
								</div>
								<?php
								$video_opts = get_field('post_video', $post->ID);
						
								$video_src = $video_opts['video_source'];
								?>
								<?php if ($video_src == 'media') : ?>
									<?php $video_m = $video_opts['media_video'];
									$attr =  array(
										'mp4'      	=> $video_m,
										'preload'  	=> 'auto',
										'poster'   => $video_opts['video_thumbnail']['url'],
									);
								
									if($video_m !==false):	?>
									<div class="blog-post-media-video">
										<div class="wp-video-container">
											<?php echo wp_video_shortcode($attr); ?>
										</div>
									</div>
							<?php endif;?>
								<?php endif; ?>
								<?php if ($video_src == 'oembed') : ?>
									<?php $video_o = $video_opts['oembed_video']; 
								if($video_o ):?>
									<div class="blog-post-oembed-video">
										<div class="embed-container">
											<?php echo $video_o; ?>
										</div>
									</div>
								<?php endif;?>
								<?php endif; ?>


								<div class="share-buttons">
									<div class="ttable">
										<div class="tcell">
											<h6>Dont forget to share this post! </h6>
										</div>
										<div class="tcell">
											<?php echo wdb_print_share($post, "['facebook', 'twitter', 'linkedin']"); ?>
										</div>
									</div>
								</div>

								<?php if ($related_posts = get_field('related_posts')) : ?>
									<div class="related-posts">
										<h3>Related Posts</h3>
										<div class="row">
											<?php foreach ($related_posts as $p) : ?>
												<div class="col-sm-6 col-xs-12">
													<div class="related-post ttable">
														<div class="tcell valign" style="width: 120px;">
															<?php $size_url = get_the_post_thumbnail_url($p); ?>
															<a href="<?php echo get_the_permalink($p); ?>">
																<div class="round-image" style="background-image: url('<?php echo $size_url; ?>');"></div>
															</a>
														</div>
														<div class="tcell valign-middle">
															<h6 class="details"><?php echo get_the_date('m/d/y', $p); ?></h6>
															<a href="<?php echo get_the_permalink($p); ?>">
																<h6 class="color-black"><?php echo get_the_title($p); ?></h6>
															</a>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>



							</article>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part('loop-error'); // Loads the loop-error.php template. 
						?>
					<?php endif; ?>
				</div>
			</div>

			<div class="col-md-4 rightsection">
				<?php include_locate('template-parts/sidebar-searchblog.php'); ?>
				<?php wdb_get_category_terms($args); ?>
				<?php include_locate('template-parts/sidebar-tags.php'); ?>
				<?php wdb_get_archived_posts($args); ?>
				<?php include_locate('template-parts/blog-sidebar-signup.php'); ?>
			</div>
		</div>
		<!--.row-->

	</div>

</div><!-- #news-content -->


<?php get_footer(); // Loads the footer.php template. 
?>