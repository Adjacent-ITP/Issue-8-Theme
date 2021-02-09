<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package issue-8
 */

get_header();
?>
	<main id="primary" class="site-main">

    	<div id="image" class="background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Intersect.svg');"></div>
		<meta name="data" content="<?php echo get_template_directory_uri(); ?>" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/landing.js"></script>

		<div id="menu-buttons">
			<button id="article-arrow"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
			<button id="menu-arrow"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
		</div>
	</main><!-- #main -->
<?php
// get_sidebar();
// get_footer();
