	<?php
	//JS load
	if ($prop_file_js == 'sign.js' || $prop_file_js == 'sign_view.js') {
		echo '<script src="/view/js/signature_pad.min.js"></script>';
	}
	
	if (file_exists($_SERVER['DOCUMENT_ROOT'].'/view/js/page/'.$prop_file_js)) {
		echo '<script src="/view/js/page/'.$prop_file_js.'?v='.JS_VERSION.'"></script>'.PHP_EOL;
	}
	?>
	
</body>
</html>