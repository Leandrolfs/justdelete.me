<?php
	
	$langs = ['en', 'it'];
	$langs_name = ['English', 'Italiano'];

	foreach ($langs as $language)
	{
		// start the output buffer
		ob_start(); ?>
		
		<?php

		$lang = $language;

		if ($lang == "en") {
			$full_name = "English";
		}
		if ($lang == "it") {
			$full_name = "Italiano";
		}
		
		include ('dev.php');

		if ($language == "en")
		{
			$cachefile = "index.html";
		}
		else {
			$cachefile = $language.".html";
		}
		// open the cache file "cache/home.html" for writing
		$fp = fopen($cachefile, 'w'); 
		// save the contents of output buffer to the file
		fwrite($fp, ob_get_contents()); 
		// close the file
		fclose($fp); 
		// Send the output to the browser
		ob_end_flush();
	}
?>