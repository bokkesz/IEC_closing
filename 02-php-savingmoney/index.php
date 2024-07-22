<!-- 
Az URL-ben lévő firstDay és reduction paraméterek meglétekor történik a számolás
Kalkuláció: a hónap első napján félreteszek "firstDay" összeget (PL 1500); majd a következő napon már "reduction"-nel kevesebbet (PL 50 esetén a második napon már csak 1450, stb.)
Mennyi jön össze 30 nap alatt? Mennyi egy év alatt?
-->
<!DOCTYPE html>
<html lang="hu">
<head>
	
	<meta charset="UTF-8">
	
	<title>Spórolás Kalkulátor</title>
    
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    
    <meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	
	<link rel="stylesheet" href="src/style.css">
	
</head>
<body>

	<div id="title-bar">
		<div>
			<h1>Spórolás Kalkulátor</h1>
		</div>
	</div>
	
	<div id="main">
	<?php if(isset($_GET['firstDay']) && isset($_GET['reduction'])): ?>

		<section class="outputSummary">
			
			<h2>Eredmény</h2>

			<?php 
			$firstDay = (int) $_GET['firstDay'];
			$reduction = (int) $_GET['reduction'];

			$total = 0;
			$actual = $firstDay;
			$month = [];
			for($i = 1; $i <= 30 && $actual > 0; $i++)
			{
				$total += $actual;

				$month[] = ['day' => $i, 
							'actual' => $actual, 
							'total' => $total];

				$actual -= $reduction;
			}
		
			$yearly = $total * 12;

			?>
		
			<p>Ha a hónap első napján félreteszel <span class="firstDay"><?= number_format($firstDay, 0, 0, ' ') ?></span> Ft-ot, majd aztán minden további nap <span class="reduction"><?= number_format($reduction, 0, 0, ' ')?></span> Ft-tal kevesebbet, akkor az alábbi megspórolt összegekre számíthatsz:</p>
			
		
			<div class="summary">
				<h3>Egy hónap alatt</h3>
				<p class="result month"><?= number_format($total , 0, 0, ' ') ?></p>

				<h3>Egy év alatt</h3>
				<p class="result year"><?= number_format($yearly , 0, 0, ' ') ?></p>

				<a href="http://localhost/otthoni%20suli/02-php-savingmoney/" class="new">Új kalkuláció</a>
			</div>
		
		</section>

		<section class="outputDetails">
		
			<h2>Részletek</h2>
		
			<table>
				<thead>
					<tr>
						<th>Nap</th>
						<th>Napi betét</th>
						<th>Összesen</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($month as $item)
					{
						echo'<tr>
								<th>'. $item['day'] .'</th>
								<td>'. $item['actual'] .'</td>
								<td>'. $item['total'] .'</td>
							</tr>';
					}
					
					?>
				</tbody>
			</table>
		
			</section>
	
	

<?php else: ?>

	<section class="input">
		
		<h2>Mennyit tudnál félretenni?</h2>

		<form action="" method="get">
		
			<div>
				<label for="firstDay">A hónap első napján</label>
				<input type="number" id="firstDay" name="firstDay" value='1500'>
			</div>

			<div>
				<label for="reduction">Csökkentés naponta</label>
				<input type="number" id="reduction" name="reduction" value='50'>
			</div>
		
			<button>Kalkuláció</button>
		
		</form>

		</section>


<?php endif; ?>
	</div>
</body>
</html>