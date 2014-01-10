<div id="slides">
	<div class="slides-container">
		<?php
		foreach ($records as $r) {
			echo "<div>
			<div class='desc $r->project'>
				<h1 class='project'>$r->project</h1>
				<h3 class='categories'>$r->categories</h3>
				<a class='learn_more' href='$r->link'>Learn More</a>
			</div>
			<img src='img/home-slideshows/$r->source.jpg' alt='$r->project' width='100%'>
		</div>
		";
	};
	?>
</div>

<nav class="slides-pagination"></nav>	
</div>