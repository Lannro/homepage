<html>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/header.php';?>
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/banner.php';?>
		<?php 
		$variable = explode("?", $_SERVER['REQUEST_URI'])[0];
		include $_SERVER['DOCUMENT_ROOT'] . $variable . '/content.php';?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';?>
	</body>
</html>