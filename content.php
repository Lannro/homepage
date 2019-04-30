<?php
$path = preg_split("@/@", $_SERVER['REQUEST_URI'], NULL, PREG_SPLIT_NO_EMPTY);
echo "
<div class='content centered table'>
	<div class='row'>
		<div class='sidebar cell'>
			<img src='/files/portrait.jpg' width=200 height=260>
		</div>
		<div class='maincontent cell'>
			Click here for <a href='./test'>test.</a>
			<br>
			<br>
			Tyler Cinkant is a professional programmer, game developer, and systems analyst.
			<br>
			<br>
			I graduated from University of British Columbia in 2011 with a Bachelor of Science in Computer Science.
			<br>
			<br>
			During my last year at UBC, I was one of three founding members of an indie game studio, Gigatross Games. I worked as the lead developer for several major projects.
			<br>
			<br>
			After Gigatross Games, I began work at the University of British Columbia, in the UBC Learning Technology Hub, where I am currently employed as a Systems Analyst.
		</div>
	</div>
</div>
"?>