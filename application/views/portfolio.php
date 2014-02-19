<div class="container portfolio">
	<div class="col-md-12">

		<div class="block b200"></div>
		<h1>Portfolio</h1>
		<h3>At LX2, We create value and make a difference</h3>
		<div class="block b200"></div>
	</div>
	<?php 

	foreach ($records as $r) {
		if ($r->hidden!=1) {
		// Seach all images in cover directory and get the first one
			$cover_img = current(glob("img/portfolio/$r->url/cover/*.jpg"));

			list($width) = getimagesize($cover_img);
			if ($width>400) {
				$col = 8;
			}else{
				$col = 4;
			}

			echo "
			<div class='col-md-$col col-xs-12 grid_item'>
				<a href='portfolio/$r->url'>
					<span class='overlay'>
						<div class='content'>
							<h4>$r->title</h4><p>$r->cat</p>
						</div>
					</span>
					<img src='$cover_img' alt='$r->title thumbnail'>
				</a>			
			</div>
			";
		}
	};
	?>

</div>
<div class="block b100"></div>
<hr class="nomargin">