<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Composant - Processeur</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
	</head>
	<body>
<?php
$item = $_GET['item'];
$comp = [];
$desk = "";
$type = 'Processeur';
$file = fopen('json/Processeur.json','r+');
while(!feof($file)){
  $ligne = fgets($file);
  $comp[] = json_decode($ligne,true);
}
$value = $comp[$item];
$marque = "<li>Marque : {$value['marques']}</li>";
$socket = "<li>Socket : {$value['socket']}</li>";
$fbase = "<li>Fréquence base (GHz) : {$value['Fréquence-base']}</li>";
$fboost = "<li>Fréquence boost (GHz) : {$value['Fréquence-boost']}</li>";
$coeurs = "<li>Coeurs : {$value['coeurs']}</li>";
$threads = "<li>Threads : {$value['Threads']}</li>";
$channel = "<li>Channel : {$value['Channel']}</li>";
$tdp = "<li>Termal design Power : {$value['TDP']}</li>";
$chipset = "<li>Chipset : {$value['chipset']}</li>";
$ventirad = "<li>Ventirad : {$value['Ventirad']}</li>";
$desk = "<ul>" . $marque . $socket . $fbase . $fboost . $coeurs . $threads . $channel . $tdp . $chipset . $ventirad . "</ul>";
echo "accueil > {$type} > {$value['titre']}<br><br>
<div class='Prévisualisation'>
  <table>
    <tr>
      <td>
        <img class='Composant' src='{$value['image-url']}'>
      </td>
      <td>
        <h4>{$value['titre']}</h4>
        <h5 id='caractéristiques'>{$desk}<br><br><br><p id='prix'>{$value['prix']} €</p></h5>
      </td>
    </tr>
  </table></div>";
?>
</body>
</html>