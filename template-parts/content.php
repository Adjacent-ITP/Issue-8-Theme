<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package issue-8
 */

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/anchor.css">

<script>
    console.log(<?= json_encode(get_field("illustration_one")) ?>)
</script>


<meta name="data" content="<?php echo get_template_directory_uri(); ?>" />
<div id="top"></div>
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
					'prev_text' => '
						<div class="nav-arrow">
							<div class="arrow-text right">Next</div>
							<div class="arrow-right"></div>
						</div>
					',
					'next_text' => '
						<div class="nav-arrow">
						<div class="arrow-left"></div>
						<div class="arrow-text left">Previous</div>
						</div>
					'
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

		<div class="content" id="dacontent">

			<header id="article-title-header" class="entry-header">
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
						if($illustrator_tagline != null && $illustrator_url != null)
    						echo "<br/><div class='illustrator__tagline'><a href=" . $illustrator_url . ">" . $illustrator_tagline . "</a></div>"
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
		<div class='column artwork illustrations'>
			<!--<div class='illustrations__one'>-->
			<img src="<?php the_field('pic_one'); ?>" style="position:absolute;top:0;left:0;width:100%;min-height:100%;" />
		</div>
	<?php elseif(get_field('layout_type') == 'fluidscroll'): ?>
		<div class='column artwork illustrations-fluid'>
			<img src="<?php the_field('pic_one'); ?>" id="fluid_pic" />
		</div>
		<script>
			const thePic = document.getElementById("fluid_pic");
			const theHeight = thePic.clientHeight;
			const windowHeight = window.innerHeight;
			const newHeight = theHeight - windowHeight;
			thePic.style.top = `-${newHeight}px`;
		</script>
	<?php elseif(get_field('layout_type') == 'realanchor'): ?>
		<div class='column artwork illustrations'>
			<div id="anchor" class="anchor-container">
				<img src="<?php the_field('pic1'); ?>" class="anchor-pic hidden" />
				<img src="<?php the_field('pic2'); ?>" class="anchor-pic hidden" />
				<img src="<?php the_field('pic3'); ?>" class="anchor-pic hidden" />
				<img src="<?php the_field('pic4'); ?>" class="anchor-pic hidden" />
				<img src="<?php the_field('pic5'); ?>" class="anchor-pic hidden" />
			</div>
		</div>
		<script>
			let anchorImageEls = Array.from(document.getElementsByClassName('anchor-pic')).slice()
			for (let idx = 0; idx < anchorImageEls.length; idx++) {
				let src = anchorImageEls[idx].getAttribute('src')
				if (src === '') {
					anchorImageEls[idx].remove()
				}
			}

			var cIdx = 1
			anchorImageEls = Array.from(document.getElementsByClassName('anchor-pic'))
			let anchorEl = document.getElementById('anchor')
			anchorEl.style.backgroundImage = `url(${anchorImageEls[cIdx - 1].src})`

			function onAnchorScroll(ev) {
				let anchorImageEls = Array.from(document.getElementsByClassName('anchor-pic'))
				let anchorEl = document.getElementById('anchor')
				let scrollY = ev.pageY
				let totalY = document.documentElement.scrollHeight
				let intSpace = totalY / anchorImageEls.length
				let nIdx = 1
				for (let idx = 1; idx <= anchorImageEls.length; idx++) {
					if (scrollY < intSpace * idx && scrollY > intSpace * (idx - 1)) {
						nIdx = idx
						break
					}
				}
				if (cIdx !== nIdx) {
					anchorEl.style.backgroundImage = `url(${anchorImageEls[nIdx - 1].src})`
					cIdx = nIdx
				}
			}

			window.addEventListener('mousewheel', onAnchorScroll)

		</script>
	<?php elseif(get_field('layout_type') == "vimeo"): ?>
		<div class='column artwork illustrations'>
			<div style="padding:100% 0 0 0;position:relative;"><iframe src="<?php the_field('iframe_src'); ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	<?php elseif(get_field('layout_type') == "iframe"): ?>
		<div class="column artwork interactivepiece">
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src'); ?>"></iframe>
		</div>
	<?php elseif(get_field('layout_type') == "iframeTong"): ?>
		<div class="column artwork interactiveTong">
			<div class="column interactiveTong2"></div>
			<img src="<?php the_field('pic_one'); ?>" style="top:0;left:0;width:100%;" />
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src'); ?>"></iframe>
			<iframe class='iframeTong2' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src_2'); ?>"></iframe>
		</div>
		<script>
			const textColumn = document.getElementById("dacontent");
			const theTextHeight = textColumn.clientHeight;
			const windowHeight = window.innerHeight;
			const newHeight = theTextHeight - windowHeight;

			const textParent = document.getElementsByClassName("interactive");
			const textParentReal = textParent[0];

			textParentReal.style.height = "300vh";
			textColumn.style.top = `-${newHeight}px`;
			textColumn.style.position = "sticky";
		</script>
	<?php elseif(get_field('layout_type') == "iframeNan"): ?>
		<div class="column artwork interactiveNun">
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src'); ?>"></iframe>
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src_2'); ?>"></iframe>
			<iframe class='iframe' frameBorder='0' scrolling='no' allow="camera; microphone" src="<?php the_field('iframe_src_4'); ?>"></iframe>
		</div>
		<script>
			const textColumn = document.getElementById("dacontent");
			const theTextHeight = textColumn.clientHeight;
			const windowHeight = window.innerHeight;
			const newHeight = theTextHeight - windowHeight;

			const textParent = document.getElementsByClassName("interactive");
			const textParentReal = textParent[0];

			textParentReal.style.height = "300vh";
			textColumn.style.top = `-${newHeight}px`;
			textColumn.style.position = "sticky";
		</script>
	<?php endif; ?>
		<div class="article-nav-mobile">
			<div class="article-nav" onclick="scrollToTop()">
				<div class="up-arrow"></div>
				<div class="article-nav-text">Back to Top</div>
			</div>
			<?php $prev = get_previous_posts_link(); ?>
			<a href="<?php echo get_permalink( get_adjacent_post(false,'',false)->ID );?>">
				<div class="article-nav">
					<div class="left-arrow"></div>
					<div class="article-nav-text">Previous Article</div>
				</div>
			</a>
			<a href="<?php echo get_permalink( get_adjacent_post(false,'',true)->ID );?>">
				<div class="article-nav">
					<div class="article-nav-text">Next Article</div>
					<div class="right-arrow"></div>
				</div>
		</a>
		</div>
		</div>
</article><!-- #post-<?php the_ID(); ?> -->
<script src="<?php echo get_template_directory_uri(); ?>/js/article_mobile.js"></script>
<?php
 get_footer(); ?>
