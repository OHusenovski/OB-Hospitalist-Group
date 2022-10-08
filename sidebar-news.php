<?php 
	$terms_year = array(
		'post_type' => 'news',
		'posts_per_page'    => -1,
		'post_status'    => 'publish',
		'orderby' => 'date',
		'order' => 'DESC'
	);

	$years = array();
	$query_year = new WP_Query( $terms_year );

	if ( $query_year->have_posts() ) :
	    while ( $query_year->have_posts() ) : $query_year->the_post();
	        $year = get_the_date('Y');
	        if(!in_array($year, $years)){
	            $years[] = $year;
	        }
	    endwhile;
	    wp_reset_postdata();
	endif;
?>

<h2 class="sidebar-title">Archives</h2>

<div id="sidebar-news">
	<?php foreach ($years as $y): ?>

		<?php $ar = array(
			'post_type' => 'news',
			'posts_per_page'    => -1,
			'post_status'    => 'publish',		
			'orderby' => 'date',
			'order' => 'DESC',
			'year' => $y
		); ?>	
		<?php $posts = get_posts($ar); ?>

		<div class="panel-group" id="accordion">	    
		    <div class="panel panel-default">
		      <div class="panel-heading">
		        <h4 class="panel-title">
		          <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $y; ?>" aria-expanded="false" class="collapsed">
		          	<?php echo $y; ?>
		          </a>
		        </h4>
		      </div>
		      <div id="collapse-<?php echo $y; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
		        <div class="panel-body">	        
					<?php foreach ($posts as $p): ?>
						<div class="post-name">
							<a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a>
						</div>
					<?php endforeach; ?>
		        </div>
		      </div>
		    </div>
		</div>

	<?php endforeach ?>
</div>