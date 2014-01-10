<div id="slides">
	<div class="slides-container">
		<?php
		foreach ($records as $r) {
			$id = toWebSafe($r->project);
			
			switch ($id) {
				case 'logo':
				$learn_more = 'learn_more invert';
				break;
				
				default:
				$learn_more = 'learn_more';
				break;
			}

			echo "<div>
			<div id='$id' class='desc'>
				<h1 class='project'>$r->project</h1>
				<h3 class='categories'>$r->categories</h3>
				<a class='$learn_more' href='$r->link'>Learn More</a>
			</div>
			<img src='img/home-slideshows/$r->source.jpg' alt='$r->project' width='100%'>
		</div>
		";
	};
	?>
</div>

</div>

<script>
	$(function() {
		$('#slides').superslides({
			hashchange: true
		});
	});
</script>