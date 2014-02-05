<?php 

$config["css"] = array('bootstrap-responsive.min','bootstrap.min','jquery.cycle2','jquery.fancybox','superslides','font-awesome.min','component','gnmenu','styles');
$config["js"] = array('bootstrap','jquery.superslides.min','jquery.fancybox','jquery.scrollTo.min','vmouse.min','jquery.animate-enhanced.min','jquery.easing.1.3','map','rhinoslider-1.05.min','jquery.validate.min','classie','gnmenu.min','livesearch');

?>

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<head>
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
	<title>LX2</title>
	<meta name="description" content="A Design Firm" />
	<meta name="keywords" content="design firm" />
	<meta name="author" content="LXII Design Studio" />
	<!-- <base href="http://localhost:8888/"> -->
	<!-- <base href="http://github.localhost/LXII-Ver-Master/public_html/"> -->
	<base href="http://www.lx2.com.my/">

	<?= links($config["css"],"css"); ?>
	<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0VFJxsJtbPPUBwJg54dNnde9RF2_Mce4&sensor=true">
	</script>

</head>
<body>
	
	<?php

	// discard "?" in the url
	$breadcrumbs = explode("?",$_SERVER["REQUEST_URI"]);
	$breadcrumbs = str_replace("http://www.lx2.com.my/", "", $breadcrumbs);
	// $breadcrumbs = str_replace("/lxii_ver4/public_html", "", $breadcrumbs);
	
	
	// Spli the "/"
	$breadcrumbs = explode("/",$breadcrumbs[0]);
	
	// Discard empty value in array
	$breadcrumbs = array_filter($breadcrumbs);

	$breadcrumb = "";
	foreach ($breadcrumbs as $key => $b) {

		switch ($b) {
			case 'order':
			$friendly_text = 'products';
			break;

			case 'public_html':
			$friendly_text = 'Home';
			break;

			case 'success':
			$friendly_text = 'Payment';
			break;

			case '1':
			$friendly_text = 'Step 1';
			break;

			case '2':
			$friendly_text = 'Step 2';
			break;

			case '3':
			$friendly_text = 'Step 3';
			break;

			case 'project':
			$friendly_text = 'Checkout';
			break;

			default:
			$friendly_text = $b;
			break;
		};

		if ($key != count($breadcrumbs)) {
			if($b=="public_html"){
				$b = "#1";
			};
			$tmp_str = "<a href='$b'>$friendly_text</a>";
		}else{
			
			if(isset($breadcrumbs[2]) && $breadcrumbs[1]=="order"){

				$tmp_str = "<span>".$records[0]->title."</span>";

			} else if(isset($breadcrumbs[2]) && $breadcrumbs[1]=="portfolio") {

				$tmp_str = "<span>".$records[0]->title."</span>";

			} else {

				$tmp_str = "<span>$friendly_text</span>";

			};
		}
		$breadcrumb .= "<li class='breadcrumbs'>".$tmp_str."</li>";
	};

	?>

	<div class='block hide-on-large'></div>

	<ul id="gn-menu" class="gn-menu-main">
		<li class="gn-trigger">

			<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
			<ul id="results"></ul>
			<nav class="gn-menu-wrapper">
				<div class="gn-scroller">
					<ul class="gn-menu">
						<li class="gn-search-item">
							<input placeholder="Search" type="search" class="gn-search">
							<a class="gn-icon gn-icon-search"><span>Search</span></a>
						</li>


						<li>
							<a class="gn-icon gn-icon-thumbs" href="about">About LXII</a>
							<ul class="gn-submenu">
								<li><a href="mission" class="gn-icon gn-icon-thumbs">Our Mission</a></li>
								<!-- <li><a class="gn-icon gn-icon-thumbs">Charity</a></li> -->
							</ul>
						</li>
						<li><a class="gn-icon gn-icon-portfolio" href="portfolio">Porfolio</a></li>
						<li>
							<a class="gn-icon gn-icon-product" href="order">Products</a>
							<ul class="gn-submenu">								
								<li><a class="gn-icon gn-icon-graphic"  href="order?cat=print">Graphic</a></li>
								<li><a class="gn-icon gn-icon-web"  href="order?cat=web">Web</a></li>
								<li><a class="gn-icon gn-icon-camera"  href="order?cat=photo">Photography</a></li>
							</ul>
						</li>
						<li><a class="gn-icon gn-icon-contact" href="contact">Contact</a></li>
					</ul>
				</div><!-- /gn-scroller -->
			</nav>
		</li>
		<li><a href="" id="logo"><img src="img/logo.png"></a></li>
		<?php echo $breadcrumb ?>
		<li id="call_us_now">
			<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
			<div id="SkypeButton_Dropdown_services_268_1">
				<script type="text/javascript">
					Skype.ui({
						"name": "chat",
						"element": "SkypeButton_Dropdown_services_268_1",
						"participants": ["services_268"],
						"imageColor": "blue",
						"imageSize": 24
					});
				</script>
			</div>
		</li>
	</ul>