<?php
// Share URL
$portfolio_add = $project[0]->url;
$url = urlencode("http://www.lx2.com.my/portfolio/$portfolio_add");

$header_img = current(glob("img/portfolio/".$project[0]->url."/header/*.jpg"));

echo "<style type='text/css'>";
echo ".header_banner {background-image:url('$header_img');}";
echo "</style>";

// Check for Header Image
if ($header_img) {
	echo "<div class='header_banner hide-on-small'></div>";
}else{
	echo "<div class='block b200'></div>";
};

?>


<div class='block hide-on-large'></div>
<div class="container portfolio">
	<div class="col-md-8 col-md-offset-2">
		<?php
		$portfolio_title = $project[0]->title;
		echo "<h2>"	.$portfolio_title		."</h2>";
		echo "<div class='block'></div>";
		?>

		<div class="row text-left">
			<div class="col-md-8">
				<p>
					<?php echo $project[0]->desc; ?>
				</p>
			</div>
			<div class="col-md-4">
				<h4>Services:</h4>
				<h5>
					<?php echo $project[0]->services; ?>
				</h5>
				<h4>Year:</h4>
				<h5>
					<?php echo $project[0]->year; ?>
				</h5>
			</div>
		</div>
		<div class="block b100"></div>
	</div>
	<div class="col-md-2"></div>
	<div class="row pull-left">
		<div class="col-md-12">
			<?php
			$all_imgs = glob("img/portfolio/".$project[0]->url."/imgs/*.jpg");

			foreach ($all_imgs as $img) {
			// Potrait or Landscape
				$size = getimagesize($img); 
				$width = $size[0]; 
				$height = $size[1]; 
				$aspect = $height / $width;

				if ($aspect >= 1) $add_class = "potrait"; 
				else $add_class = "landscape";

				if ($project[0]->title == "Logo") {
					$add_class = "logo_item";
				}

				echo "<img class='$add_class' src='$img' alt=''>";
			}
			?>
			<div class="block b25"></div>
		</div>

		<!-- Share -->
		<div class="portfolio_footer">
		
			<?php
			if(isset($project[0]->web) && $project[0]->web !== ""){
			echo "<a class='learn_more' href='".$project[0]->web."' target='_blank'>View the Website</a><hr>";
			};
			?>
			
			<h4>Share</h4>
			<a class="learn_more icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url?>" target="_blank"><i class="fa fa-facebook"></i></a> 
			<a class="learn_more icon" href="http://twitter.com/home?status=<?php echo $url?>" target="_blank"><i class="fa fa-twitter"></i></a> 
			<a id="to_all_project" href="portfolio"><h4 class="gn-icon gn-icon-portfolio">All Project</h4></a>
			<div class="block b50"></div>
		</div>
		<div class="block b100"></div>

	</div>
	<div class="row">
		<h4>More of Our Projects:</h4>
		
		<?php
		foreach ($other_projects as $p) {
			$cover_img = current(glob("img/portfolio/$p->url/cover/*.jpg"));
			
			echo "
			<div class='col-md-3 grid_item cover' style='background-image:url($cover_img)'>
				<a href='portfolio/$p->url'>
					<span class='overlay'>
						<div class='content'>
							<h4>$p->title</h4>
						</div>
					</span>
				</a>			
			</div>
			";
		}

		?>

	</div>

</div>
<div class="block"></div>
<!-- <div class="call-to-action">
	<div class="container">
		<h4>Start your own project now!</h4>
		<a href="order" class="learn_more">Get Started Now!</a>
	</div>
</div> -->
<hr class="nomargin">