<html>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/header.php';?>
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/banner.php';?>
		<?php
		$path = preg_split("@/@", $_SERVER['REQUEST_URI'], NULL, PREG_SPLIT_NO_EMPTY);
		echo "
		<div class='content centered'>
			Sorry, the requested page was not found.
		</div>
		"?>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';?>
	</body>
</html>