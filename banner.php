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
?>
<div class='banner centered'>TYLER CINKANT</div>
<div class='navigation centered'>
	<div class='row'>
		<div class='dropdown'>
			<button class='dropbutton' onclick='location.href="/"'>Home</button>
		</div>
		<div class='dropdown'>
			<button class='dropbutton' onclick='location.href="/systems"'>Systems</button>
		</div>
		<div class='dropdown'>
			<button class='dropbutton' onclick='location.href="/projects"'>Projects</button>
			<div class='dropdown-content'>
<?php
if($con = try_connect())
{
	display_project_banner_list($con);	
	mysqli_close($con);	
}
?>
			</div>			
		</div>
	</div>
</div>

<?php

function try_connect()
{
	$dbhost = 'localhost';
	$db = 'tcinkant_db';
	if($con = @mysqli_connect($dbhost))
	{		
		mysqli_select_db($con, $db);
		return $con;
	}
	else
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	return null;
}

function display_project_banner_list($con) {
	$sql = "select short_name, long_name from projects order by date desc";
	$results = mysqli_query($con, $sql);
	while($row = $results->fetch_array())
		echo "<a href='/projects?name=".$row['short_name']."'>".$row['long_name']."</a>";
}
?>