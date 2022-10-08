<?php if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
} ?>

<?php 
	if ( isset($args['category']) && !empty( trim($args['category']) ) )
		$category = trim($args['category']);
	else
		$category = 'news_release_category';
 ?>

<?php 
	$terms = get_terms( $category, array(
	 					'hide_empty' => false,
	)); 
?>
<h2 class="sidebar-title cat">Categories</h2>
<div id="sidebar-categories">
	<?php foreach ($terms as $t): ?>

		<div class="post-name">
			<a href="<?php echo get_term_link($t->term_id); ?>"><?php echo $t->name; ?></a>
		</div>

	<?php endforeach ?>
</div>