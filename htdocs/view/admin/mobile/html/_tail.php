	<?php
	//JS load
	if ($prop_file_js == 'sign.js') {
		echo '<script src="/view/js/signature_pad.min.js"></script>';
	} else if ($prop_file_js == 'edu_management.js') {
		echo '<script src="/view/js/longclickDetector.js"></script>';
	} else if ($prop_file_js == 'new_edu.js' || $prop_file_js == 'edu_detail.js') {
		echo '<script src="/view/js/highlight.pack.js"></script>';
		echo '<script src="/view/js/quill.js"></script>';
	} else if ($prop_file_js == 'qrscan.js') {
		//echo '<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>';
		echo '<script src="/view/js/jsQR.js"></script>';
	}
	
	if (file_exists($_SERVER['DOCUMENT_ROOT'].'/view/js/page/'.$prop_file_js)) {
		echo '<script src="/view/js/page/'.$prop_file_js.'?v='.JS_VERSION.'"></script>'.PHP_EOL;
	}
	?>
	
</body>
</html>