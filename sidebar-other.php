<div class="others">
	<h3 class="sidebar-title"><?php echo get_opt('add_title1') ?></h3>
	<br/>

	<h3 class="sidebar-title"><?php echo get_opt('add_title2') ?></h3>
	<?php
		$wystext = get_opt('wystext');
		echo wpautop($wystext);
	?>

	<br/>

	<a class="btn btn-default" href="/contact-us/news-media-inquiries/"><h3 class="sidebar-title">NEWS ALERTS</h3></a>
</div>