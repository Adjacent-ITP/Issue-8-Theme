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

//get_header();
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<main id="primary" class="site-main">

	<?php
		include('menu.php');
	?>

		<meta name="data" content="<?php echo get_template_directory_uri(); ?>" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/landing.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/articleList.js"></script>

			<div class="article-wrapper" >
				<?php
					// the query
					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

					<?php if ( $wpb_all_query->have_posts() ) : ?>

					<ul class="article-list" id="articles">

						<!-- the loop -->
						<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
							<li class="article-item">
								<a class="title-text-menu" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<h3 class="author-text-menu"><?php echo get_field('author');?></h3>
								<p><?php the_content('', true);?></p>
							</li>
						<?php endwhile; ?>
						<!-- end of the loop -->
					</ul>

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
			</div>
		<img id="adjLogo" src="<?php echo get_template_directory_uri(); ?>/assets/Adjacent_LOGO.png"/>

		<div id="menu-buttons">
			<button id="article-arrow" onclick="openArticles()">articles</button>
			<button id="menu-arrow" onclick="moveMenu()">menu</button>
		</div>
    	<div id="image" class="background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Intersect.svg');"></div>

	</main><!-- #main -->

	<script>
			let articles = document.getElementsByClassName("article-item");
			console.log("articles",articles);

			let container = document.getElementById("articles");

			console.log("container",container);

			console.log("script is firing");

			const anchorObserve = (switches/*,pictures*/) => {
				console.log("OK THE ANCHOR THING HERE");

				const options = {
					root: null,
					rootMargin: '0px',
					threshold: .9
				};

				const callback = (entries) => {
					entries.forEach(function(entry) {
						if (entry.isIntersecting) {
							if (container.classList.contains("open")) {
								console.log("and now its open, mf");
								console.log(entry.target);
							}
							/*for (let i=0; i<pictures.length; i++) {
								pictures[i].classList.remove("first");
							}*/

							//can just access the pic index of the same thing
							/*if (entry.target == topSwitch) {
								console.log("topswitch");
								//this needs to be now "switch the class on the pic element"
								topPic.classList.add("first");
								botPic.classList.remove("first");
							} else {
								console.log("botswitch");
								topPic.classList.remove("first");
								botPic.classList.add("first");
							}*/
						}
					})
				}

				const observer = new IntersectionObserver(callback,options);

				for (let i=0; i<switches.length; i++) {
					observer.observe(switches[i]);
				}
			}

			anchorObserve(articles);


			/*const switchTop = document.getElementById("switch-top");
			const switchBot = document.getElementById("switch-bot");

			const pic1 = document.getElementById("top-pic");
			const pic2 = document.getElementById("bot-pic");

			console.log(pic1);*/

			//anchorObserve(switchTop,switchBot,pic1,pic2);
	</script>
<?php
 get_sidebar();
 get_footer('landing'); ?>
