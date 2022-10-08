<?php wdb_use_slick();  ?>

<?php
$opts = get_opt('home_hero_section');
?>
<section id="home-hero-section">

	<?php $ifslider = $opts['ifslider']; ?>
	<?php if ($ifslider == TRUE) : ?>
		<section class="homeslider">
			<?php $rows = $opts['slider_options']; ?>
			<?php if ($rows) : ?>
				<div id="slider-block" class="single-item">
					<?php foreach ($rows as $row) : ?>
						<?php $simage = $row['s_image']; ?>
						<div class="sliderpic" style="background-image: url('<?php echo $simage['url']; ?>');">
							<?php $slidertext = $row['s_text']; ?>
							<?php if (!empty($slidertext)) : ?>
								<div class="hero-gray-layer sltxt">
									<?php echo wpautop($slidertext); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<script>
				(function($) {
					$(document).ready(function() {

						$(".single-item").slick({
							dots: false,
							arrows: true,
							infinite: true,
							slidesToShow: 1,
							slidesToScroll: 1,
							autoplay: true,
							autoplaySpeed: 5000,

							responsive: [{
								breakpoint: 815,
								settings: {
									arrows: false,
									dots: true
								}
							}]
						});

					});

				})(jQuery);
			</script>
		</section>

	<?php else : ?>

		<div class="home-hero-image-wrap">
			<?php echo wdb_responsive_bg_img('#home-hero-section .hero-img-desktop-wrap', $opts['image']); ?>
			<div class="hero-img-desktop-wrap"></div>
			<?php echo wdb_responsive_bg_img('#home-hero-section .hero-img-mobile-wrap', $opts['image_mob']); ?>
			<div class="hero-img-mobile-wrap"></div>
		</div>



		<div class="home-hero-content container">

			<div class="row disp-table row-hero-section">

				<div class="col-xs-12 disp-table-cell valign-middle col-hero-section">
					<div class="hero-gray-layer">
						<h1 class="hero-heading">
							<?php echo $opts['heading']; ?>
							</h2>

							<div class="home-hero-copy">
								<?php echo $opts['copy']; ?>
							</div>

							<div class="home-hero-btns">
								<?php echo wdb_link($opts['link_more'], 'btn color-blue'); ?>
							</div>
					</div>
				</div>

			</div>

		</div>

	<?php endif; ?>

</section>

<section id="home-hero-boxes" style="">
	<div class="row">
		<?php if ($cols = $opts['cols_grid']) : ?>
			<?php foreach ($cols as $col) : ?>
				<div class="col-sm-4 col-xs-12">
					<div class="box-background" style="background-image: url(<?php echo $col['background']['url']; ?>);">
						<img src="<?php echo $col['icon']['url'] ?>" class="box-icon">
					</div>
					<div class="box-details">
						<h3 class="box-name">
							<?php echo $col['name']; ?>
						</h3>
						<p class="box-content">
							<?php echo $col['content']; ?>
						</p>
						<div class="box-more-link">
							<?php echo wdb_link($col['link_more'], 'btn color-white learn-more'); ?>
						</div>
						<div class="box-action-link">
							<?php echo wdb_link($col['link_action'], 'btn color-white btn-orange'); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>