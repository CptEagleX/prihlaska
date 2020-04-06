<?php
session_start();

if (!empty($_POST)) {
		//name
	$x = 0;
	if (!empty($_POST['name'])) {
		$array = str_split($_POST['name']);
		for ($i = 0; $i < strlen($_POST['name']); $i++) { 
			if (is_numeric($array[$i])) {
				unset($_POST['name']);
				$_POST['name'] = '';
			};
		};
	} else {
		$_POST['name'] = '';
	};
		//surname
	$x = 0;
	if (!empty($_POST['surname'])) {
		$array = str_split($_POST['surname']);
		for ($i = 0; $i < strlen($_POST['surname']); $i++) { 
			if (is_numeric($array[$i])) {
				$_POST['surname'] = '';
			};
		};
	} else {
		$_POST['surname'] = '';
	};
		//birth date
	$x = 0;
	if (!empty($_POST['birth']['day']) && !empty($_POST['birth']['month']) && !empty($_POST['birth']['year']) && is_numeric($_POST['birth']['day']) && is_numeric($_POST['birth']['month']) && is_numeric($_POST['birth']['year']) && ($_POST['birth']['year'] > 2000)) {
		$bday = $_POST['birth']['day'];
		$bmonth = $_POST['birth']['month'];
		$byear = $_POST['birth']['year'];
		$day = date('d');
		$month = date('m');
		$year = date('y');
		if (checkdate($month, $day, $year) == true) {
			$age1 = $day - $bday;
			if ($age1 < 0) {
				$age1 = -1;
			} else {
				$age1 = 0;
			};
			$age2 = $month - $bmonth + $age1;
			if ($age2 < 0) {
				$age2 = -1;
			} else {
				$age2 = 0;
			};
			if (($year - $byear + $age2 + 2000 < 8) || ($year - $byear + $age2 + 2000 > 16)) {
				//$_POST['birth'] = '';
				$_POST['birth']['day'] = '';
				$_POST['birth']['month'] = '';
				$_POST['birth']['year'] = '';
			};
		}
	} else {
		$_POST['birth']['day'] = '';
		$_POST['birth']['month'] = '';
		$_POST['birth']['year'] = '';
	};
		//gender
	$x = 0;
	/*if (empty($_POST['gender'])) {
		$_POST['gender'] = '';
	};*/
		//adress
	if (empty($_POST['adress']['street'])) {
		$_POST['adress']['street'] = '';
	}
	if (empty($_POST['adress']['city'])) {
		$_POST['adress']['city'] = '';
	}
	if (empty($_POST['adress']['ZIP']) || !is_numeric($_POST['adress']['ZIP']) || (strlen($_POST['adress']['ZIP']) != 5)) {
		$_POST['adress']['ZIP'] = '';
	}
		//zakonny zastupce
		//name
	$x = 0;
	if (!empty($_POST['name2'])) {
		$array = str_split($_POST['name2']);
		for ($i = 0; $i < strlen($_POST['name2']); $i++) { 
			if (is_numeric($array[$i])) {
				$_POST['name2'] = '';
			};
		};
	} else {
		$_POST['name2'] = '';
	};
		//surname
	$x = 0;
	if (!empty($_POST['surname2'])) {
		$array = str_split($_POST['surname2']);
		for ($i = 0; $i < strlen($_POST['surname2']); $i++) { 
			if (is_numeric($array[$i])) {
				$_POST['surname2'] = '';
			};
		};
	} else {
		$_POST['surname2'] = '';
	};
		//mobile number
	$x = 0;
	$number = null;
	if (!empty($_POST['number'])) {
		$array = str_split($_POST['number']);
		for ($i = 0; $i < strlen($_POST['number']); $i++) {
			if (is_numeric($array[$i]) || ($array[$i] == " ") || ($array[$i] == "+")) {
				$number .= $array[$i];
			} else {
				$_POST['number'] = '';
			};
		};
	} else {
		$_POST['number'] = '';
	};
		//email
	if (empty($_POST['email']) || (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false)) {
		$_POST['email'] = '';
	}
		//adress2
	if (empty($_POST['adress2']['street2'])) {
		$_POST['adress2']['street2'] = '';
	}
	if (empty($_POST['adress2']['city2'])) {
		$_POST['adress2']['city2'] = '';
	}
	if (empty($_POST['adress2']['ZIP2']) || !is_numeric($_POST['adress2']['ZIP2']) || (strlen($_POST['adress2']['ZIP2']) != 5)) {
		$_POST['adress2']['ZIP2'] = '';
	}

	$_SESSION = $_POST;
	header('location: Prihlaska2.php');

}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<title>Kontrola</title>
</head>
<body>

</body>
</html>