<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Composant - Memoire</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
	</head>
	<body>
<?php
$item = $_GET['item'];
$comp = [];
$desk = "";
$type = 'Memoire';
$file = fopen('json/Memoire.json','r+');
while(!feof($file)){
  $ligne = fgets($file);
  $comp[] = json_decode($ligne,true);
}
$value = $comp[$item];

$marque = "<li>Marques : {$value['marques']} </li>";
$TMemoire = "<li>Type de Mémoire : {$value['TMemoire']} </li>";
$Capa = "<li>Capacité (en Go) : {$value['Capa']} </li>";
$CapaBar = "<li>Capacité par barrette  : {$value['CapaBar']} </li>";
$FreqMem = "<li>Fréquence Mémoire (en MHz) : {$value['FreqMem']} </li>";
$NbBar = "<li>Nombre de barrette(s) : {$value['NbBar']} </li>";
$LED = "<li>LED : {$value['LED']} </li>";
$LEDRGB = "<li>LED RGB : {$value['LEDRGB']} </li>";
$Radiateur = "<li>Radiateur : {$value['Radiateur']} </li>";
$CouleurRad = "<li>Couleur Radiateur : {$value['CouleurRad']} </li>";
$VentFournis = "<li>Ventilateur fourni : {$value['VentFournis']} </li>";
$Tension = "<li>Tension (en Volts) : {$value['Tension']} </li>";
$desk = "<ul>" . $marque . $TMemoire . $Capa . $CapaBar . $FreqMem . $NbBar . $LED . $LEDRGB . $Radiateur . $CouleurRad . $VentFournis . $Tension . "</ul>";
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