<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package issue-8
 */

?>

<script>
    console.log(<?= json_encode(get_field("illustration_one")) ?>)
</script>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		$interactive = get_field( "layout_type" );

		if( $interactive == "iframeTong" || $interactive == "iframeNan") {
			echo "<div class='interactive-tong-content'></div>";
		} 

		if( $interactive == "iframe" ||  $interactive == "iframeTong" || $interactive == "iframeNan" ) {
			echo "<div class='column interactive'>";
		} else {
			echo "<div class='column article'>";
		}

	?>

	<!-- <div class="column article"> -->

		<nav class="article__nav">
		<?php the_post_navigation(
				array(
					'prev_text' => '<span class="nav__arrowleft"></span><span class="nav-subtitle">' . esc_html__( 'Previous', 'issue-8' ) . '</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'issue-8' ) . '</span>',
				)
			); ?>
			<?php wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'issue-8' ),
						'after'  => '</div>',
					)
				);
			?>
		</nav>
		<script>console.log(document.getElementById('html')[0].getBoundingClientRect(););</script>

		<div class="content">

			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						// issue_8_posted_on();
						issue_8_posted_by();

						$illustrator_tagline  = get_field('illustrator_tagline');
						$illustrator_url  = get_field('illustrator_url');
    					echo "<br/><div class='illustrator__tagline'><a href=" . $illustrator_url . ">" . $illustrator_tagline . "</div>"

						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php issue_8_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'issue-8' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				?>
				</div>

		</div>

	</div><!-- .entry-content -->

	<?php if(get_field('layout_type') == "anchorscroll" || get_field('layout_type') == "fixed"): ?>
		<div class='column illustrations'>
			<!--<div class='illustrations__one'>-->
			<img src="<?php the_field('pic_one'); ?>" style="position:absolute;top:0;left:0;width:100%;min-height:100%;" />
		</div>
	<?php elseif(get_field('layout_type') == 'fluidscroll'): ?>
		<div class='column illustrations-fluid'>
			<img src="<?php the_field('pic_one'); ?>" id="fluid_pic" style="position:sticky;top:0;width:100%;" />
		</div>
		<script>
			const thePic = document.getElementById("fluid_pic");
			const theHeight = thePic.clientHeight;
			const windowHeight = window.innerHeight;
			const newHeight = theHeight - windowHeight;
			thePic.style.top = `-${newHeight}px`;
		</script>
	<?php elseif(get_field('layout_type') == 'realanchor'): ?>
		<div class='column illustrations'>
			<img class="first" src="<?php the_field('top_pic'); ?>" id="top-pic" style="position:absolute;top:0;left:0;width:100%;min-height:100%;" />
			<img class="" src="<?php the_field('bot_pic'); ?>" id="bot-pic" style="position:absolute;top:0;left:0;width:100%;min-height:100%;" />
		</div>
		<script>
			console.log("script is firing");
			const anchorObserve = (topSwitch,botSwitch,topPic,botPic) => {

			const options = {
				root: null,
				rootMargin: '0px',
				threshold: 0.5
			};

			const callback = (entries) => {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
						if (entry.target == topSwitch) {
							console.log("topswitch");
							//this needs to be now "switch the class on the pic element"
							topPic.classList.add("first");
							botPic.classList.remove("first");
						} else {
							console.log("botswitch");
							topPic.classList.remove("first");
							botPic.classList.add("first");
						}
					}
				})
			}

			const observer = new IntersectionObserver(callback,options);

			observer.observe(topSwitch);
			observer.observe(botSwitch);
			}

			const switchTop = document.getElementById("switch-top");
			const switchBot = document.getElementById("switch-bot");

			const pic1 = document.getElementById("top-pic");
			const pic2 = document.getElementById("bot-pic");

			console.log(pic1);

			anchorObserve(switchTop,switchBot,pic1,pic2);
		</script>
	<?php elseif(get_field('layout_type') == "vimeo"): ?>
		<div class='column illustrations'>
			<div style="padding:100% 0 0 0;position:relative;"><iframe src="<?php the_field('iframe_src'); ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	<?php elseif(get_field('layout_type') == "iframe"): ?>
		<div class="column interactivepiece">
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src'); ?>"></iframe>
		</div>
	<?php elseif(get_field('layout_type') == "iframeTong"): ?>
		<div class="column interactiveTong">
			<div class="column interactiveTong2"></div>
			<img src="<?php the_field('pic_one'); ?>" style="top:0;left:0;width:100%;min-height:100%;" />
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src'); ?>"></iframe>
			<iframe class='iframeTong2' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src_2'); ?>"></iframe>
		</div>
	<?php elseif(get_field('layout_type') == "iframeNan"): ?>
		<div class="column interactiveNun">
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src'); ?>"></iframe>
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src_2'); ?>"></iframe>
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src_4'); ?>"></iframe>
		</div>
	<?php endif; ?>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->
