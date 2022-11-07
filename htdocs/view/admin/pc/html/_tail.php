	<?php
	//JS load
	if (file_exists($_SERVER['DOCUMENT_ROOT'].'/view/js/page/'.$prop_file_js)) {
		echo '<script src="/view/js/page/'.$prop_file_js.'?v='.JS_VERSION.'"></script>'.PHP_EOL;
	}
	?>
	
</body>
</html>