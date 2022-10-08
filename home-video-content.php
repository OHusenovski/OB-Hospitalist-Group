<?php 
	$opts = get_opt('home_content_video_section');
?>

<section id="home-content-video-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1><?php echo $opts['title']; ?></h1>
				<p><?php echo $opts['content']; ?></p>
				<div class="home-hero-btns sm-text-center">
					<?php echo wdb_link( $opts['link_more'], 'btn btn-wire color-blue' ); ?>
				</div>
			</div>
			<div class="col-md-6 sm-nopadding">
				<?php print_video_embed($opts['video']); ?>
			</div>
		</div>
	</div>
</section>