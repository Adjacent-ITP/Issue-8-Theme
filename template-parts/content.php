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

		if( $interactive == "iframe" ) {
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
    				echo "<br/><div class='illustrator__tagline'>" . $illustrator_tagline . "</div>"

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

	<?php if(get_field('layout_type') == "fluidscroll" || get_field('layout_type') == "anchorscroll" || get_field('layout_type') == "fixed"): ?>
		<div class='column illustrations'>
			<div class='illustrations__one'>
		</div>
	<?php elseif(get_field('layout_type') == "vimeo"): ?>
		<div class='column illustrations'>
			<div style="padding:100% 0 0 0;position:relative;"><iframe src="<?php the_field('iframe_src'); ?>" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	<?php elseif(get_field('layout_type') == "iframe"): ?>
		<div class="column interactivepiece">
			<iframe class='iframe' frameBorder='0' scrolling='no' src="<?php the_field('iframe_src'); ?>"></iframe>
		</div>
	<?php endif; ?>


	
				
		</div>

	<!--<footer class="entry-footer"> -->
		<?#php issue_8_entry_footer(); ?>
	<!--</footer> .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
