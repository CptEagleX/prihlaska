<?php
session_start();
$max = 'max="' . date("Y") . '"';

if (!empty($_SESSION)) {
	foreach ($_SESSION as $key => $value) {
		if (is_array($value)) {
			foreach ($value as $key2 => $value2) {
				if (isset($_SESSION[$key][$key2]) && $_SESSION[$key][$key2] != "") {
					$y[$key2] = $_SESSION[$key][$key2];
					$set = $key2 . '_no';
					$n[$set] = '';
				} else {
					$y[$key2] = '';
					$set = $key2 . '_no';
					$n[$set] = '&nbsp&nbsp&nbsp Prosím doplňte nebo upravte.';
				}
			}
		} else {
			if (isset($_SESSION[$key]) && $_SESSION[$key] != "") {
				$y[$key] = $_SESSION[$key];
				$set = $key . '_no';
				$n[$set] = '';
			} else {
				$y[$key] = '';
				$set = $key . '_no';
				$n[$set] = '&nbsp&nbsp&nbsp Prosím doplňte nebo upravte.';
			}
		};
	};
		//gender
	if (array_key_exists('gender', $_SESSION) && $_SESSION['gender'] == 'Muž') {
		$a = 'checked';
		$b = '';
		$c = '';
	} elseif (array_key_exists('gender', $_SESSION) && $_SESSION['gender'] == 'Žena') {
		$a = '';
		$b = 'checked';
		$c = '';
	} else {
		$a = '';
		$b = '';
		$c = '<br><span class="red">Prosím doplňte.</span>';
	};

		//equipment
	if (array_key_exists('ski', $_SESSION) && array_key_exists('snowboard', $_SESSION)) {
		$ski = 'checked';
		$snowboard = 'checked';
		$equipment = '';
	} elseif (array_key_exists('ski', $_SESSION)) {
		$ski = 'checked';
		$snowboard = '';
		$equipment = '';
	} elseif (array_key_exists('snowboard', $_SESSION)) {
		$ski = '';
		$snowboard = 'checked';
		$equipment = '';
	} else {
		$equipment = "<br><span class='red'>Zvolte prosím alespoň jednu možnost.</span>";
		$ski = '';
		$snowboard = '';
	}
} else {
	$y['name'] = '';
	$n['name_no'] = '';
	$y['surname'] = '';
	$n['surname_no'] = '';
	$y['day'] = '';
	$y['month'] = '';
	$y['year'] = '';
	$n['day_no'] = '';
	$a = '';
	$b = '';
	$c = '';
	$y['street'] = '';
	$n['street_no'] = '';
	$y['city'] = '';
	$n['city_no'] = '';
	$y['ZIP'] = '';
	$n['ZIP_no'] = '';
	$ski = '';
	$snowboard = '';
	$equipment = '';
	$y['name2'] = '';
	$n['name2_no'] = '';
	$y['surname2'] = '';
	$n['surname2_no'] = '';
	$y['number'] = '';
	$n['number_no'] = '';
	$y['email'] = '';
	$n['email_no'] = '';
	$y['street2'] = '';
	$n['street2_no'] = '';
	$y['city2'] = '';
	$n['city2_no'] = '';
	$y['ZIP'] = '';
	$n['ZIP2_no'] = '';
	$y['informations'] = '';
}
?>


<!DOCTYPE html>
<html lang="cs">
<head>
	<title>Přihláška na tábor</title>
	<link rel="stylesheet" type="text/css" href="prihlaska.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:700&display=swap" rel="stylesheet">
</head>
<body>
	<div id="page">
		<h1>Přihláška na dětský lyžařský tábor</h1>
		<form method="post" action="Prihlaska2_verify.php">
			<p class="text">* tábor je od 8 do 15 let</p>
			<p class="red" class="text">* všechna pole ohraničená červeně jsou chybně vyplněna nebo prázdná</p>
			<h2>Dítě: </h2>
			Jméno: <input type="text" name="name" value="<?= $y['name'] ?>"><?= $n['name_no'] ?><br>
			Příjmení: <input type="text" name="surname" value="<?= $y['surname'] ?>"><?= $n['surname_no'] ?><br>
			Datum narození: <input type="number" class="birth" name="birth[day]" min="1" max="31" value="<?= $y['day'] ?>"> / <input type="number" class="birth" name="birth[month]" min="1" max="12" value="<?= $y['month'] ?>"> / <input type="number" name="birth[year]" min="1900" <?= $max ?> id="year" value="<?= $y['year'] ?>"><?= $n['day_no'] ?><br>
			Pohlaví: <br>
			<input type="radio" id="male" name="gender" value="Muž" <?= $a ?>>Muž<br>
			<input type="radio" id="female" name="gender" value="Žena" <?= $b ?>>Žena
			<?= $c ?>
			<h3 class="move">Adresa: </h3>
			Ulice a číslo: <input type="text" name="adress[street]" value="<?= $y['street'] ?>"><?= $n['street_no'] ?><br>
			Město: <input type="text" name="adress[city]" value="<?= $y['city'] ?>"><?= $n['city_no'] ?><br>
			PSČ: <input type="number" name="adress[ZIP]" value="<?= $y['ZIP'] ?>"><?= $n['ZIP_no'] ?><br>
			Dítě umí jezdit na: <br>
			Lyžích: <input type="checkbox" name="ski" <?= $ski ?>><br>
			Snowboardu: <input type="checkbox" name="snowboard" <?= $snowboard ?>>
			<?= $equipment ?>
			<!-- Zákonný zástupce -->
			<h2>Zákonný zástupce: </h2>
			Jméno: <input type="text" name="name2" value="<?= $y['name2'] ?>"><?= $n['name2_no'] ?><br>
			Příjmení: <input type="text" name="surname2" value="<?= $y['surname2'] ?>"><?= $n['surname2_no'] ?><br>
			Telefonní číslo: <input type="text" name="number" value="<?= $y['number'] ?>"><?= $n['number_no'] ?><br>
			E-mail: <input type="email" name="email" value="<?= $y['email'] ?>"><?= $n['email_no'] ?>
			<h3 class="move">Adresa: </h3>
			Ulice a číslo: <input type="text" name="adress2[street2]" value="<?= $y['street2'] ?>"><?= $n['street2_no'] ?><br>
			Město: <input type="text" name="adress2[city2]" value="<?= $y['city2'] ?>"><?= $n['city2_no'] ?><br>
			PSČ: <input type="number" name="adress2[ZIP2]" value="<?= $y['ZIP'] ?>"><?= $n['ZIP2_no'] ?>

			<h3>Další důležité informace o dítěti (léky, omezení, atd.)</h3>
			<input type="text" name="informations" id="info" class="white" value="<?= $y['informations'] ?>"><br>
			<input type="submit" value="Odeslat" id="submit" class="white"><br>
		</form>

		<p id="demo"></p>
	</div>

	<script>
		var d = 0;
		<?php
			if (!empty($_SESSION)) {
				echo 'd = 1;';
			}
		?>
		if (d == 1) {
			var x = document.querySelectorAll('input');
			for (var i = 0; i < x.length - 2; i++) {
				if (x[i].value == "") {
					x[i].style.border = '2px solid red';
				}
			}
		}
	</script>
</body>
</html>