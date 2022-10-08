<?php
$opts = get_opt('home_counters_sections');
?>

<section id="home-counters-section">
	<div class="container">
		<h2><?php echo $opts['title']; ?></h2>
		<div class="row equal" id="numbers">
			<?php foreach ($opts['counters'] as $counter) : ?>
				<div class="col-md-2 col-sm-4 col-xs-6">
					<div>
						<a href="<?php echo $counter['link']['url']; ?>" target="<?php echo $counter['link']['target']; ?>">
							<img src="<?php echo $counter['icon']['url']; ?>" alt="<?php echo $counter['icon']['name']; ?>">
						</a>
						<div class="fig-number <?php if ($counter['add_plus']) echo 'add-plus'; ?>"><?php echo $counter['count']; ?></div>

						<p class="text">
							<?php echo $counter['text']; ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<p class="after"><?php echo $opts['text_below_counters']; ?></p>
	</div>
</section>

<script>
	jQuery(function($, win) {
		$.fn.inViewport = function(cb) {
			return this.each(function(i, el) {
				function visPx() {
					var H = $(this).height(),
						r = el.getBoundingClientRect(),
						t = r.top,
						b = r.bottom;
					return cb.call(el, Math.max(0, t > 0 ? H - t : (b < H ? b : H)));
				}
				visPx();
				$(win).on("resize scroll", visPx);
			});
		};
	}(jQuery, window));


	jQuery(function($) { // DOM ready and $ in scope

		jQuery(".fig-number").inViewport(function(px) { // Make use of the `px` argument!!!
			// if element entered V.port ( px>0 ) and
			// if prop initNumAnim flag is not yet set
			//  = Animate numbers

			if (px > 0 && !this.initNumAnim) {
				setTimeout(showpanel, 4000);
				this.initNumAnim = true; // Set flag to true to prevent re-running the same animation
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					duration: 2000,
					step: function(now) {
						$(this).text(Math.ceil(now));
					}
				});

			}
		});
	
		function showpanel() {
			$('.fig-number').each(function(i, obj) {
				var temp_value = jQuery(this).text();
				var temp_int = parseInt(temp_value);
				if (temp_int > 1000) {
					// temp_int = temp_int / 1000;
					// temp_value = temp_int.toString();
					// console.log(temp_int);
					// temp_value = temp_value.replace(".", ",");
					// $(this).text(temp_value);

					$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
				} else if (temp_int == 1000) {
					$(this).text("1,000");
				}
			});
		}


	});
</script>