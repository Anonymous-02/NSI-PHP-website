<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Composant - Carte-Mere</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
	</head>
	<body>
<?php
$item = $_GET['item'];
$comp = [];
$desk = "";
$type = 'Carte-Mere';
$file = fopen('json/Carte-Mere.json','r+');
while(!feof($file)){
  $ligne = fgets($file);
  $comp[] = json_decode($ligne,true);
$value = $comp[$item];


$FMem = $value['FreqM'];
$a = "";
foreach ($FMem as $un) {
  $a = "<li>{$un}</li>" . $a;
}
$FMem = "<li>Fréquence mémoire :<ul>{$a}</ul></li>";
$CoGra = $value['CoGra'];
$b = "";
foreach ($CoGra as $un) {
  $b = "<li>{$un}</li>" . $b;
}
$CoGra = "<li>Connecteur(s) graphique ( & ) :<ul>{$b}</ul></li>";
$CoDisc = $value['CoDisc'];
$c = "";
foreach ($CoDisc as $un) {
  $c = "<li>{$un}</li>" . $c;
}
$CoDisc = "<li>Connecteurs Disques ( & ) :<ul>{$c}</ul></li>";
$CoPaAr = $value['CoPaAr'];
$d = "";
foreach ($CoPaAr as $un) {
  $d = "<li>{$un}</li>" . $d;
}
$CoPaAr = "<li>Connecteurs panneau arrière ( & ) :<ul>{$d}</ul></li>";
$CoAd = $value['CoAd'];
$e = "";
foreach ($CoAd as $un) {
  $e = "<li>{$un}</li>" . $e;
}
$CoAd = "<li>Connecteurs additionnels ( & ) :<ul>{$e}</ul></li>";
$PortsUSB = $value['PortsUSB'];
$f = "";
foreach ($PortsUSB as $un) {
  $f = "<li>{$un}</li>" . $f;
}
$PortsUSB = "<li>Ports USB ( & ) :<ul>{$f}</ul></li>";
$marque = "<li>Marque : {$value['marques']} </li>";
$chipset = "<li>Chipset CPU : {$value['chipset']} </li>";
$socket = "<li>Socket : {$value['socket']} </li>";
$TMem = "<li>Type de Mémoire : {$value['TMemoire']} </li>";
$CapaMaxSlot = "<li>Capacité Max Par Slot : {$value['CapaMaxSlot']} </li>";
$CapaMaxRAM = "<li>Capacité maximale de RAM : {$value['CapaMaxRAM']} </li>";
$NbCaAudio = "<li>Nombre de canaux audio : {$value['NbCaAudio']} </li>";
$NbCoVenti = "<li>Nombre de connecteurs pour ventilateurs : {$value['NbCoVenti']} </li>";
$LED = "<li>LED : {$value['LED']} </li>";
$longueur = "<li>Longueur : {$value['longueur']} </li>";
$largeur = "<li>Largeur : {$value['largeur']} </li>";

$desk = "<ul>" . $marque . $chipset . $socket . $FMem . $TMem . $CapaMaxSlot . $CapaMaxRAM . $CoGra . $NbCaAudio . $CoDisc . $NbCoVenti . $CoPaAr . $CoAd . $PortsUSB .$LED .$longueur .$largeur . "</ul>";
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
    </table>
  </div>";
?>
  </body>
</html>