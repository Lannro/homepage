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
	$features =  $row['features'];
	$design =  $row['design'];
	$trailer =  $row['trailer'];
	$banner_x =  $row['banner_x'];
	$banner_y =  $row['banner_y'];
	$download =  $row['download'];
	$embed =  $row['embed'];
	
	display_banner($banner_x, $banner_y, $tiny_name);
	display_name($long_name);
	
	display_content("Overview", $row['overview']);
	display_content("Features", $row['features']);
	display_content("Design", $row['design']);
	
	display_trailer($trailer);
	display_screenshots($tiny_name);
	display_download($download);
	display_embed($embed);
}


function display_banner($banner_x, $banner_y, $tiny_name) {
	if($banner_x>0) echo '<div><img class="cell projectbanner" src="/files/'.$tiny_name.'_banner.png" width="'.$banner_x.'" height="'.$banner_y.'"></div>';
}

function display_name($long_name) {
	echo '
	<div class="row">
		<div class="headertext">
			<h1>' . $long_name . '</h1>
		</div>
	</div>';
}

function display_content($headername, $content) {
	if($content) echo '
	<div class="row">
		<div class="headertext">
			<h2>'.$headername.'</h2>
		</div>
		<div class="contenttext">
			'.$content.'
		</div>
	</div>';
}

function display_trailer($trailer) {
	if($trailer)
		display_content("Trailer", '<iframe class="trailer" width="425"height="240" src="https://www.youtube.com/embed/'.$trailer.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
}

function display_screenshots($tiny_name) {
	if(!glob($_SERVER['DOCUMENT_ROOT'] . "/files/".$tiny_name."_ss*"))
		return;
	echo'<div class="row">	
		<h2>Screenshots</h2>	
		<div class="row">';
	foreach (glob($_SERVER['DOCUMENT_ROOT'] . "/files/".$tiny_name."_ss*") as $filename) {
		$filename = str_replace($_SERVER['DOCUMENT_ROOT'], '', $filename);
		echo '<img class="screenshot" src="'.$filename.'"></img>';
	}
	echo'</div>	
	</div>';
}

function display_download($download) {
	if($download>0)
		display_content("Download", '<iframe class="download" frameborder="0" src="https://itch.io/embed/'.$download.'?border_width=2&amp;bg_color=3e4244&amp;fg_color=ffffff&amp;link_color=b0b0f5&amp;border_color=222222" width="554" height="169"></iframe>');
}

function display_embed($embed) {
	if($embed>0)
		display_content("Play", '<a href="https://itch.io/embed-upload/'.$embed.'?color=3e4244">Click here</a> to play the game in your browser.');
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