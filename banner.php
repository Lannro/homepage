<?php 
$path = preg_split("@/@", $_SERVER['REQUEST_URI'], NULL, PREG_SPLIT_NO_EMPTY);
$path[0] = "home";
foreach($path as $i => $arr){
	if($i==count($path)-1){
	$path[$i] = $arr;
	} else if($i!=0){
	$path[$i] = "<a href='../".$arr."'>".$arr."</a>";
	} else { 
	$path[$i] = "<a href='../'>".$arr."</a>";
	}
}
//<div class='navigation centered'>" . join(" > ", $path) . "</div>
echo "
<div class='banner centered'>TYLER CINKANT</div>
<div class='navigation centered'>
	<div class='row'>
		<div class='dropdown'>
			<button class='dropbutton' onclick=\"location.href = '/';\">Home</button>
		</div>
		<div class='dropdown'>
			<button class='dropbutton' onclick=\"location.href = '/systems';\">Systems</button>
		</div>
		<div class='dropdown'>
			<button class='dropbutton' onclick=\"location.href = '/projects';\">Projects</button>
			<div class='dropdown-content'>
				<a href='/projects/fantasybump'>Fantasy Bump</a>
				<a href='/projects/sinecannon'>Sine Cannon</a>
				<a href='/projects/grandclassmelee2'>Grand Class Melee 2</a>
				<a href='/projects/grandclassmelee'>Grand Class Melee</a>
			</div>
		</div>
	</div>
</div>
";?>