<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package issue-8
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="column article">

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


	<div class="column illustrations">
				<div class="illustrations__one"></div>
		</div>

	<footer class="entry-footer">
		<?php issue_8_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
