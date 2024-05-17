<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Composant - Carte-graphique</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
	</head>
	<body>
<?php
$item = $_GET['item'];
$comp = [];
$desk = "";
$type = 'Carte-graphique';
$file = fopen('json/Carte-graphique.json','r+');
while(!feof($file)){
  $ligne = fgets($file);
  $comp[] = json_decode($ligne,true);
}
$value = $comp[$item];

$marque = "<li>Marque : {$value['marques']} </li>";
$chipGraph = "<li>Chipset Graphique : {$value['chipGraph']} </li>";
$marquesGPU = "<li>Marque du GPU : {$value['marquesGPU']} </li>";
$fChip = "<li>Fréquence du Chipset : {$value['FréquenceChipset']} </li>";
$fChipB = "<li>Fréquence du Chipset boosté : {$value['FréquenceChipsetB']} </li>";
$overclocked = "<li>Overclocked : {$value['overclocked']} </li>";
$BUS = "<li>BUS : {$value['BUS']} </li>";  
$MVideo = "<li>Mémoire vidéo : {$value['MVideo']} </li>";
$FMVideo = "<li>Fréquence Mémoire vidéo : {$value['FMVideo']} </li>";
$TMem = "<li>Type de mémoire : {$value['TMemoire']} </li>";
$DirectX = "<li>DirectX : {$value['DirectX']} </li>";
$MultiGPU = "<li>MultiGPU : {$value['MultiGPU']} </li>";
$HDR = "<li>HDR : {$value['HDR']} </li>";
$q4k = "<li>4k prise en charge : {$value['4k']} </li>";
$vr = "<li>Virtual Réality prise en charge : {$value['VR']} </li>";
$sortiv = $value['Sortie vidéo'];
$a = "";
foreach ($sortiv as $un) {
  $a = "<li>{$un}</li>{$a}";
}
$outVid = "<li>Sortie vidéo :<ul>{$a}</ul></li>";
$nbecran = "<li>Nombre d'écrans max : {$value['EcMax']}</li>";
$DVI_Dual_Link = "<li>DVI Dual Link : {$value['DVIDL']}</li>";
$Coal = $value['CoAl'];
$b = "";
foreach ($Coal as $de) {
  $b = "<li>{$de}</li>{$b}";
}
$Commalim = "<li>Connecteurs d'alimentation : <ul>{$b}</ul></li>";
$TypeR = "<li>Type de refroidiseement : {$value['TypeR']}</li>";
$Conso = "<li>Consommation (en W) : {$value['Conso']}</li>";
$slotPCI = "<li>Nombre de slot PCI : {$value['slotPCI']}</li>";
$LED = "<li>LED : {$value['LED']}</li>";
$LEDRGB = "<li>LED RGB : {$value['LEDRGB']}</li>";
$longueur = "<li>Longueur :{$value['longueur']}</li>";
$largeur = "<li>Largeur :{$value['largeur']}</li>";
$desk = "<ul>" . $marque . $chipGraph . $marquesGPU . $fChip . $fChipB . $overclocked . $BUS . $MVideo . $TMem . $DirectX . $MultiGPU . $HDR . $q4k . $vr . $outVid . $nbecran . $DVI_Dual_Link . $Commalim . $TypeR . $Conso . $slotPCI . $LED . $LEDRGB . $longueur . $largeur . "</ul>";
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