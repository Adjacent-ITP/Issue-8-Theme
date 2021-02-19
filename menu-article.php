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
                    <li class="hamburger-item" onclick="subExpander(event)">Index</li>
                    <div class="list-child">
                        <ul class="prev-issues">
                            <li>All</li>
                            <li>The</li>
                            <li>Articles</li>
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
							<li>Issue 1</li>
							<li>Issue 2</li>
							<li>Issue 3</li>
							<li>Issue 4: Bodies & Borders</li>
							<li>Issue 5: Reality?</li>
							<li>Issue 6: Old/New/Next</li>
							<li>Issue 7: Feeling</li>
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