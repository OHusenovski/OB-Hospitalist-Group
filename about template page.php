<?php
/*
 *	Template Name: 12 - About - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 12-about-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="about-content">
	
	<div class="container">
		<div class="top-section">
			<div class="col-md-12">
				<?php $maintitle = get_field('topmain_title'); ?>
				<?php if( $maintitle ) : ?>
					<h2><?php echo $maintitle; ?></h2>
				<?php endif; ?>
				<?php $toptitle = get_field('top_title'); ?>
				<?php if( $toptitle ) : ?>
					<h3><?php echo $toptitle; ?></h3>
				<?php endif; ?>
			</div>
			<div class="col-md-6 col-xs-12 leftsec">
				<?php $toptext = get_field('top_text'); ?>
				<?php if( $toptext ) : ?>
					<?php echo wpautop($toptext); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-6 col-xs-12 rightsec">
				<div class="embed-container">
					<?php echo get_field('add_video'); ?>
				</div>
			</div>
		</div>		
	</div> <!-- container -->	

	<?php $image = get_field('vision_img'); ?>
	<?php $size_url = $image['sizes']['large']; ?>
	<div class="visionsec" style="background-image: url('<?php echo $size_url; ?>');">
		<div class="container">
			<?php $visiontitle = get_field('vision_title'); ?>
			<?php if( $visiontitle ) : ?>
				<h2 class="centered"><?php echo $visiontitle; ?></h2>
			<?php endif; ?>
			<div class="col-md-12">
				<?php $visiontext = get_field('vision_text'); ?>
				<?php if( $visiontext ) : ?>
					<?php echo wpautop($visiontext); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="clinadv" id="valuessec">
	<div class="container">
		<?php $valuetitle = get_field('values_title'); ?>
		<?php if( $valuetitle ) : ?>
			<h2><?php echo $valuetitle; ?></h2>
		<?php endif; ?>
		<?php $rows = get_field('values_items'); ?>
		<?php if ($rows) : ?>
		<div class="flexrows">
			<?php foreach ($rows as $row) : ?>
				<div class="valuesblock">
					<?php $image = $row['values_icon']; ?>
					<?php $size_url = $image['sizes']['large']; ?>
				   	<div class="advpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
				   	<?php if ($row['values_title']) : ?>
						<h4 class="icontitle"><?php echo $row['values_title']; ?></h4> 
					<?php endif; ?>
					<?php $valuestext = $row['values_text']; ?>
					<?php if( $valuestext ) : ?>
						<?php echo wpautop($valuestext); ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	</div>

	<div class="downloadsec">
		<div class="container">
			<?php $downloadtitle = get_field('add_title'); ?>
			<?php if( $downloadtitle ) : ?>
				<h2><?php echo $downloadtitle; ?></h2>
			<?php endif; ?>	
			<?php $filetxt = get_field('file_text'); ?>
			<?php $file = get_field('attach_file'); ?>
			<?php if( $file ) : ?>
				<a href="<?php echo $file['url']; ?>"><i class="fa fa-download"></i> <?php echo $filetxt; ?></a>
			<?php endif; ?>
		</div>
	</div>

	<div class="container">
		<div class="benefitssec">
			<?php $missiontitle = get_field('mission_title'); ?>
			<?php if( $missiontitle ) : ?>
				<h2 class="centered"><?php echo $missiontitle; ?></h2>
			<?php endif; ?>

			<?php $missiontext = get_field('mission_text'); ?>
			<?php if( $missiontext ) : ?>
				<?php echo wpautop($missiontext); ?>
			<?php endif; ?>

			<?php $rows = get_field('mission_items'); ?>
			<?php if ($rows) : ?>
			<div class="flexicons">
				<?php foreach ($rows as $row) : ?>
					<div class="col-md-4 col-xs-6">
						<?php $image = $row['mission_image']; ?>
						<?php $size_url = $image['sizes']['large']; ?>
					   	<div class="benefpic" style="background-image: url('<?php echo $size_url; ?>');"></div>
					   	<?php if ($row['mission_title']) : ?>
							<h4 class="icontitle"><?php echo $row['mission_title']; ?></h4> 
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>

		<div class="threeblocks">
			<div class="col-md-4 col-xs-12">
		   		<div class="singleblock">
		   			<?php $icon = get_field('add_icon1'); ?>
		   			<?php if( $icon ) : ?>
						<h2><i class="fa fa-<?php echo $icon; ?>"></i></h2>
					<?php endif; ?>
			   		<?php 
					$link = get_field('add_title1');
					if( $link ): ?>					
						<a class="button" href="<?php echo $link['url']; ?>">
							<h3><?php echo $link['title']; ?></h3>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
		   		<div class="singleblock">
		   			<?php $icon = get_field('add_icon2'); ?>
		   			<?php if( $icon ) : ?>
						<h2><i class="fa fa-<?php echo $icon; ?>"></i></h2>
					<?php endif; ?>
			   		<?php 
					$link = get_field('add_title2');
					if( $link ): ?>					
						<a class="button" href="<?php echo $link['url']; ?>">
							<h3><?php echo $link['title']; ?></h3>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
		   		<div class="singleblock">
		   			<?php $icon = get_field('add_icon3'); ?>
		   			<?php if( $icon ) : ?>
						<h2><i class="fa fa-<?php echo $icon; ?>"></i></h2>
					<?php endif; ?>
			   		<?php 
					$link = get_field('add_title3');
					if( $link ): ?>					
						<a class="button" href="<?php echo $link['url']; ?>">
							<h3><?php echo $link['title']; ?></h3>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
			
</div><!-- #about-content -->



<?php get_footer(); ?>