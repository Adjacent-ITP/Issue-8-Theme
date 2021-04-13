<?php
/**
 * The template for displaying the menu
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package issue-8
 */

?>

<div class="header">
		<div class="header-left">
			<a href="https://itp.nyu.edu/adjacent/issue-8/"><img src="<?php echo get_template_directory_uri(); ?>/assets/AdjacentLogo.svg"	/></a>
		</div>
		<div class="header-right">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/MenuButtonNonInteractive.svg" onClick="moveMenu(event)"/>
		</div>
	</div>

<div class="menu-wrapper">
                <ul class="hamburger-list hamburger-article" id="menu">
                    <li class="hamburger-item" onclick="subExpander(event)">Index</li>
                    <div class="list-child">
                        <ul class="prev-issues">
													<!-- the loop -->
													<?php 

													$args = array(
														'post_type'=> 'post',
														'orderby'    => 'ID',
														'post_status' => 'publish',
														'order'    => 'DESC',
														'posts_per_page' => -1 
														);
														$result = new WP_Query( $args );

														if ( $result-> have_posts() ) : ?>
														<?php while ( $result->have_posts() ) : $result->the_post(); ?>
														<a href="<?php the_permalink() ?>">
															<li><?php the_title(); ?>
																<br/>
																<span class="author__light"><?php echo get_field('author');?></span>
															</li>
														</a>
														   
														<?php endwhile; ?>
														<?php endif; wp_reset_postdata(); ?>

										
													<!-- end of the loop -->
                        </ul>
                    </div>
                    <li class="hamburger-item" onclick="subExpander(event)">About</li>
					<div class="list-child bordered">
						<div class="about">
							<h3><i>
								ADJACENT is an online journal of emerging media published by the Interactive Telecommunications Program of NYU. 
								Our mission is to share research, reflection, analysis, and opinion from and for the diverse creators that are 
								exploring the emerging possibilities of the contemporary moment in media and technology.
							</i></h3>
							<p>
								We began working on this issue of Adjacent B.C. 
								(before Covid-19)––a new marker of time for the world. 
								And so most of these articles have no consciousness of the future that is our present. 
								We hope that this issue can serve as a source of inspiration.
							</p>
							<h3>Editorial Board</h3>
							<ul>
								<li>Nanchy Hechinger, Editor-in-Chief</li>
								<li>Alden Rivendale Jones & Carrie Wang, Managing Editors</li>
							</ul>
							<h3>Editors</h3>
							<ul>
								<li>Gabriella M Garcia, Senior Editor</li>
								<li>Na Chen</li>
								<li>Daniel Fries</li>
								<li>Karina Hyland</li>
								<li>Marcela Mancino</li>
								<li>Melissa Margaret Powers</li>
								<li>Lillian Ritchie</li>
								<li>Matthew Ross</li>
								<li>Simone Ava Salvo</li>
							</ul>
							<h3>Art Direction: Site Design</h3>
							<ul>
								<li>Dana Elkis</li>
								<li>Emily Lin</li>
								<li>Ilana Bonder</li>
							</ul>
							<h3>Art Director: Visuals/Illustration</h3>
							<ul>
								<li>Nick Gregg</li>
							</ul>
							<h3>Web Development</h3>
							<ul>
								<li>Schuyler deVos</li>
								<li>Sam Heckle</li>
								<li>Erik van Zummeren</li>
							</ul>
							<h3>Communications and Public Relations</h3>
							<ul>
								<li>Gabriella M. Garcia, Director</li>
								<li>Sarah Liriano</li>
								<li>Yiting Liu</li>
								<li>Marcela Mancino</li>
								<li>Kat Vlasova</li>
							</ul>
							<p>
								ADJACENT was made possible by a Tisch Faculty Grant. Special thanks to Tisch School of the Arts Dean, 
								Allyson Green, and ITP’s Chair and Associate Dean for Emerging Media, Dan O’Sullivan, for their ongoing support.
							</p>
							<p>
								<strong>Contact:</strong> adjacent@itp.nyu
							</p>
						</div>
					</div>
                    <li class="hamburger-item" onclick="subExpander(event)">Previous Issues</li>
                    <div class="list-child">
						<ul class="prev-issues">
						<a href="https://itp.nyu.edu/adjacent/issue-1/" target="_blank"><li>Issue 1</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-2/" target="_blank"><li>Issue 2</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-3/" target="_blank"><li>Issue 3</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-4/" target="_blank"><li>Issue 4: Bodies & Borders</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-5/" target="_blank"><li>Issue 5: Reality?</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-6/" target="_blank"><li>Issue 6: Old/New/Next</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-7/" target="_blank"><li>Issue 7: Feeling</li></a>
							<a href="https://itp.nyu.edu/adjacent/issue-8/" target="_blank"><li>Issue 8: Disembodiment</li></a>
						</ul>
					</div>
                    <li class="hamburger-item" onclick="subExpander(event)">Submit</li>
					<div class="list-child bordered">
						<div class="about">
							<h2>Submit your article proposal here.</h2>

							<p>Questions or comments about submissions or any other matter?</p>
							<p>Email us at adjacent@itp.nyu.edu.<p>
						</div>
					</div>
                    <li class="hamburger-rest"></li>
                </ul>
            </div>