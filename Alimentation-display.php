<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Composant - Alimentation</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
	</head>
	<body>
<?php
$item = $_GET['item'];
$comp = [];
$desk = "";
$type = 'Alimentation';
$file = fopen('json/Alimentation.json','r+');
while(!feof($file)){
  $ligne = fgets($file);
  $comp[] = json_decode($ligne,true);
}
$value = $comp[$item];

$marque = "<li>Marque : {$value['marques']} </li>";
$Puissance = "<li>Puissance (en W) : {$value['Puissance']} </li>";
$CertifGoldPlus = "<li>Certification Gold Plus : {$value['CertifGoldPlus']} </li>";
$Modulaire = "<li>Modulaire : {$value['Modulaire']} </li>";
$Modularité = "<li>Modularité : {$value['Modularité']} </li>";
$CoAl = $value['CoAl'];
$a = "";
foreach ($CoAl as $un) {
  $a = "<li>{$un}</li>{$a}";
}
$CoAl = "<ul>Connecteur(s) alimentation ( & ) :{$a}</ul>";
$diametreVent = "<li>Diamètre Ventilateur (en mm) : {$value['diametreVent']} </li>";
$Silencieux = "<li>Silencieux : {$value['Silencieux']} </li>";
$Formalim = $value['Format-Alim'];
$b = "";
foreach ($Formalim as $un) {
  $b = "<li>{$un}</li>{$b}";
}
$Format_Alim = "<li>Format alimentation :<ul>{$b}</ul></li>";
$Normalim = $value['Normes-Alim'];
$c = "";
foreach ($Normalim as $un) {
  $c = "<li>{$un}</li>{$c}";
}
$Normes_Alim = "<li>Normes alimentation :<ul>{$c}</ul></li>";
$MuGPU = $value['MultiGPU'];
$d = "";
foreach ($MuGPU as $un) {
  $d = "<li>{$un}</li>{$d}";
}
$MultiGPU = "<li>Multi GPU :<ul>{$d}</ul><li>";
$Hauteur = "<li>Hauteur (en mm) : {$value['Hauteur']} </li>";
$Largeur = "<li>Largeur (en mm) : {$value['Largeur']} </li>";
$Longueur = "<li>Longueur (en mm) : {$value['Longueur']} </li>";
$desk = "<ul>" . $marque . $Puissance . $CertifGoldPlus . $Modulaire . $Modularité . $CoAl . $diametreVent . $Silencieux . $Format_Alim . $Normes_Alim . $MultiGPU . $Hauteur . $Largeur . $Longueur . "</ul>";
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