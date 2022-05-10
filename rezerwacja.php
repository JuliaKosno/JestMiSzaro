<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Potwierdzenie rezerwacji </title>
		<link rel="stylesheet" 
			type="text/css"
			href="index1.css"
			/>
		<link rel="stylesheet" href="css_fa/all.css">
		<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Raleway:ital@1&display=swap" rel="stylesheet">
		<style>
	table,th,td {border:1px solid white; text-align: center; padding:7px;}
	table{margin-right:auto;margin-left:auto; margin-top: 50px;}
	header{ margin-bottom: 30px;}
        </style>
	</head>
	<body style="text-align: center; background-color: #414042;">
	<header>
			<div id="page-title">
					Jest Mi Szaro
			</div>
			<nav>
				<input type="checkbox" id="check">
				<label for="check" class="checkbt">
					<i class="fas fa-bars"></i>
				</label>
				<div class="nav-bar">
					<ul id="nav-list">
						<li><a  href="index.html">Home </a></li>
						<li><a href="Omnie.html">O mnie</a></li>
						<li><a href="Gallery.html">Galeria</a></li>
						<li><a class="active" href="Formularz.html">Terminy</a></li>
						<li><a href="Regulamin.html">Regulamin</a></li>
					</ul>
				</div>
			</nav>
		</header>
<?php
if ( !empty($_REQUEST["imie"]) && !empty($_REQUEST["nazwisko"]) && !empty($_REQUEST["email"]) && !empty($_REQUEST["wydarzenie"]) && !empty($_REQUEST["data"]) ) {
	$imie = $_REQUEST["imie"] ;
	$nazwisko = $_REQUEST["nazwisko"] ;
	$email = $_REQUEST["email"] ;
	$wydarzenie = $_REQUEST["wydarzenie"] ;
	$data = $_REQUEST["data"] ;
} else die("Proszę o wypełnienie wszystkich pól formularza.") ;

$string = file_get_contents("rezerwacje.json") ; 
if ($string) 
	$arr = json_decode($string, true) or die("Niewłaściwy plik JSON!") ;
else	
	$arr = array() ;
array_push($arr,array("imie" => $imie,"nazwisko" => $nazwisko, "email" => $email,  "wydarzenie" => $wydarzenie,  "data" => $data)) ;
$string = json_encode($arr) ;
if(file_put_contents("rezerwacje.json",$string)) 
	echo "Dodane!" ;
else
	die("Błąd!") ;
?>
<?php
$string = file_get_contents("rezerwacje.json") ; 
if ($string) {
	$arr = json_decode($string, true) or die("Niewłaściwy plik JSON!") ;
	
	echo "<table>\n" ;
	echo "<tr> <th>Imię</th> <th>Nazwisko</th> <th>Email</th> <th>Wydarzenie</th> <th>Data</th></tr>\n" ;
	foreach ($arr as $row) {
		echo "<tr>\n" ;
		echo "<td> {$row['imie']} </td>";
		echo "<td> {$row['nazwisko']} </td>" ;
		echo "<td> {$row['email']} </td>" ;
		echo "<td> {$row['wydarzenie']} </td>" ;
		echo "<td> {$row['data']} </td>\n" ;
		echo "</tr>\n" ;
	}
	echo "</table>\n" ;	
	
}
?>

</body>
</html>
