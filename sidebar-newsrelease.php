<?php if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
} ?>

<?php 
	if ( isset($args['post_type']) && !empty( trim($args['post_type']) ) )
		$post_type = trim($args['post_type']);
	else
		$post_type = 'news_releases';
 ?>

<?php 
	$terms_year = array(
		'post_type' => $post_type,
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
	<?php foreach ($years as $k => $y): ?>

		<?php $ar = array(
			'post_type' => $post_type,
			'posts_per_page'    => -1,
			'post_status'    => 'publish',		
			'orderby' => 'date',
			'order' => 'DESC',
			'year' => $y
		); ?>	
		<?php $posts = get_posts($ar); ?>
		<div class="panel-group" id="accordion-<?php echo $y; ?>">	    
		    <div class="panel panel-default <?php if($k == 0) echo 'active'; ?>">
		      <div class="panel-heading">
		        <h4 class="panel-title">
		          <a data-toggle="collapse" data-parent="#accordion-<?php echo $y; ?>" href="#collapse-<?php echo $y; ?>" aria-expanded="false" class="collapsed">
		          	<?php echo $y; ?>
		          </a>
		        </h4>
		      </div>
		      <div id="collapse-<?php echo $y; ?>" class="panel-collapse collapse <?php if($k == 0) echo ' in'; ?>" aria-expanded="false">
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
