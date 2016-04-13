<?php

require_once('../../lib/FQVergleiche.php');

/**
 * Check out example.php for more information how to configure your xml request.
 * Please make sure to insert an valid xml link here to receive you template preview!
 */
$config = array(
	'xml' => 'https://vergleiche.financequality.net/xml/LOCALE/CALCULATOR_TYPE/YOUR_HASH/',
	'user' => 'your username',
	'pass' => 'your password'
);

$fq = new FQVergleiche($config);
$fq->run();

// receive your product list for the web view
$productList = $fq->getProductList();

?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Festgeld Vergleich</title>

	<link rel="stylesheet" href="/web/css/components.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<!-- div.container start -->
<div class="container">

	<div>
		<h1 class="text-primary">Festgeld Vergleichsrechner</h1>
		<p>&nbsp;</p>
	</div>

	<div class="row content-head">
		<div class="display-table col-xs-3 col-md-3"><span>Anbieter</span></div>
		<div class="display-table col-xs-3 col-md-5"><span>Vorteile</span></div>
		<div class="display-table col-xs-3 col-md-2"><span>Zinsen pro Jahr / Ertrag</span></div>
		<div class="display-table col-xs-3 col-md-2"></div>
	</div>

	<?php
	$i = 0;
	foreach($productList as $product) {
		?>

		<div class="row product-element">
			<div class="row">

				<!-- merchant info -->
				<div class='col-xs-3 col-md-3'>
					<div class="display-table">
						<span><img src='<?php echo $product['merchant_logo']; ?>' alt='<?php echo $product['merchant']; ?>' /></span>
					</div>
				</div>

				<!-- advantage -->
				<div class='col-xs-3 col-md-5'>
					<div class="display-table">
						<div>
							<ul>
								<?php if ($product['advantage1']) { echo "<li> {$product['advantage1']} </li>"; } ?>
								<?php if ($product['advantage2']) { echo "<li> {$product['advantage2']} </li>"; } ?>
								<?php if ($product['advantage3']) { echo "<li> {$product['advantage3']} </li>"; } ?>
							</ul>
						</div>
					</div>
				</div>

				<!-- account fee and interests -->
				<div class='col-xs-3 col-md-2'>
					<div class="display-table">
						<div>
							<span class="bigger-text"><?php echo $product['interest']; ?> %</span>
						</div>
					</div>
				</div>

				<!-- cta -->
				<div class='col-xs-3 col-md-2'>
					<div class="display-table">
						<span><a href='<?php echo $product['tracking_link']; ?>' class='btn btn-primary'>Zum Angebot &raquo;</a></span>
					</div>
				</div>

			</div>


			<div class="tabs hidden-xs">
				<!-- Nav tabs -->
				<ul class="nav nav-pills">
					<li role="presentation"><a href="#konditionen<?php echo $i; ?>" aria-controls="konditionen<?php echo $i; ?>" role="tab" data-toggle="tab">Konditionen</a></li>
					<li role="presentation"><a href="#einlagensicherung<?php echo $i; ?>" aria-controls="einlagensicherung<?php echo $i; ?>" role="tab" data-toggle="tab">Einlagensicherung</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane" id="konditionen<?php echo $i; ?>">
						<div class="padding">

							<p>Platzhalter Konditionen</p>

							<ul>
								<?php if ($product['detail1']) { echo "<li> {$product['detail1']} </li>"; } ?>
								<?php if ($product['detail2']) { echo "<li> {$product['detail2']} </li>"; } ?>
								<?php if ($product['detail3']) { echo "<li> {$product['detail3']} </li>"; } ?>
							</ul>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="einlagensicherung<?php echo $i; ?>">
						<div class="padding">
							Platzhalter Einlagensicherung
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php
		$i++;
	}
	?>

	<!-- div.container end -->
</div>

</body>
</html>
