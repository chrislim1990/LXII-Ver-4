<?php 


		$current_count = 2;

function renderProjectSummary($array){
	foreach ($array as $key => $value) {
		if ($key != 'title' && $key != 'project_submit' && $value) {
			if($key == 'logo_type'){

				$key = str_replace('_',' ',$key);
				$key = ucwords(strtolower($key));
				$gah = implode(', ', $value);
				$str .=  '<dt><span>'.$key.':</span></dt><dd><span>'.$gah.'</span></dd><hr>';
			} else {

				$key = str_replace('_',' ',$key);
				$key = ucwords(strtolower($key));
				$str .=  '<dt><span>'.$key.':</span></dt><dd><span>'.$value.'</span></dd><hr>';
			};

			if ($key == 'given_name'){
				$actualname = $value;
			} else if ($key == 'sur_name'){
				$actualname .= "&nbsp;".$value;
			};
		};
	}

	return $str;
};

for ($i=0; $i < $current_count-1; $i++) { 
	$working_form = $_SESSION[$neededFormsName[$i].'_form'];
	echo "<dl>";
	echo "<dt><b>".$working_form['title']."</b></dt><dd>&nbsp;</dd><hr>";
	echo renderProjectSummary($working_form);
	echo "</dl>";
};

?>