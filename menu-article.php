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
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/mobile-menu.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style/media.css">

<div class="header">
	<div class="header-left">
			<a href="https://itp.nyu.edu/adjacent/issue-8/"><img src="<?php echo get_template_directory_uri(); ?>/assets/AdjacentLogo.svg"	/></a>
		</div>
		<div class="header-right">
			<div id="menu-button" onClick="moveMenu(event)"></div>
		</div>
	</div>
	<div class="article-mobile-menu">
		<div class="disembodiment-logo"></div>
		<div class="menu-button"></div>
	</div>

<div class="menu-wrapper">
                <ul class="hamburger-list hamburger-article" id="menu">
                    <li id="index-item" data-id="index" class="hamburger-item">
						<div class="hamburger-text" data-id="index" onclick="expandMenu(event)">Index</div>	
						<div id="index-close" class="hamburger-close" data-id="index" onclick="expandMenu(event)"></div>
					</li>
                    <div id="index-child" class="list-child">
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
                    <li id="about-item" data-id="about" class="hamburger-item" onclick="expandMenu(event)">
						<div class="hamburger-text" data-id="about">About</div>	
						<div id="about-close" class="hamburger-close" data-id="about" onclick="expandMenu(event)"></div>
					</li>
					<div id="about-child" class="list-child bordered">
						<div class="about">
							<h3><i>
								ADJACENT is an online journal of emerging media published by the Interactive Telecommunications Program of NYU. 
								Our mission is to share research, reflection, analysis, and opinion from and for the diverse creators that are 
								exploring the emerging possibilities of the contemporary moment in media and technology.
							</i></h3>
							<h4>Editorial Board</h4>
							<ul>
								<li>Nanchy Hechinger, Editor-in-Chief</li>
								<li>Gabriella M. Garcia, Managing Editor</li>
							</ul>
							<h4>Editors</h4>
							<ul>
					
								<li>Na Chen</li>
								<li>Daniel Fries</li>
								<li>Divya Mehra</li>
								<li>Elizabeth Perez</li>
								<li>Melissa Margaret Powers</li>
								<li>Lucas Wozniak</li>
							</ul>
							<h4>Web Design</h4>
							<ul>
								<li>Anh Lê</li>
								<li>Danqi Qian</li>
							</ul>
							<h4>Art Director: Visuals/Illustration</h4>
							<ul>
								<li>Lizzy Chiappini</li>
							</ul>
							<h4>Web Development</h4>
							<ul>
								<li>Schuyler deVos</li>
								<li>Sam Heckle</li>
								<li>Erik van Zummeren</li>
							</ul>
							<h4>Communications and Public Relations</h4>
							<ul>
								<li>Simone Salvo, Director</li>
								<li>Natalie Fajardo</li>
								<li>Zack Krampf</li>
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
                    <li id="previous-item" class="hamburger-item"  data-id="previous" onclick="expandMenu(event)"> 
						<div class="hamburger-text" data-id="previous">Previous Issues</div>	
						<div id="previous-close" class="hamburger-close" data-id="previous" onclick="expandMenu(event)"></div>
					</li>
                    <div id="previous-child" class="list-child">
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
                    <li id="submit-item" class="hamburger-item"  data-id="submit" onclick="expandMenu(event)">
						<div class="hamburger-text" data-id="submit">Submit</div>	
						<div id="submit-close" class="hamburger-close" data-id="submit" onclick="expandMenu(event)"></div>
					</li>
					<div id="submit-child" class="list-child bordered">
						<div class="about">
							<h2>Submit your article proposal here.</h2>

							<p>Questions or comments about submissions or any other matter?</p>
							<p>Email us at adjacent@itp.nyu.edu.<p>
						</div>
					</div>
                </ul>
			</div>

