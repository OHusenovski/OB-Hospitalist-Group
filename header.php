<?php

/**
 * File Security Check
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('You do not have sufficient permissions to access this page!');
	global $post;
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js lt-ie9 lt-ie8 ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js lt-ie9 ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<?php wp_head(); // wp_head 
	?>

	<!-- Hotjar Tracking Code for https://www.obhg.com/ -->
	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 2685398,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>
	<!-- OB Hospitalist Group Container Tag; Do not remove or alter code in any way. Generated: 4/30/2020 -->


	<!-- Placement: Paste this code as high in the <head> of the page as possible. -->
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-N2FSD8');
	</script>
	<!-- End Google Tag Manager -->
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-5DRZBWF');
	</script>
	<!-- End Google Tag Manager -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-970550238"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-970550238');
</script>

	<!-- Twitter universal website tag code -->
	<script>
		! function(e, t, n, s, u, a) {
			e.twq || (s = e.twq = function() {
					s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
				}, s.version = '1.1', s.queue = [], u = t.createElement(n), u.async = !0, u.src = '//static.ads-twitter.com/uwt.js',
				a = t.getElementsByTagName(n)[0], a.parentNode.insertBefore(u, a))
		}(window, document, 'script');
		// Insert Twitter Pixel ID and Standard Event data below
		twq('init', 'nv06p');
		twq('track', 'PageView');
	</script>
	<!-- End Twitter universal website tag code -->
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700,700i,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

	<meta name="google-site-verification" content="eBavSpkh8FPIFFdw8z7GcX0xouwTmxMpdeWCBkhaL-E" />

</head>

<body <?php hybrid_attr('body'); ?>>
	<!-- Placement: Additionally, paste this code immediately after the opening <body> tag. -->
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N2FSD8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DRZBWF" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div id="header-parent" class="header-curved">
		<div class="header-parent-bg"></div>
		<header class="menu-container navbar navbar-default" <?php hybrid_attr('header'); ?>>

			<div class="container position-initial">
				<?php $clink = get_opt('call_to_action'); ?>
				<?php if (!empty($clink)) : ?>
					<div class="header-podcast-link-top" style="display: none;">
						<p style="text-align: center;"> <a href="<?php echo $clink['url']; ?>"><?php echo $clink['title']; ?></a></p>
					</div>
				<?php endif ?>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>


				<div id="site-branding" class="site-navbar-brand">
					<?php $logo = get_opt('header_logo'); ?>
					<?php $logo_mobile = get_opt('header_logo_mobile'); ?>
					<?php if (isset($logo)) : ?>
						<a href="<?php echo site_url(); ?>" class="site-branding-link desktop-branding">
							<?php echo wdb_responsive_img($logo); ?>
						</a>
						<a href="<?php echo site_url(); ?>" class="site-branding-link mobile-branding">
							<?php echo wdb_responsive_img($logo_mobile); ?>
						</a>
					<?php endif ?>

					<div class="logo-tagline">
						<?php $tagline = get_opt('tag_line');
						if (!empty($tagline)) : ?>
							<p><a href="<?php echo site_url(); ?>"><em><?php echo $tagline; ?></em></a></p>
						<?php endif; ?>
						<p class="header-podcast-link-bottom"><a href="<?php echo $clink['url']; ?>"><?php echo $clink['title']; ?>

							</a></p>
					</div>

				</div><!-- #branding -->



				<?php wdb_use_menu_hover_dropdown(); ?>
				<?php get_template_part('menu', 'primary'); /* Loads the menu-primary.php template */ ?>

			</div><!-- .container -->

		</header><!-- #header -->
	</div>

	<main <?php hybrid_attr('content'); ?>>