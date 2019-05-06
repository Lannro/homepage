<?php
$path = preg_split("@/@", $_SERVER['REQUEST_URI'], NULL, PREG_SPLIT_NO_EMPTY);
echo "
<div class='content centered table'>
	<div class='row'>
		<div class='content cell'>
			<img class='portrait' src='/files/portrait.jpg' width=150 height=150>
			Tyler Cinkant is a professional Programmer, Game Developer, and Systems Analyst.
			<br>
			<br>
			He graduated from University of British Columbia in 2011 with a Bachelor of Science in Computer Science.
			<br>
			<br>
			During his last year at UBC, he was one of three founding members of an indie game studio, Gigatross Games. He worked as the lead developer for several major projects.
			<br>
			<br>
			After Gigatross Games, he began work at the University of British Columbia, in the UBC Learning Technology Hub, where he is currently employed as a Systems Analyst.
		</div>
	</div>
</div>
"?>