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

		echo "<div class='item'>
		<div id='$id' class='desc'>
			<h1 class='project'>$r->project</h1>
			<h3 class='categories'>$r->categories</h3>
			<a class='$learn_more' href='$r->link'>Learn More</a>
		</div>
		<img id='$id' src='img/home-slideshows/$r->source.jpg' alt='$r->project'>
	</div>
	";
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
		});

		// Make the slideshow fullscreen
		$(window).resize(function() {
			$('#home-slide').height($(window).height());

			window_width = $(window).width();
			img_width = $('.owl-item.active .item img').width();
			offset = (window_width-img_width)/2;

			// reset all margin-left to 0
			$('.owl-item .item img').css('margin-left',0);
			
			// assign the new margin-left
			$('.owl-item.active .item img').css('margin-left',offset+'px');
			// alert('window_width is '+window_width+'img_width is '+img_width+' result is '+something);
		});

		$(window).trigger('resize');
		$(window).mouseup(function() {
			$(window).trigger('resize');
			// alert( "Handler for .mouseup() called." );
		});
		// Smartphones
		$(window).bind( "touchend", function() {
			$(window).trigger('resize');
		});
	});
</script>