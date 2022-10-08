<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die ( 'You do not have sufficient permissions to access this page!' );
}

get_header(); // Loads the header.php template. 

dev_comment('tpl: 01-home-page');

?>

<?php include_locate( 'template-parts/home-hero-section.php' ); ?>

<?php include_locate( 'template-parts/home-video-content.php' ); ?>

<?php include_locate( 'template-parts/home-counters-section.php' ); ?>

<?php include_locate( 'template-parts/home-what-we-do-section.php' ); ?>

<?php include_locate( 'template-parts/home-testimonials-section.php' ); ?>

<?php include_locate( 'template-parts/home-blog-section.php' ); ?>

<?php include_locate( 'template-parts/home-latest-news-section.php' ); ?>

<?php get_footer(); // Loads the footer.php template. ?>