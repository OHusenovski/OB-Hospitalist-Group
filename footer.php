<?php
/**
 * File Security Check
 */
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}
?>
</main><!-- #main -->

<div id="footer-parent">

	<footer>
		
		<div id="footer-top" class="ypart">
			<div class="uppercurve"></div>
			<div class="container">
				<div class="css-grid">
					<?php $yimages = get_opt('yimages'); ?>
					<div class="css-grid-el">
						<?php 
						$link = $yimages['1st_link'];
						if( $link ): ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
							<div class="borderedtxt">
								<?php if ($yimages['1st_img']) : ?>
									<img class="transpicon" src="<?php echo $yimages['1st_img']['url']; ?>">
								<?php endif ?>
								<?php if ($yimages['block_title1']) : ?>
									<h5><?php echo $yimages['block_title1']; ?></h5>
								<?php endif; ?>
								<?php if ($yimages['block_message1']) : ?>
									<h4><?php echo $yimages['block_message1']; ?></h4>
								<?php endif; ?>
							</div>
						</a>
					<?php endif; ?>
				</div>

				<div class="css-grid-el">
					<?php 
					$link = $yimages['2nd_link'];
					if( $link ): ?>
					<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
						<div class="borderedtxt">
							<?php if ($yimages['2nd_img']) : ?>
								<img class="transpicon" src="<?php echo $yimages['2nd_img']['url']; ?>">
							<?php endif ?>
							<?php if ($yimages['block_title2']) : ?>
								<h5><?php echo $yimages['block_title2']; ?></h5>
							<?php endif; ?>
							<?php if ($yimages['block_message2']) : ?>
								<h4><?php echo $yimages['block_message2']; ?></h4>
							<?php endif; ?>
						</div>
					</a>
				<?php endif; ?>
			</div>

			<div class="css-grid-el">
				<?php 
				$link = $yimages['3rd_link'];
				if( $link ): ?>
				<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
					<div class="borderedtxt">
						<?php if ($yimages['3rd_img']) : ?>
							<img class="transpicon" src="<?php echo $yimages['3rd_img']['url']; ?>">
						<?php endif ?>
						<?php if ($yimages['block_title3']) : ?>
							<h5><?php echo $yimages['block_title3']; ?></h5>
						<?php endif; ?>
						<?php if ($yimages['block_message3']) : ?>
							<h4><?php echo $yimages['block_message3']; ?></h4>
						<?php endif; ?>
					</div>
				</a>
			<?php endif; ?>
		</div>
	</div>	
</div>	<!-- container -->
</div>	<!-- footer-top -->

<div id="footer-middle">
	<div class="container">
		<div class="col-md-4 helpful">
			<h3>HELPFUL LINKS</h3>
			<?php $rows = get_opt('helpful_links'); ?>
			<?php if ($rows) : ?>			
				<?php foreach ($rows as $row) : ?>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<?php 
						$link = $row['add_custom_link'];
						if( $link ): ?>
						<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
							<p><?php echo $link['title']; ?></p>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>				
		<?php endif; ?>	
	</div>

	<div class="col-md-4 contactitems">
		<h3>CONTACT US</h3>
		<?php $rows = get_opt('contact_us_options'); ?>
		<?php if ($rows) : ?>
			<?php foreach ($rows as $row) : ?>
				<?php if ($row['add_text']) : ?>
					<p><?php echo $row['add_text']; ?></p>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<div class="col-md-4 connectitems">
		<h3>CONNECT</h3>
		<?php $social = get_opt('social_links'); ?>
		<div class="foot-social-icons-wrap">
			<?php if (!empty($social['facebook'])): ?>
				<a href="<?php echo $social['facebook']; ?>" target="_blank">
					<i class="fa fa-facebook fcb" aria-hidden="true"></i>
				</a>
			<?php endif ?>
			<?php if (!empty($social['twitter'])): ?>
				<a href="<?php echo $social['twitter']; ?>" target="_blank">
					<i class="fa fa-twitter twtr" aria-hidden="true"></i>
				</a>
			<?php endif ?>
			<?php if (!empty($social['linkedin'])): ?>
				<a href="<?php echo $social['linkedin']; ?>" target="_blank">
					<i class="fa fa-linkedin lnk" aria-hidden="true"></i>
				</a>
			<?php endif ?>
			<?php if (!empty($social['youtube'])): ?>
				<a href="<?php echo $social['youtube']; ?>" target="_blank">
					<i class="fa fa-youtube-play ytb" aria-hidden="true"></i>
				</a>
			<?php endif ?>
			<?php if (!empty($social['podcast'])): ?>
				<a href="<?php echo $social['podcast']; ?>" target="_blank">
					<i class="fa fa-microphone " aria-hidden="true"></i>
				</a>
			<?php endif ?>
		</div>
		<div class="others">
			<a href="/sign-up-for-our-blog/" class="btn btn-default"><h4 style="margin-top:0px">GET BLOG UPDATES</h4></a></div>

		</div>
	</div> 	<!-- .container -->			
</div>	<!-- #footer-middle -->

<div id="footer-bottom" class="greypart">
	<div class="container">
		<div class="col-md-2">
			<?php 
			$link = get_opt('logo_image_link');
			if( $link ): ?>
			<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
				<?php $logoimg = get_opt('logo_image'); ?>
				<?php if ($logoimg) : ?>
					<div class="whiteicon" style="background: url('<?php echo $logoimg['url']; ?>') no-repeat center"></div>

				<?php endif ?>
			</a>
		<?php endif; ?>
	</div>

	<div class="col-md-6 threelinks">
		<?php $greylinks = get_opt('grey_custom_links'); ?>
		<?php 
		$link = $greylinks['first_link'];
		if( $link ): ?>
		<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
			<p><?php echo $link['title']; ?></p>
		</a>
	<?php endif; ?>

	<?php 
	$link = $greylinks['second_link'];
	if( $link ): ?>
	<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
		<p class="sideborders"><?php echo $link['title']; ?></p>
	</a>
<?php endif; ?>

<?php 
$link = $greylinks['third_link'];
if( $link ): ?>
<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
	<p><?php echo $link['title']; ?></p>
</a>
<?php endif; ?>
<?php 
$link = $greylinks['fourth_link'];
if( $link ): ?>
<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" >
	<p><?php echo $link['title']; ?></p>
</a>
<?php endif; ?>
</div>

<div class="col-md-2 copyrmessage">
	<p>&copy; <?php echo date('Y') . ' ' . get_opt('copyright_message'); ?></p>
</div>
<div class="col-md-2 copyrmessage">
	<a href="https://www.bbb.org/us/sc/greenville/profile/medical-service-organization/ob-hospitalist-group-0673-90023686/#sealclick" target="_blank"><img src="https://seal-upstatesc.bbb.org/seals/black-seal-200-42-whitetxt-bbb-90023686.png" style="border: 0;" alt="OB Hospitalist Group BBB Business Review" /></a>
</div>
</div> 	<!-- .container -->			
</div>	<!-- #footer-bottom -->	
<script src="https://js.adsrvr.org/up_loader.1.1.0.js"
type="text/javascript"></script>
<script type="text/javascript">
ttd_dom_ready( function() {
if (typeof TTDUniversalPixelApi === 'function') {
var universalPixelApi = new TTDUniversalPixelApi();
universalPixelApi.init("8y530zj", ["vwdg0mw"],
"https://insight.adsrvr.org/track/up");
}
});
</script>
</footer>
</div>	<!-- footer-parent -->

<?php wp_footer(); // wp_footer ?>
<script type="text/javascript"> _linkedin_partner_id = "165729"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=165729&fmt=gif" /> </noscript>
<script type="text/javascript" src="https://analytics.clickdimensions.com/ts.js" > </script>

<script type="text/javascript">
	var cdAnalytics = new clickdimensions.Analytics('analytics.clickdimensions.com');
	cdAnalytics.setAccountKey('alnWtBFrkRkKUqe08zj4E4');
	cdAnalytics.setDomain('www.obhg.com');
	cdAnalytics.setScore(typeof(cdScore) == "undefined" ? 0 : (cdScore == 0 ? null : cdScore));
	cdAnalytics.trackPage();
</script>

<script type="text/javascript" src="https://analytics.clickdimensions.com/js/ClickDGravityFormMapper.min.js">
</script>
<?php if($post->post_name == 'sign-up-for-our-blog'): ?>
	<script type="text/javascript">
		var mapper = ClickDGravityFormsMapper();
		mapper.Init({
			Url: 'http://analytics.clickdimensions.com/forms/h/a5R8zjpyqhUGeGsur5kHAA',
			FormId: 'gform_8',
			Mapping: [
			{ GFId: 'input_8_3', CDId: 'Comments'},
			{ GFId: 'input_8_5', CDId: 'Company_name'},
			{ GFId: 'input_8_7', CDId: 'Lastname'},
			{ GFId: 'input_8_4', CDId: 'Firstname'},
			{ GFId: 'input_8_2', CDId: 'Emailaddress'},
			]
		});
	</script>
<?php endif; ?>
<?php if($post->post_name == 'partner-with-us'): ?>
	<script type="text/javascript">
		var mapper = ClickDGravityFormsMapper();
		mapper.Init({
			Url: 'http://analytics.clickdimensions.com/forms/h/aIPpnOhynJkXOV1VXahXQQ',
			FormId: 'gform_2',
			Mapping: [
			{ GFId: 'input_2_7', CDId: 'Comments'},
			{ GFId: 'input_2_4', CDId: 'phone'},
			{ GFId: 'input_2_5', CDId: 'jobtitle'},
			{ GFId: 'input_2_6', CDId: 'Company_name'},
			{ GFId: 'input_2_2', CDId: 'Lastname'},
			{ GFId: 'input_2_1', CDId: 'Firstname'},
			{ GFId: 'input_2_3', CDId: 'Emailaddress'},
			]
		});
	</script>
<?php endif; ?>
<?php if($post->post_name == 'example-rfp'): ?>
	<script type="text/javascript">
		var mapper = ClickDGravityFormsMapper();
		mapper.Init({
			Url: 'http://analytics.clickdimensions.com/forms/h/a4PtlfY6bukdTjMKldCwiw',
			FormId: 'gform_1',
			Mapping: [
			{ GFId: 'input_1_4', CDId: 'phone'},
			{ GFId: 'input_1_5', CDId: 'jobtitle'},
			{ GFId: 'input_1_6', CDId: 'Company_name'},
			{ GFId: 'input_1_2', CDId: 'Lastname'},
			{ GFId: 'input_1_1', CDId: 'Firstname'},
			{ GFId: 'input_1_3', CDId: 'Emailaddress'},
			]
		});
	</script>
<?php endif; ?>
<?php if($post->post_name == 'industry-insights-maternal-health-accreditation-standards'): ?>
	<script type="text/javascript">
		var mapper = ClickDGravityFormsMapper();
		mapper.Init({
			Url: 'http://analytics.clickdimensions.com/forms/h/aZZzPKDOUutNbdPW3HFhA',
			FormId: 'gform_9',
			Mapping: [
			{ GFId: 'input_9_11', CDId: 'phone'},
			{ GFId: 'input_9_5', CDId: 'jobtitle'},
			{ GFId: 'input_9_6', CDId: 'Company_name'},
			{ GFId: 'input_9_2', CDId: 'Lastname'},
			{ GFId: 'input_9_1', CDId: 'Firstname'},
			{ GFId: 'input__9_3', CDId: 'Emailaddress'},
			]
		});
	</script>
<?php endif; ?>
<?php if($post->post_name == 'join-our-team-form-success'): ?>
	<img height="1" width="1" style="border-style:none;" alt=""
src="https://insight.adsrvr.org/track/pxl/?adv=8y530zj&ct=0:bw12cxb&fmt=3"/>
<?php endif; ?>
<?php if($post->post_name == 'peer-referral-form-success'): ?>
	<img height="1" width="1" style="border-style:none;" alt=""
src="https://insight.adsrvr.org/track/pxl/?adv=8y530zj&ct=0:ijw0x8z&fmt=3"/>
<?php endif; ?>
<?php if($post->post_name == 'job-alerts-form-success'): ?>
	<img height="1" width="1" style="border-style:none;" alt=""
src="https://insight.adsrvr.org/track/pxl/?adv=8y530zj&ct=0:mdk542f&fmt=3"/>
<?php endif; ?>
<script type="text/javascript">
_linkedin_partner_id = "3360249";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=3360249&fmt=gif" />
</noscript>

</body>
</html>