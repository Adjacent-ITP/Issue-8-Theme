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
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/landing.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/mobile-menu.css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<main id="primary" class="site-main">
		<div id="article-close" class="menu-close-container article-close-container" onclick="openArticles()">
			<div class="menu-close"></div>
		</div>
		<div id="right-close" class="menu-close-container right-close-container" onclick="moveMenu()">
			<div class="menu-close"></div>
		</div>

	<?php
		include('menu.php');
	?>

		<meta name="data" content="<?php echo get_template_directory_uri(); ?>" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/landing.js"></script>
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
		<img id="adjLogo" src="<?php echo get_template_directory_uri(); ?>/assets/logo_with_displacement.svg"/>

		<div id="menu-buttons">
			<button id="article-arrow" onclick="openArticles()">articles</button>
			<button id="menu-arrow" onclick="moveMenu()">menu</button>
		</div>
		<div class="landing-background">
			<div id="landing_1" class="l-background"></div>
			<div id="landing_2" class="l-background hidden"></div>
			<div id="landing_3" class="l-background hidden"></div>
			<div id="landing_4" class="l-background hidden"></div>
			<div id="landing_5" class="l-background hidden"></div>
			<div id="landing_6" class="l-background hidden"></div>
			<div id="landing_7" class="l-background hidden"></div>
			<div id="landing_8" class="l-background hidden"></div>
		</div>
		<div class="mobile-menu">
			<a href="<?php echo home_url(); ?>"><div class="adjacent-logo mobile-button"></div></a>
			<a href="<?php echo home_url(); ?>"><div class="disembodiment-logo mobile-button"></div></a>
			<div class="menu-button mobile-button" onclick="moveMenu()"></div>
		</div>
		<div class="hidden pic-wrapper" id="pic-wrapper" style="
			height: 100vh;
			width: 50vw;
			position: absolute;
			top: 0;
			right: 0;
			display: flex;
			justify-content: center;
			align-items: center;"
		> 
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Melanie.png" class="pic-child hidden" id="pic0"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Tong_Tong.jpg" class="pic-child hidden" id="pic1"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Dominic.jpg" class="pic-child hidden" id="pic2"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Nun_Nun.jpg" class="pic-child hidden" id="pic3"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Owen.jpg" class="pic-child hidden" id="pic4"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/CyX_CyX.jpg" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Ziv.jpg" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Becca.png" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Cara.png" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Brent.jpg" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Katherine.png" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Erin.png" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Livia.jpg" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/YG_YG.png" class="pic-child hidden"></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Mina_Mina.jpg" class="pic-child hidden"></img>
		</div>

	</main><!-- #main -->

	<script>
	//THIS IS THE SCROLLING STUFF THAT CHANGES THE PICTURES 
		let currentArticle = null

		let articlesArr = Array.from(document.getElementsByClassName("article-item"))
		let articleThumbnailsArr = Array.from(document.getElementsByClassName('pic-child'))
		articlesArr.forEach((article, idx) => {
			article.dataset.idx = idx
			article.addEventListener('mouseover', onArticleMouseOver)
		})

		function changeArticle(newIdx) {
			if (currentArticle !== null && newIdx !== currentArticle && newIdx) {
				articleThumbnailsArr[currentArticle].classList.add('hidden')
			}
			if (currentArticle !== newIdx && newIdx != undefined) {
				articleThumbnailsArr[newIdx].classList.remove('hidden')
			}
			currentArticle = newIdx === undefined ? currentArticle : newIdx
		}

		function onArticleMouseOver(ev) {
			let newIdx = ev.target.dataset.idx
			if (currentArticle !== newIdx) {
				changeArticle(newIdx)
			}
		}
	</script>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/media.css">
<?php
 get_sidebar();
 get_footer('landing'); ?>
