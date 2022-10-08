<?php 
	$terms = get_terms( 'news_category', array(
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