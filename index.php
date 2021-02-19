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

	
            <div class="menu-wrapper">
                <img class="menu-toggle" onclick="moveMenu()" src="Icon_Menu.png" alt="A hamburger menu icon"></img>
                <ul class="hamburger-list" id="menu">
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
							<li>Issue 1: Turtles</li>
							<li>Issue 2: Windows</li>
							<li>Issue 3: Global Warming</li>
							<li>Issue 4: Dungeons and Dragons</li>
							<li>Issue 5: The very bad day</li>
							<li>Issue 6: Electrochemistry</li>
							<li>Issue 7: The Intersection of Art and Technology</li>
							<li>Issue 8: Disembodiment</li>
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

    	<div id="image" class="background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/Intersect.svg');"></div>
		<meta name="data" content="<?php echo get_template_directory_uri(); ?>" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/landing.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>

		<div id="menu-buttons">
			<button id="article-arrow"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
			<button id="menu-arrow" onclick="moveMenu()"><img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg"></button>
		</div>
	</main><!-- #main -->
<?php
// get_sidebar();
// get_footer();
