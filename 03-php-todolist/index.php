<!-- 
Teendők hozzáadása (title és description) - cím megadása kötelező
Tárolás: adatbázisban, vagy fájlban
Megjelenítése listában + készre állítás (lehetőleg ne töröljünk)
Alsó menü által váltás a két nézet között: bevitel, listázás
-->
<!DOCTYPE html>
<html lang="hu">
<head>
	
	<meta charset="UTF-8">
	
	<title>Teendők Listája</title>
    
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    
    <meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	
	<link rel="stylesheet" href="src/style.css">
	<link rel="stylesheet" href="src/resp.css">
	<link rel="stylesheet" href="src/fontawesome5/css/all.css">
	
</head>
<body>

	<div id="title-bar">
		<h1>
			<i class="fas fa-sticky-note"></i>
			Teendők Listája
		</h1>
	</div>

	<div id="main">
		<div class="inside">

			<section class="input">
				
				<h2>Új teendő hozzáadása</h2>
				
				<form action="" method="post">
				
					<p class="message">
						Az új teendő adatai sikeresen rögzítésre kerültek
					</p>
				
					<div>
						<label for="title">Megnevezés</label>
						<input type="text" id="title" name="title">
					</div>
					<div>
						<label for="description">Leírás</label>
						<textarea id="description" name="description"></textarea>
					</div>
					
					<button>Hozzáadás</button>
					
				</form>
				
			</section>
		
			<section class="collection">
				
				<h2>Teendők listája</h2>
				
				<ul class="list">

					<li>
						<h3>Titile of todo item</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni laborum officiis ullam iure reiciendis explicabo quam quia qui. Tempore fuga pariatur atque ipsa similique ullam, nulla beatae obcaecati blanditiis mollitia.</p>
						<div>
							<a href="?done=1">
								<i class="fas fa-check"></i> Elkészült
							</a>
						</div>
					</li>
					<li>
						<h3>Titile of todo item</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni laborum officiis ullam iure reiciendis explicabo quam quia qui. Tempore fuga pariatur atque ipsa similique ullam, nulla beatae obcaecati blanditiis mollitia.</p>
						<div>
							<a href="?done=2">
								<i class="fas fa-check"></i> Elkészült
							</a>
						</div>
					</li>
					<li>
						<h3>Titile of todo item</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni laborum officiis ullam iure reiciendis explicabo quam quia qui. Tempore fuga pariatur atque ipsa similique ullam, nulla beatae obcaecati blanditiis mollitia.</p>
						<div>
							<a href="?done=3">
								<i class="fas fa-check"></i> Elkészült
							</a>
						</div>
					</li>

				</ul>
				
			</section>
		
		</div>
	</div>

	<div id="navigation-bar">
		<ul>
			<li>
				<a href="?func=new" title="Új teendő">
					<i class="fas fa-plus-square"></i>
				</a>
			</li>
			<li>
				<a href="?func=list" title="Teendők listája">
					<i class="far fa-list-alt"></i>
				</a>
			</li>
		</ul>
	</div>
	
</body>
</html>