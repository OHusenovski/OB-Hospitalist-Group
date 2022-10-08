<?php
/*
 *	Template Name: 14 - Contact - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 14-patients-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="contact-content">
	
	<div class="container">
		<div class="uppersec">
			<?php $toptitle = get_field('upper_title'); ?>
			<?php if( $toptitle ) : ?>
				<h2><?php echo $toptitle; ?></h2>
			<?php endif; ?>
			<?php $toptext = get_field('upper_text'); ?>
			<?php if( $toptext ) : ?>
				<?php echo wpautop($toptext); ?>
			<?php endif; ?>
			<div class="col-md-6 leftsec">
				<?php $subtitle = get_field('leftsub_title'); ?>
				<?php if( $subtitle ) : ?>
					<h4><?php echo $subtitle; ?></h4>
				<?php endif; ?>

				<?php $rows = get_field('custom_links'); ?>
				<?php if ($rows) : ?>
				<div class="linksblock">
					<?php foreach ($rows as $row) : ?>
						<div class="blacklink">
						   	<?php 
							$blink = $row['add_clink'];
							if( $blink ): ?>				
								<a href="<?php echo $blink['url']; ?>">
									<h5 class="mb-0"><?php echo $blink['title']; ?> <i class="fa fa-angle-right rotate-icon"></i></h5>
								</a>		
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<?php if ($info_center = get_field('accordions_options')) : ?>
				<div id="info-center">
					<div class="panel-group" id="accordion">
					    <?php foreach ($info_center as $key => $item) : ?>
						    <div class="panel panel-default">
						    	<div class="panel-heading">
						        	<h3 class="panel-title">
						         		<a data-toggle="collapse" data-parent="#accordion" 
						         			aria-expanded="false" 
						         			href="#collapse<?php echo $key; ?>">
						         			<h5 class="mb-0"><?php echo $item['acc_title']; ?> <i class="fa fa-angle-right rotate-icon"></i></h5>
						         		</a>
						        	</h3>
						      	</div>
							    <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse">
							        <div class="panel-body">
							        	<p><?php echo $item['acc_text']; ?></p>
							        </div>
							    </div>
						    </div>
					   <?php endforeach; ?>
					</div> 
				</div>
				<?php endif; ?>	
			</div>
			<div class="col-md-6 rightsec">
				<?php $subtitle = get_field('rightsub_title'); ?>
				<?php if( $subtitle ) : ?>
					<h4><?php echo $subtitle; ?></h4>
				<?php endif; ?>

				<?php $rows = get_field('location_items'); ?>
				<?php if ($rows) : ?>
				<div class="locitems">
					<?php foreach ($rows as $row) : ?>
						<div class="singleitem">
						   	<?php if ($row['add_text']) : ?>
								<?php echo wpautop($row['add_text']); ?> 
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>		
	</div> <!-- container -->	

	<div class="bluesection">
	<div class="container">
		<?php $formtitle = get_field('form_title'); ?>
		<?php if( $formtitle ) : ?>
			<h4><?php echo $formtitle; ?></h4>
		<?php endif; ?>

		<?php
			if (have_posts()) :
			   while (have_posts()) :
			      the_post();
			         the_content();
			   endwhile;
			endif;
		?>
	</div>	
	</div>		
		
</div><!-- #contact-content -->



<?php get_footer(); ?>