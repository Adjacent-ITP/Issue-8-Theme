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

	<?php
		include('menu.php');
	?>

		<meta name="data" content="<?php echo get_template_directory_uri(); ?>" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/landing.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/articleList.js"></script>

		<div id="menu-buttons">
			<button id="article-arrow" onclick="openArticles()"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
			<button id="menu-arrow" onclick="moveMenu()"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
		</div>

			<div class="article-wrapper" >
				<?php 
					// the query
					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
					
					<?php if ( $wpb_all_query->have_posts() ) : ?>
					
					<ul class="article-list" id="articles">
					
						<!-- the loop -->
						<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
							<li class="article-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <h3><?php echo get_the_author(); ?></h3></li>
						<?php endwhile; ?>
						<!-- end of the loop -->
					</ul>
					
						<?php wp_reset_postdata(); ?>
					
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
			</div>

    	<div id="image" class="background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Intersect.svg');"></div>

	</main><!-- #main -->
<?php
 get_sidebar();
 get_footer();
