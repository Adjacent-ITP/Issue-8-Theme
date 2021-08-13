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
    	<div id="image" class="background"></div>

		<div class="hidden pic-wrapper" id="pic-wrapper" style="
			height: 100vh;
			z-index: 5;
			width: 50vw;
			position: absolute;
			top: 0;
			right: 0;
			display: flex;
			justify-content: center;
			align-items: center;"
		> 
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Melanie.png" class="pic-child hidden" id="pic0" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Tong_Tong.jpg" class="pic-child hidden" id="pic1" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Dominic.jpg" class="pic-child hidden" id="pic2" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Nun_Nun.jpg" class="pic-child hidden" id="pic3" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Owen.jpg" class="pic-child hidden" id="pic4" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/CyX_CyX.jpg" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Ziv.jpg" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Becca.png" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Cara.png" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Brent.jpg" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Katherine.png" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Erin.png" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Livia.jpg" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/YG_YG.png" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
			<img src="<?php bloginfo('template_directory'); ?>/assets/img/Mina_Mina.jpg" class="pic-child hidden" style="width:50%; 
  										height: 50%; 
  										position: absolute;"
			></img>
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


			// let articles2 = document.querySelectorAll(".article-item");

			// articles2.forEach((elem,index) => {
			// 	elem.elems_index = index;
			// });

			// let container = document.getElementById("articles");

			// let item = document.getElementsByClassName("pic-child");

			// const anchorObserve = (switches,item/*,pictures*/) => {

			// 	for (let i=0; i<item.length; i++) {
			// 		item[i].classList.add("hidden");
			// 		let entry = item[i];
			// 		entry.style.display = "none";
			// 	}

			// 	const options = {
			// 		root: null,
			// 		rootMargin: '0px',
			// 		threshold: .9
			// 	};

			// 	const callback = (entries) => {
			// 		entries.forEach(function(entry) {
			// 			let index = entry.target.elems_index;
			// 			if (entry.isIntersecting) {
			// 				if (container.classList.contains("open")) {
			// 					for (let i=0; i<item.length; i++) {
			// 						let pic = item[i];
			// 						if (i == index) {
			// 							pic.style.display = "block";
			// 						} else {
			// 							pic.style.display = "none";
			// 						}
			// 					}
			// 				}
			// 			}
			// 		})
			// 	}

			// 	const observer = new IntersectionObserver(callback,options);

			// 	for (let i=0; i<switches.length; i++) {
			// 		observer.observe(switches[i]);
			// 	}
			// }

			// anchorObserve(articles,item);
	</script>
<?php
 get_sidebar();
 get_footer('landing'); ?>
