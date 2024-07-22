<!--
Az űrlap elküldését követően lesz az URL-ben distance, avg és price paraméter
Az "eredmények" rész csak akkor jelenjen meg, ha léteznek ilyen paraméterek
A számolt értékek pedig a paraméterek értékei alapján
Átlagfogyasztás: hány litert fogyaszt 100km megtétele alatt
-->
<!DOCTYPE html>
<html lang="hu">
<head>
	
	<meta charset="UTF-8">
	
	<title>Mennyit tankolj?</title>
    
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    
    <meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	
	<link rel="stylesheet" href="src/style.css">
	<link rel="stylesheet" href="src/fontawesome5/css/all.css">
	
</head>
<body>

	<div id="title-bar">
		<h1>
			<i class="fas fa-tint"></i>
			Mennyit tankolj?
		</h1>
	</div>
	
	<div id="main">
		<div class="inside">

			<?php

				$amount = '';	
				$total = '';
				

				if (isset($_GET['distance']) && isset($_GET['avg']) && isset($_GET['price']))
				{
					$distance = (int)$_GET['distance'];
					$avg = (float)$_GET['avg'];
					$price = (int)$_GET['price'];

						$amount = $distance / 100 * $avg;
						$total = $amount * $price;
						
						$amount = number_format($amount, 2, ',', ' ');
						$total = number_format($total, 0, '', ' ');

					
						if($distance != '' && $avg != '' && $price != '')
						{
							echo '<section class="collection">
											
									<h2>Eredmény</h2>
									
									<div class="result">
										
										<h3>Szükséges mennyiség</h3>
										<p class="amount">'. $amount . ' liter</p>
										
										<h3>Várható költség</h3>
										<p class="total">'. $total .' HUF</p>
										
									</div>
								
								</section>';
								echo'<a href="http://localhost/otthoni%20suli/01-php-fuel/" target="_self" style="background-color: #009A00;color: white;padding: 14px 25px;text-align: center;text-decoration: none;display:block">Új kalkuláció</a>';
						}else
						{
						/*
							echo'<section>
					
								<h2>Milyen hosszú útra készülsz?</h2>
								
								<form action="" method="get">
								
									<div>
										<label for="distance">Távolság (km)</label>
										<input type="number" id="distance" value="200" name="distance">
									</div>
									<div>
										<label for="avg">Átlagfogyasztás (L/100km)</label>
										<input type="number" id="avg" value="8.3" name="avg">
									</div>
									<div>
										<label for="price">Üzemanyagár (HUF/L)</label>
										<input type="number" id="price" value="375" name="price">
									</div>
									
									<button>Kalkuláció</button>
									
								</form>
						
							</section>';
							*/
							echo'<h2 style="background: #009A00;font-weight: lighter;color: #fff;text-align: center;font-size: 100%;padding: 10px;margin: 0;margin-bottom: 25px;">Kérem adja meg az összes adatot a számításhoz</h2>';
							echo'<a href="http://localhost/otthoni%20suli/01-php-fuel/" target="_self" style="background-color: #009A00;color: white;padding: 14px 25px;text-align: center;text-decoration: none;display:block">Újra</a>';
						}	
				} else 
				{
					echo '<section>
					
							<h2>Milyen hosszú útra készülsz?</h2>
							
							<form action="" method="get">
							
								<div>
									<label for="distance">Távolság (km)</label>
									<input type="number" id="distance" value="200" name="distance" step="0.1">
								</div>
								<div>
									<label for="avg">Átlagfogyasztás (L/100km)</label>
									<input type="number" id="avg" value="8.3" name="avg" step="0.1">
								</div>
								<div>
									<label for="price">Üzemanyagár (HUF/L)</label>
									<input type="number" id="price" value="375" name="price" step="0.5">
								</div>
								
								<button>Kalkuláció</button>
								
							</form>
						
						</section>';
				}
			?>
			
		</div>
	</div>
	
</body>
</html>