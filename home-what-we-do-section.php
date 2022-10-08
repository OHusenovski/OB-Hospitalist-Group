<?php 
	$opts = get_opt('what_we_do_section');
?>

<section id="home-content-video-section" class="background" style="background-image: url(<?php echo $opts['background']['url']; ?>);">
	<div class="container in-front">
		<div class="row">
			<?php foreach ($opts['columns'] as $col) : ?>
				<div class="col-md-6">
					<h2><?php echo $col['title']; ?></h2>
					<p><?php echo $col['content']; ?></p>
					<div class="home-hero-btns sm-text-center">
						<?php echo wdb_link( $col['link'], 'btn btn-orange color-white' ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="tint-layer">
</section>