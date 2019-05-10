<?php echo "
<div class='content centered'>
";

if($con = try_connect())
{
	if(isset($_GET["name"]))
	{	
		$short_name = trim($_GET["name"]);
		$sql = "select * from projects where short_name = '" . $short_name ."'";
		$results = mysqli_query($con, $sql);
		$row = $results->fetch_array();
	}
	else
		$row = null;
	
	if ($row)
		display_project($con, $row);
	else
		display_project_list($con);
	
	mysqli_close($con);	
}

echo "</div>";

function display_project($con, $row){
	$short_name = $row['short_name'];
	$long_name =  $row['long_name'];
	$short_description =  $row['short_description'];
	$tiny_name =  $row['tiny_name'];
	$overview =  $row['overview'];
	$features =  $row['features'];
	$design =  $row['design'];
	$trailer =  $row['trailer'];
	$banner_x =  $row['banner_x'];
	$banner_y =  $row['banner_y'];
	
	display_banner($banner_x, $banner_y, $tiny_name);
	display_name($long_name);
	display_overview($overview);
	display_features($features);
	display_design($design);
	display_trailer($trailer);
}


function display_banner($banner_x, $banner_y, $tiny_name) {
	echo '<div><img class="cell projectbanner" src="/files/'.$tiny_name.'_banner.png" width="'.$banner_x.'" height="'.$banner_y.'"></div>';
}

function display_name($long_name) {
	echo '<div class="row"><h1>' . $long_name . '</h1></div>';
}

function display_overview($overview) {
	if($overview) echo '<div class="row"><h2>Overview</h2>'.$overview.'</div>';
}

function display_features($features) {
	if($features) echo '<div class="row"><h2>Features</h2>'.$features.'</div>';
}

function display_design($design) {
	if($design) echo '<div class="row"><h2>Design</h2>'.$design.'</div>';
}

function display_trailer($trailer) {
	if($trailer) echo '<div class="row"><h2>Trailer</h2>
	<iframe class="trailer" width="425" height="240" src="https://www.youtube.com/embed/'.$trailer.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
}

function display_project_list($con) {
	$sql = "select short_name, tiny_name, long_name, short_description from projects order by date desc";
	$results = mysqli_query($con, $sql);
	while($row = $results->fetch_array())
	{
		echo "<div class ='project'>
			<div class='project-center'>
				<a href='/projects?name=".$row['short_name']."'>
					<img class='projecticon' src='/files/".$row['tiny_name']."_icon.png' width=50 height=50>
			</div>
			<div class ='projecttitle project-center'>
				".$row['long_name']."
				</a>
				<div class ='projectdescription'>
					".$row['short_description']."
				</div>
			</div>
		</div>";
	}
}

;?>