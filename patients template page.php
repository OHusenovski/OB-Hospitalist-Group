<?php
/*
 *	Template Name: 15 - Patients - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 15-patients-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="patients-content">
	
	<div class="container">
		<div class="top-section">
			<div class="col-md-6 col-xs-12 leftsec">
				<?php $toptitle = get_field('top_title'); ?>
				<?php if( $toptitle ) : ?>
					<h2><?php echo $toptitle; ?></h2>
				<?php endif; ?>
				<?php $toptext = get_field('top_text'); ?>
				<?php if( $toptext ) : ?>
					<?php echo wpautop($toptext); ?>
				<?php endif; ?>
				<?php 
				$link = get_field('top_link');
				if( $link ): ?>					
					<a href="<?php echo $link['url']; ?>" target="_blank">
						<?php echo $link['title']; ?>
					</a>
				<?php endif; ?>
			</div>
			<div class="col-md-6 col-xs-12 rightsec">
				<div class="embed-container">
					<?php echo get_field('add_video'); ?>
				</div>
			</div>
		</div>		
	</div> <!-- container -->	

	<div class="iconssec">
		<div class="container">		
		<?php $rows = get_field('icons_options'); ?>
		<?php if ($rows) : ?>
		<div class="flexicons">
			<?php foreach ($rows as $row) : ?>
				<div class="col-md-3 col-xs-6">
					<?php $image = $row['icon']; ?>
					<?php $size_url = $image['sizes']['large']; ?>
					<?php $link = $row['ic_link']; ?>
				   	<?php if( $link ): ?>
						<a href="<?php echo $link['url']; ?>">
							<div class="advpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
							<h4 class="icontitle">
								<?php echo $link['title']; ?>
							</h4>
						</a>		
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		</div>
	</div>

	<div class="container">
		<div class="whosection">
			<?php $whotitle = get_field('who_title'); ?>
			<?php if( $whotitle ) : ?>
				<h2 class="centered"><?php echo $whotitle; ?></h2>
			<?php endif; ?>
            <div class="col-md-6 leftsec">
				<?php $whotext = get_field('who_text'); ?>
				<?php if( $whotext ) : ?>
					<?php echo wpautop($whotext); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 rightsec">
				<?php $image = get_field('who_image'); ?>
				<?php $size_url = $image['sizes']['large']; ?>
			   	<div class="greypic" style="background-image: url('<?php echo $size_url; ?>');"></div>
			</div>
		</div>
	</div>
	
	<?php $image = get_field('what_img'); ?>
	<?php $size_url = $image['sizes']['large']; ?>
	<div class="whatsection" style="background-image: url('<?php echo $size_url; ?>');">
		<div class="container">
			<?php $whattitle = get_field('what_title'); ?>
			<?php if( $whattitle ) : ?>
				<h2 class="centered"><?php echo $whattitle; ?></h2>
			<?php endif; ?>
			<div class="col-md-12">
				<?php $whattext = get_field('what_text1'); ?>
				<?php if( $whattext ) : ?>
					<?php echo wpautop($whattext); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 leftsec bordright">
				<?php $whattext = get_field('what_text2'); ?>
				<?php if( $whattext ) : ?>
					<?php echo wpautop($whattext); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 rightsec">
				<?php $whattext = get_field('what_text3'); ?>
				<?php if( $whattext ) : ?>
					<?php echo wpautop($whattext); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="benefitssec">
			<?php $beneftitle = get_field('benef_title'); ?>
			<?php if( $beneftitle ) : ?>
				<h2 class="centered"><?php echo $beneftitle; ?></h2>
			<?php endif; ?>

			<?php $beneftext = get_field('benef_text'); ?>
			<?php if( $beneftext ) : ?>
				<?php echo wpautop($beneftext); ?>
			<?php endif; ?>

			<?php $rows = get_field('benefits_items'); ?>
			<?php if ($rows) : ?>
			<div class="flexicons">
				<?php foreach ($rows as $row) : ?>
					<div class="col-md-4 col-xs-6">
						<?php $image = $row['benef_image']; ?>
						<?php $size_url = $image['sizes']['large']; ?>
						<div class="coloredframe">
					   		<div class="benefpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
					   	</div>
					   	<?php if ($row['benefits_title']) : ?>
							<h4 class="icontitle"><?php echo $row['benefits_title']; ?></h4> 
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
		
		
</div><!-- #patients-content -->



<?php get_footer(); ?>