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
		$portfolio_title = $records[0]->title;
		echo "<h2>"	.$portfolio_title		."</h2>";
		echo "<h3>"	.$records[0]->cat	."</h3>";
		echo "<div class='block'></div>";
		echo "<p>"	.$records[0]->desc		."</p>";
		
		$portfolio_add = $records[0]->url;
		$url = urlencode('http://'.$_SERVER['HTTP_HOST']."/portfolio/$portfolio_add");
		?>

		<div>
			<a class="learn_more icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>" target="_blank"><i class="fa fa-facebook"></i></a> 
			<a class="learn_more icon" href="http://twitter.com/home?status=<?php echo $url?>" target="_blank"><i class="fa fa-twitter"></i></a> 
			<hr>
		</div>
	</div>
	<div class="col-md-12">
		<?php
		$all_imgs = glob("img/portfolio/".$records[0]->url."/imgs/*.jpg");
		
		foreach ($all_imgs as $img) {
			// Potrait or Landscape
			$size = getimagesize($img); 
			$width = $size[0]; 
			$height = $size[1]; 
			$aspect = $height / $width;

			if ($aspect >= 1) $add_class = "potrait"; 
			else $add_class = "landscape";
			
			if ($records[0]->title == "Logo") {
				$add_class = "logo_item";
			}

			echo "<img class='$add_class' src='$img' alt=''>";

		}
		?>
	</div>
</div>	
<div class="block b100"></div>
<div class="call-to-action">
	<div class="container">
		<h4>Start your own project now!</h4>
		<a href="order" class="learn_more">Get Started Now!</a>
	</div>
</div>
<hr class="nomargin">