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

<div class="menu-wrapper">
	<ul class="hamburger-list" id="menu">
		<li id="about-item" data-id="about" class="hamburger-item">
						<div class="hamburger-text" data-id="about" onclick="expandMenu(event)">About</div>	
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
                    <li id="previous-item" class="hamburger-item">
						<div class="hamburger-text" data-id="previous" onclick="expandMenu(event)">Previous Issues</div>	
						<div id="previous-close" class="hamburger-close" data-id="previous" onclick="expandMenu(event)"></div>
					</li>
                    <div id="previous-child" class="list-child">
						<ul class="prev-issues">
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-1">Issue 1</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-2">Issue 2</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-3/">Issue 3</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-4">Issue 4: Bodies & Borders</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-5/">Issue 5: Reality?</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-6/">Issue 6: Old/New/Next</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-7/">Issue 7: Feeling</a></li>
							<li class="issues"><a href="https://itp.nyu.edu/adjacent/issue-8/">Issue 8: Disembodiment</a></li>
						</ul>
					</div>
                    <li id="submit-item" class="hamburger-item">
						<div class="hamburger-text" data-id="submit" onclick="expandMenu(event)">Submit</div>	
						<div id="submit-close" class="hamburger-close" data-id="submit" onclick="expandMenu(event)"></div>
					</li>
					<div id="submit-child" class="list-child bordered">
						<div class="about">
							<h2>Submit your article proposal <a href="https://forms.gle/YH3T8HjcfbqTVoMy5">here.</a></h2>

							<p>Questions or comments about submissions or any other matter?</p>
							<p>Email us at <a href="mailto: adjacent@itp.nyu">adjacent@itp.nyu.edu</a>.<p>
						</div>
					</div>
                    <li class="hamburger-rest"></li>
                </ul>
            </div>