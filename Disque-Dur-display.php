<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Composant - Disque-Dur</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
	</head>
	<body>
<?php
$item = $_GET['item'];
$comp = [];
$desk = "";
$type = 'Disque-Dur';
$file = fopen('json/Disque-Dur.json','r+');
while(!feof($file)){
  $ligne = fgets($file);
  $comp[] = json_decode($ligne,true);
$value = $comp[$item];

$marque = "<li>Marques : {$value['marques']} </li>";
$Interface = "<li>Interface avec l'ordinateur : {$value['Interface']} </li>";
$Format = "<li>Format (en pouces) : {$value['Format']} </li>";
$Capacité = "<li>Capacité (en Go) : {$value['Capacité']} </li>";
$VRota = "<li>Vitesse de rotation : {$value['VRota']} </li>";
$TCache = "<li>Taille du cache (en Mo) : {$value['TCache']} </li>";
$TypeDisque = "<li>Type de Disque : {$value['TypeDisque']} </li>";
$desk = "<ul>" . $marque . $Interface . $Format . $Capacité . $VRota . $TCache . $TypeDisque . "</ul>";
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