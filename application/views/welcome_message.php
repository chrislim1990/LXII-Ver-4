<?php 

session_start();

?>
<div id="home-slide" class="owl-carousel">
	<?php
	foreach ($records as $r) {
		$id = toWebSafe($r->project);

		switch ($id) {
			case 'logo':
			$learn_more = 'learn_more';
			break;

			default:
			$learn_more = 'learn_more invert';
			break;
		}

		echo "<div class='item cover' style='background-image:url(img/home-slideshows/$r->source.jpg)'>
		<div id='$id' class='desc'>
			<h1 class='project'>$r->project</h1>
			<h3 class='categories'>$r->categories</h3>
			<a class='$learn_more' href='$r->link'>Learn More</a>
		</div>
	</div>
	";
	// <img id='$id' src='img/home-slideshows/$r->source.jpg' alt='$r->project'>
};
?>

</div>
<script>
	$(document).ready(function() {
		$("#home-slide").owlCarousel({
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem : true,
			lazyLoad : true,
			addClassActive : true,
			navigation : true,
			navigationText : ["l","j"]
		});

		$('#home-slide .item').height($(window).height());

		// Make the slideshow fullscreen
		$(window).resize(function() {
			$('#home-slide .item').height($(window).height());
		});
		$(window).trigger('resize');

	});
</script>