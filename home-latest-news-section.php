<?php

dev_comment('tpl-part: home-latest-news-section');

$args = array(
	'post_type' => 'news',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC'	
	);

$news = get_posts($args);

$args = array(
	'post_type' => 'job',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby' => 'date',
	'order' => 'DESC'	
	);

$jobs = get_posts($args);

?>

<section id="home-latest-news-section">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6">
				<h2>Latest News</h2>
				<?php foreach ($news as $item) : ?>
					<?php 
					$p = get_post($item->ID);
					$content = $p->post_content; 
					?>
					<?php $img = get_field('news_img',$item->ID)['url']; ?>
					<?php if(!$img) $img = get_opt('news_default_image')['url']; ?>
					<a class="news-item" href="<?php echo get_the_permalink($item->ID); ?>">
						<div style="background-image: url(<?php echo $img; ?>);" class="news-img"></div>
						<div class="news-content">
							<p class="date"><?php echo get_the_date('m/d/y',$item->ID); ?></p>
							<h4><?php echo get_the_title($item->ID); ?></h4>
							<p><?php echo excerpt(25,false,$content) ?></p>
						</div>
					</a>
				<?php endforeach; ?>

			</div>
			
			<div class="col-md-6 jobs">
				<h2>Featured Clinical Jobs</h2>
				<div class="row">
					<?php foreach ($jobs as $item) : ?>
						<?php if(get_field('featured',$item->ID)): ?>
							<div class="job">
								<a href="<?php echo get_the_permalink($item->ID); ?>">
									<h4><?php echo get_the_title($item->ID); ?></h4>
									<?php $hospitals = get_field( 'featured_hospitals', $item->ID ); ?>
									<?php $hospits = array(); ?>
									<?php foreach ($hospitals as $hosp) : ?>
										<?php $hospits[] = get_the_title($hosp); ?>
									<?php endforeach; ?>
									<div id="job-details">
									<h5 class="job-loc"><?php echo implode(" | ", $hospits); ?></h5>
									</div>
								</a>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>

				<form action="job-listings/" method="get">
					
					<h4>Search Job Listings by State</h4>
					
					<select name="state">
						<?php 
						$args = array(
							'hide_empty' => false,
							'orderby'=>'slug',
							'order' => 'ASC',
							);
						$locations = get_terms('state', $args);
						?>
						<option value="" selected disabled>Select State</option>
						<?php foreach ($locations as $loc) : ?>							
							<option value="<?php echo $loc->term_id; ?>" <?php if ($_GET['state'] == $loc->term_id) echo ' selected';?>>
								<?php echo $loc->name; ?>
							</option>
						<?php endforeach; ?>
					</select>

					<select name="position">
						<?php 
						$args = array(
							'post_type'      => 'job_type',
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'hide_empty' => false
							);
						$positions = get_posts($args); 
						?>
						<option value="" selected disabled>Job Category</option>
						<?php foreach ($positions as $pos) : ?>							
							<option value="<?php echo $pos->ID; ?>" <?php if ($_GET['position'] == $pos->ID) echo ' selected';?>>
								<?php echo $pos->post_title; ?>
							</option>
						<?php endforeach; ?>
					</select>

					<button type="submit"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button>

				</form> 
			</div>

		</div>
	</div>
</section>