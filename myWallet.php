
<?php

	require_once('disconnect-user.php');
	require_once('connect.php');

	if (isSet($_SESSION['userId'])) {
		
	} else {
		header('Location: index.php');
		exit;
	}

	$connection = @new mysqli($host, $db_user, $db_password, $db_name);

	if($connection->connect_errno!=0)
	{
	    echo "Error: ".$connection->connect_errno;
	    exit;
	}

	$userId = $_SESSION['userId'];
	$mysql= "SELECT * FROM coin_user WHERE id_user='$userId'";

	$queryResult = @$connection->query($mysql);
	if (!$queryResult) {
        echo("Error description: " . $connection->error);
        exit;
    } 

    $userCoins = Array();
	while ($row = $queryResult->fetch_assoc()) {
    	array_push($userCoins, $row);
	}

	//print_r($userCoins[0]['quantity']);
    

    


$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.zonda.exchange/rest/trading/ticker",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 5,
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
					<li><a href="myWallet.php" >MY WALLET </a></li>
					<li><a href="transactions.php">TRANSACTIONS </a></li>
					<li><a href="market.php">MARKET</a></li>					
					<li><a href="settings.php" class="settings">SETTINGS</a></li>
					<li><a href="logout.php">LOG OUT</a></li>
				
				</ul>
				</nav>
			</section>
			<section class="rightPanel">
				<div class="socialInfo"><h4>YOUR WALLET</h4><br>
					</div>
					<div class="moneyStatus">

					
					<table class="moneyStat">
						<tr>
							<th>TYPE</th>
							<th>AMOUNT</th>
						</tr>
						<tr>
							<td>BITCOIN</td>
							<td><?php echo ($userCoins[0]['quantity'])*$btcPrice;?></td>
							
						</tr>
						<tr>
							<td>DASH</td>
							<td><?php echo ($userCoins[1]['quantity'])*$dashPrice;?></td>
							
						</tr>
						</tr><tr>
							<td>EOS</td>
							<td><?php echo ($userCoins[4]['quantity'])*$eosPrice;?></td>
							
						</tr><tr>
							<td>POLKADOT</td>
							<td><?php echo ($userCoins[1]['quantity'])*$dashPrice;?></td>
							
						</tr>
						</tr>
						</table>

						
						</div>
						
						</div>
						<div class btcStyle>
						<div class="btcwdgt-chart" bw-cash="true" bw-noshadow="true"></div>
						<script>
  (function(b,i,t,C,O,I,N) {
    window.addEventListener('load',function() {
      if(b.getElementById(C))return;
      I=b.createElement(i),N=b.getElementsByTagName(i)[0];
      I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
    },false)
  })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');
</script>
</div>
				
			</section>
			</div>
		</main>


</header>
</body>
</html>
