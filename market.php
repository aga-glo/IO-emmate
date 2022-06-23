
<?php

	

require_once('disconnect-user.php');


	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.zonda.exchange/rest/trading/ticker",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/json"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	 // echo "cURL Error #:" . $err;
	} else {
	  //echo $response;
	}

	
	$time = time();

	//echo $x;
	//exit;
	$obj = json_decode($response, true);

	$daiPrice = $obj['items']['DAI-PLN']['rate'];
	$btcPrice = $obj['items']['BTC-PLN']['rate'];
	$dashPrice = $obj['items']['DASH-PLN']['rate'];
	$tronPrice = $obj['items']['TRX-PLN']['rate'];
	$sushiPrice = $obj['items']['SUSHI-PLN']['rate'];
	$eosPrice = $obj['items']['EOS-PLN']['rate'];
	$polkaPrice = $obj['items']['DOT-PLN']['rate'];
	$dogePrice = $obj['items']['DOGE-PLN']['rate'];

?>



<!DOCTYPE html >

<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>E-money mate</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
	<link rel="icon"  href="image/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	</head>
<body>
	<header>
		<main>
			<div class="contentWrapper"></div>
			<div class="logoStyle">
			<h2><a href="welcomePage.php">EM MATE</a></h2>
		</div>
 
			<section class="leftPanel">
				<nav>
					<ul>
					<input type="text" id="search" placeholder="Search...">
					<li><a href="myWallet.php" >MY WALLET</a></li>
					<li><a href="transactions.php">TRANSACTIONS</a></li>
					<li><a href="market.php">MARKET</a></li>					
					<li><a href="settings.php" class="settings">SETTINGS</a></li>
					<li><a href="logout.php">LOG OUT</a></li>
				
				</ul>
				</nav>
			</section>
			<section class="rightPanel">
				<div class="socialInfo"><h4>CHECK NEWS ON MARKET</h4><br>
					</div>
					<div class="moneyStatus">
					<table class="moneyStat">
						<tr>
							<th>TYPE</th>
							<th>PRICE</th>
						</tr>
						<tr>
							<td>DAI</td>
							<td><?php echo $daiPrice ?></td>
							
						</tr>
						<tr>
							<td>BITCOIN</td>
							<td><?php echo $btcPrice ?></td>
							
						</tr><tr>
							<td>DASH</td>
							<td><?php echo $dashPrice ?></td>
							
						</tr><tr>
							<td>TRON</td>
							<td><?php echo $tronPrice ?></td>
							
						</tr><tr>
							<td>SUSHITOKEN</td>
							<td><?php echo $sushiPrice ?></td>
							
						</tr><tr>
							<td>EOS</td>
							<td><?php echo $eosPrice ?></td>
							
						</tr><tr>
							<td>POLKADOT</td>
							<td><?php echo $polkaPrice ?></td>
							
						</tr><tr>
							<td>DOGE</td>
							<td><?php echo $dogePrice ?></td>
						</tr>
						</table>

						<div class="stockImage"> 
						<img src="https://user-images.githubusercontent.com/56108700/174786605-a146782a-99de-4aac-a51a-a4db4c43426d.png">
						</div>
						</div>

					
				
			</section>
			</div>
		</main>


</header>
</body>
</html>