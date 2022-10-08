<?php
/*
 *	Template Name: 06 - Media - Resources - Template
 */ 
?>

<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 06-media-resources-template');

?>

<?php 

	$args = array(
		'banner_classes' => '',
		'title' => ''
		);

	wdb_get_banner( $args ); // Located in _wdbar/functions.php

?>

<div id="contact-content">
<div id="mediaresources">
<div class="container">
	<div class="uppersec">
		<?php $toptitle = get_field('add_title'); ?>
		<?php if( $toptitle ) : ?>
			<h2><?php echo $toptitle; ?></h2>
		<?php endif; ?>
		<div class="col-md-6 leftsec">
			<?php $toptext = get_field('add_text'); ?>
			<?php if( $toptext ) : ?>
				<?php echo wpautop($toptext); ?>
			<?php endif; ?>	
		</div>
		<div class="col-md-6 rightsec">
			<?php if ($info_center = get_field('accordion_options')) : ?>
			<div id="info-center">
				<div class="panel-group" id="accordion">
				    <?php foreach ($info_center as $key => $item) : ?>
					    <div class="panel panel-default">
					    	<div class="panel-heading">
					        	<h3 class="panel-title">
					         		<a data-toggle="collapse" data-parent="#accordion" 
					         			aria-expanded="false" 
					         			href="#collapse<?php echo $key; ?>"><?php echo $item['acc_title']; ?>
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
		<br clear="both">
	</div>
</div> <!-- container -->
	<div class="iconssec">
	<div class="container">
		<?php $rows = get_field('icons_options'); ?>
		<?php if ($rows) : ?>
		<div class="flexicons">
			<?php foreach ($rows as $row) : ?>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<?php $image = $row['icon']; ?>
				<?php $size_url = $image['sizes']['large']; 
				$link = $row['custom_link']; ?>
				<div class="blackframe">
				<?php  if( $link ): ?>			
					<a href="<?php echo $link['url']; ?>">
				<?php endif; ?>
					<div class="blupic" style="background-image: url('<?php echo $size_url; ?>');"></div>
					<?php if( $link ): ?>
					</a>		
				<?php endif; ?>	
				</div>
				<?php 
				if( $link ): ?>				
					<a href="<?php echo $link['url']; ?>">
				<?php endif; ?>
					<h4 class="icontitle">
						<?php echo $link['title']; ?>
					</h4>
				<?php if( $link ): ?>
					</a>		
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	</div>

	<div class="lastsec">
		<div class="col-md-6 col-xs-12 vlightgray centered">
			<?php $toptitle = get_field('leader_title'); ?>
			<?php if( $toptitle ) : ?>
				<h3><?php echo $toptitle; ?></h3>
			<?php endif; ?>
			<?php $rows = get_field('key_leaders'); ?>
			<?php if ($rows) : ?>
				<div class="keyleaders">
				<?php foreach ($rows as $row) : ?>
				<div class="keyleader row">
					<?php $image = $row['image']; ?>
					<?php $size_url = $image['sizes']['medium']; ?>
					<div class="col-md-4 col-xs-6">
						<div class="portrait" style="background-image: url('<?php echo $size_url; ?>')"></div>
					</div>
					<div class="col-md-8 col-xs-6">
						<?php if ($row['title']) : ?>
							<h4><?php echo $row['title']; ?></h4> 
						<?php endif; ?>
						<?php if ($row['position']) : ?>
							<h5><?php echo $row['position']; ?></h5> 
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php 
			$link = get_field('add_link');
			if( $link ): ?>					
				<a href="<?php echo $link['url']; ?>">
					<?php echo $link['title']; ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="col-md-6 col-xs-12 lightgray centered">
			<?php $toptitle = get_field('inq_title'); ?>
			<?php if( $toptitle ) : ?>
				<h3><?php echo $toptitle; ?></h3>
			<?php endif; ?>
			<?php $toptext = get_field('inq_text'); ?>
			<?php if( $toptext ) : ?>
				<?php echo wpautop($toptext); ?>
			<?php endif; ?>	
			<?php $email = get_field('add_email'); ?>
			<a href="mailto:<?php echo $email; ?>">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</a>
			<?php $mailto = get_field('reciever'); ?>
			<?php if( $mailto ) : ?>
				<h5><?php echo $mailto; ?></h5>
			<?php endif; ?>
		</div>
	</div>
		
</div>	
</div><!-- #content -->

<?php get_footer(); ?>