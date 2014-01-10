<?php 


$cat = $this->uri->segment(3);
if ($this->uri->segment(4) == "budgeta"){
	$gah = $this->db->get_where('products', array('price <' => 200, 'cat'=>$cat))->result();
} else if ($this->uri->segment(4) == "budgetb"){
	$gah = $this->db->get_where('products', array('price <' => 500, 'cat'=>$cat))->result();
} else if ($this->uri->segment(4) == "budgetc"){
	$gah = $this->db->get_where('products', array('price <' => 800, 'cat'=>$cat))->result();
} else if ($this->uri->segment(4) == "budgetd"){
	$gah = $this->db->get_where('products', array('price <' => 1000, 'cat'=>$cat))->result();
} else if ($this->uri->segment(4) == "budgete"){
	$gah = $this->db->get_where('products', array('price <' => 2000, 'cat'=>$cat))->result();
};
;
$onerror = "onerror='imgError(this);'";

?>

<div class="container" >
	<br>
	<div class="row black ">
		<div class="col-md-8" style="text-align:right">
		</div>
		<div class="col-md-4" style="text-align:right">
			<img src="img/step-1.png">
		</div>
	</div>
	<br>
	<div class="row steps">
		<br class='block hide-on-large'>
		<h1>Search result</h1><br><br>
		<?php 
		if (!empty($gah)){
			foreach ($gah as $g) {
				echo "
				<a class='col-md-3 col-xs-6 searchresult' href='order/".$g->id."'>
				<img src='img/products/".$g->url.".jpg' $onerror>
				".$g->title." - ".$g->price."
				</a>
				";
			};
		} else { 
			echo "
			<br><br>
			<h3>No items could be found, please refine your search.</h3>
			<br><br>
			<a value='Search' class='blackbutton' href='order/'>Back</a>";
		};

		?>
	</div>
	<br class='block hide-on-large'>
</div>