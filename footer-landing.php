<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package issue-8
 */

?>
<div id="footer-landing">
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/articleList.js"></script>
	<div id="menu-buttons">
		<button id="article-arrow" onclick="openArticles()"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
		<button id="menu-arrow" onclick="moveMenu()"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
	</div>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<span><span class="footer__title">ADJACENT</span> Issue 8, published by ITP & IMA, Tisch School of the Arts, New York University. Accessibility. Subscribe to the newsletter.</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
