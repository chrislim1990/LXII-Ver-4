<?php
$header_img = current(glob("img/portfolio/".$records[0]->url."/header/*.jpg"));

echo "<style type='text/css'>";
echo ".header_banner {background-image:url('$header_img');}";
echo "</style>";

echo "<div class='header_banner hide-on-small'></div>";
?>


<div class='block hide-on-large'></div>
<div class="container portfolio">
	<div class="col-md-8 col-md-offset-2">
		<?php
		echo "<h2>"	.$records[0]->title		."</h2>";
		echo "<h3>"	.$records[0]->category	."</h3>";
		echo "<div class='block'></div>";
		echo "<p>"	.$records[0]->desc		."</p>";
		?>

		<div>
			<a class="icon" href="http://www.facebook.com/LX2DS?ref=br_tf" target="_blank"><i class="fa fa-facebook"></i></a> 
			<a class="icon" href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a> 
			<a class="icon" href="http://www.tumblr.com" target="_blank"><i class="fa fa-tumblr"></i></a> 
			<hr>
		</div>
	</div>
	<div class="col-md-12">
		<?php

		$all_imgs = glob("img/portfolio/".$records[0]->url."/*.jpg");
		
		foreach ($all_imgs as $img) {
			// Potrait or Landscape
			$size = getimagesize($img); 
			$width = $size[0]; 
			$height = $size[1]; 
			$aspect = $height / $width;

			if ($aspect >= 1) $add_class = "potrait"; 
			else $add_class = "landscape";
			
			echo "<img class='$add_class' src='$img'>";

		}
		?>
	</div>
	<div class="col-md-8 col-md-offset-2">
		<div class='block'></div>
		<hr>
		<p class="nomargin">Start your own project now!</p>
		<h3 class="nomargin call_to_action"><a href="/contact">Contact Us</a></h3>
		<hr>
	</div>

</div>	
<div class="block b100"></div>
<hr class="nomargin">