<?php

function asset_url(){
	return base_url();
}

function links($array,$type){
	$output = "";
	foreach ($array as $a) {
		if ($type=="css") :
			$output .= "<link rel='stylesheet' type='text/css' href='".asset_url()."css/".$a.".css'>";
		else:
			$output .= "<script language='javascript' type='text/javascript' src='".asset_url()."js/".$a.".js'></script>";
		endif;
	}
	return $output;
}

function create_menu($array){
	$output = "";
	foreach ($array as $value) {
		$state = ($_SERVER['REQUEST_URI'] == $value[0]) ? "active" : "";
		$output .= "<li class='".$state."'><a href='".$value[0]."'>".$value[1]."</a></li>";
	}
	return $output;
}

// Product
function GenerateForm($form_array)
{
	foreach ($form_array as $fi) {

		echo "<label for='$fi[1]'>$fi[0]</label>";

		switch ($fi[2]) {

			// If Checkbox
			case 'checkbox':
			echo "<input type='checkbox' name='$fi[1]' id='$fi[1]' value='$fi[1]' checked='$fi[4]' />";
			break;

			//If Select
			case 'select':
			echo "<select name='$fi[1]'>";
			$gah = array();
			$gah = explode(",",$fi[4]);
			foreach ($gah as $g) {
				echo "<option value='".strtolower(str_replace(' ', '_', $g))."'>".$g."</option>";
			};
			echo "</select>";
			break;

			//If Radio
			case 'checkbox2':
			echo "<div class='row radioholder'>";
			$geh = explode(",",$fi[4]);
			$i = 0;
			foreach ($geh as $g) {
				$i ++;
				echo "<div class='col-md-3 radios'>";
				echo "<img src='img/logo-type-$i.jpg'>";
				echo "<input type='checkbox' name='$fi[1][]' id='$fi[1]' value='".strtolower(str_replace(' ', '_', $g))."'>".$g."</input>";
				echo "</div>";
			};
			echo "</div>";
			break;

			//If Textarea
			case 'textarea':
			echo "<textarea name='$fi[1]' id='$fi[1]'/>";
			echo "</textarea>";
			break;

			//Def
			default:
			echo "<input type='$fi[2]' id='$fi[1]' name='$fi[1]' value=''>";
			break;

		};

		// if help text available
		if ($fi[3]) {
			echo "<p class='help'>".$fi[3]."</p>";
		}
	}
}
function ShowPrivateItem($child){
	// The items inside jcart is a private property, thus we need to turn a round to get its value
	$obj = $_SESSION['jcart'];
	$myClassReflection = new ReflectionClass(get_class($obj));
	$secret = $myClassReflection->getProperty($child);
	$secret->setAccessible(true);
		// Return the value
	return ($secret->getValue($obj));
}
function PostIntoSession($array_name, $previous_submit_btn){
	if (isset($_POST[$previous_submit_btn])) {
		foreach ( $_POST as $foo=>$bar ) {
			$_SESSION[$array_name][$foo] = $bar;
		}
	}
}

function AddIntoArray($value,$array){
// Added into array if not exsist
	if(!in_array($value, $array)){
		$array[] =$value;
	};
	return $array;
}

function VarDump($array){
	echo "<pre>";
	var_dump($array);
	echo "</pre>";
}

function toWebSafe($str, $replace=array(), $delimiter='-') {
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}