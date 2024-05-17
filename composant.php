<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout - Composant - Prévisualisation</title>
		<link rel="stylesheet" type="text/css" href="DicAuPC.css">
    <script type="text/javascript">
      function cancel() {
        location.href ='';
      }
    </script>
	</head>
	<body>
<?php
$desk = "";
$list = array("Processeur", "Carte-graphique", "Carte-Mere", "Disque-Dur", "Memoire", "Refroidissement", "Alimentation","Aircooling","Watercooling","ventilateur-boitier");
$typeid = $_POST["type"];
$type = $list[$typeid];
$title = $_POST["titre"];
$image = $_POST["image-url"];
$prix = $_POST["prix"];
$save = [];
$save[$type] = [];
$num = count($save[$type]);
$save[$type][$num] = $_POST;
if  (  $typeid == 0 ) {
  if ($_POST['marques'] == 'AMD') {
    $save[$type][$num]['socket'] = $save[$type][$num]['socket-amd'];
    $save[$type][$num]['chipset'] = $save[$type][$num]['chipset-amd'];
  } else {
    $save[$type][$num]['socket'] = $save[$type][$num]['socket-intel'];
    $save[$type][$num]['chipset'] = $save[$type][$num]['chipset-intel'];
  }
  unset($save[$type][$num]['socket-intel']);
  unset($save[$type][$num]['socket-amd']);
  unset($save[$type][$num]['chipset-intel']);
  unset($save[$type][$num]['chipset-amd']);
  $marque = "<li>Marque : {$_POST['marques']}</li>";
  $socket = "<li>Socket : {$save[$type][$num]['socket']}</li>";
  $fbase = "<li>Fréquence base (GHz) : {$_POST['Fréquence-base']}</li>";
  $fboost = "<li>Fréquence boost (GHz) : {$_POST['Fréquence-boost']}</li>";
  $coeurs = "<li>Coeurs : {$_POST['coeurs']}</li>";
  $threads = "<li>Threads : {$_POST['Threads']}</li>";
  $channel = "<li>Channel : {$_POST['Channel']}</li>";
  $tdp = "<li>Termal design Power : {$_POST['TDP']}</li>";
  $chipset = "<li>Chipset : {$save[$type][$num]['chipset']}</li>";
  $ventirad = "<li>Ventirad : {$_POST['Ventirad']}</li>";
  $desk = "<ul>" . $marque . $socket . $fbase . $fboost . $coeurs . $threads . $channel . $tdp . $chipset . $ventirad . "</ul>";
}elseif($typeid == 1) {
  $marque = "<li>Marque : {$_POST['marques']} </li>";
  $chipGraph = "<li>Chipset Graphique : {$_POST['chipGraph']} </li>";
  $marquesGPU = "<li>Marque du GPU : {$_POST['marquesGPU']} </li>";
  $fChip = "<li>Fréquence du Chipset : {$_POST['FréquenceChipset']} </li>";
  $fChipB = "<li>Fréquence du Chipset boosté : {$_POST['FréquenceChipsetB']} </li>";
  $overclocked = "<li>Overclocked : {$_POST['overclocked']} </li>";
  $BUS = "<li>BUS : {$_POST['BUS']} </li>";  
  $MVideo = "<li>Mémoire vidéo : {$_POST['MVideo']} </li>";
  $FMVideo = "<li>Fréquence Mémoire vidéo : {$_POST['FMVideo']} </li>";
  $TMem = "<li>Type de mémoire : {$_POST['TMemoire']} </li>";
  $DirectX = "<li>DirectX : {$_POST['DirectX']} </li>";
  $MultiGPU = "<li>MultiGPU : {$_POST['MultiGPU']} </li>";
  $HDR = "<li>HDR : {$_POST['HDR']} </li>";
  $q4k = "<li>4k prise en charge : {$_POST['4k']} </li>";
  $vr = "<li>Virtual Réality prise en charge : {$_POST['VR']} </li>";
  $sortiv = explode ("&", $_POST['desc']);
  $a = "";
  foreach ($sortiv as $un) {
    $a = "<li>{$un}</li>{$a}";
  }
  $outVid = "<li>Sortie vidéo :<ul>{$a}</ul></li>";
  $save[$type][$num]['Sortie vidéo'] = $sortiv;
  unset($save[$type][$num]['desc']);
  $nbecran = "<li>Nombre d'écrans max : {$_POST['EcMax']}</li>";
  $DVI_Dual_Link = "<li>DVI Dual Link : {$_POST['DVIDL']}</li>";
  $Coal = explode ("&", $_POST['CoAl']);
  $b = "";
  foreach ($Coal as $de) {
    $b = "<li>{$de}</li>{$b}";
  }
  $Commalim = "<li>Connecteurs d'alimentation : <ul>{$b}</ul></li>";
  $save[$type][$num]['CoAl'] = $Coal;
  $TypeR = "<li>Type de refroidiseement : {$_POST['TypeR']}</li>";
  $Conso = "<li>Consommation (en W) : {$_POST['Conso']}</li>";
  $slotPCI = "<li>Nombre de slot PCI : {$_POST['slotPCI']}</li>";
  $LED = "<li>LED : {$_POST['LED']}</li>";
  $LEDRGB = "<li>LED RGB : {$_POST['LEDRGB']}</li>";
  $longueur = "<li>Longueur :{$_POST['longueur']}</li>";
  $largeur = "<li>Largeur :{$_POST['largeur']}</li>";
  $desk = "<ul>" . $marque . $chipGraph . $marquesGPU . $fChip . $fChipB . $overclocked . $BUS . $MVideo . $TMem . $DirectX . $MultiGPU . $HDR . $q4k . $vr . $outVid . $nbecran . $DVI_Dual_Link . $Commalim . $TypeR . $Conso . $slotPCI . $LED . $LEDRGB . $longueur . $largeur . "</ul>";
}elseif($typeid == 2) {
  $FMem = explode ("&", $_POST['FreqM']);
  $a = "";
  foreach ($FMem as $un) {
    $a = "<li>{$un}</li>" . $a;
  }
  $save[$type][$num]['FreqM'] = $FMem;
  $FMem = "<li>Fréquence mémoire :<ul>{$a}</ul></li>";
  $CoGra = explode ("&", $_POST['CoGra']);
  $b = "";
  foreach ($CoGra as $un) {
    $b = "<li>{$un}</li>" . $b;
  }
  $save[$type][$num]['CoGra'] = $CoGra;
  $CoGra = "<li>Connecteur(s) graphique ( & ) :<ul>{$b}</ul></li>";
  $CoDisc = explode ("&", $_POST['CoDisc']);
  $c = "";
  foreach ($CoDisc as $un) {
    $c = "<li>{$un}</li>" . $c;
  }
  $save[$type][$num]['CoDisc'] = $CoDisc;
  $CoDisc = "<li>Connecteurs Disques ( & ) :<ul>{$c}</ul></li>";
  $CoPaAr = explode ("&", $_POST['CoPaAr']);
  $d = "";
  foreach ($CoPaAr as $un) {
    $d = "<li>{$un}</li>" . $d;
  }
  $save[$type][$num]['CoPaAr'] = $CoPaAr;
  $CoPaAr = "<li>Connecteurs panneau arrière ( & ) :<ul>{$d}</ul></li>";
  $CoAd = explode ("&", $_POST['CoAd']);
  $e = "";
  foreach ($CoAd as $un) {
    $e = "<li>{$un}</li>" . $e;
  }
  $save[$type][$num]['CoAd'] = $CoAd;
  $CoAd = "<li>Connecteurs additionnels ( & ) :<ul>{$e}</ul></li>";
  $PortsUSB = explode ("&", $_POST['PortsUSB']);
  $f = "";
  foreach ($PortsUSB as $un) {
    $f = "<li>{$un}</li>" . $f;
  }
  $save[$type][$num]['PortsUSB'] = $PortsUSB;
  $PortsUSB = "<li>Ports USB ( & ) :<ul>{$f}</ul></li>";
  $marque = "<li>Marque : {$_POST['marques']} </li>";
  $chipset = "<li>Chipset CPU : {$_POST['chipset']} </li>";
  $socket = "<li>Socket : {$_POST['socket']} </li>";
  $TMem = "<li>Type de Mémoire : {$_POST['TMemoire']} </li>";
  $CapaMaxSlot = "<li>Capacité Max Par Slot : {$_POST['CapaMaxSlot']} </li>";
  $CapaMaxRAM = "<li>Capacité maximale de RAM : {$_POST['CapaMaxRAM']} </li>";
  $NbCaAudio = "<li>Nombre de canaux audio : {$_POST['NbCaAudio']} </li>";
  $NbCoVenti = "<li>Nombre de connecteurs pour ventilateurs : {$_POST['NbCoVenti']} </li>";
  $LED = "<li>LED : {$_POST['LED']} </li>";
  $longueur = "<li>Longueur : {$_POST['longueur']} </li>";
  $largeur = "<li>Largeur : {$_POST['largeur']} </li>";
  
  $desk = "<ul>" . $marque . $chipset . $socket . $FMem . $TMem . $CapaMaxSlot . $CapaMaxRAM . $CoGra . $NbCaAudio . $CoDisc . $NbCoVenti . $CoPaAr . $CoAd . $PortsUSB .$LED .$longueur .$largeur . "</ul>";
}elseif($typeid == 3) {
  $marque = "<li>Marques : {$_POST['marques']} </li>";
  $Interface = "<li>Interface avec l'ordinateur : {$_POST['Interface']} </li>";
  $Format = "<li>Format (en pouces) : {$_POST['Format']} </li>";
  $Capacité = "<li>Capacité (en Go) : {$_POST['Capacité']} </li>";
  $VRota = "<li>Vitesse de rotation : {$_POST['VRota']} </li>";
  $TCache = "<li>Taille du cache (en Mo) : {$_POST['TCache']} </li>";
  $TypeDisque = "<li>Type de Disque : {$_POST['TypeDisque']} </li>";
  $desk = "<ul>" . $marque . $Interface . $Format . $Capacité . $VRota . $TCache . $TypeDisque . "</ul>";
}elseif($typeid == 4) {
  $marque = "<li>Marques : {$_POST['marques']} </li>";
  $TMemoire = "<li>Type de Mémoire : {$_POST['TMemoire']} </li>";
  $Capa = "<li>Capacité (en Go) : {$_POST['Capa']} </li>";
  $CapaBar = "<li>Capacité par barrette  : {$_POST['CapaBar']} </li>";
  $FreqMem = "<li>Fréquence Mémoire (en MHz) : {$_POST['FreqMem']} </li>";
  $NbBar = "<li>Nombre de barrette(s) : {$_POST['NbBar']} </li>";
  $LED = "<li>LED : {$_POST['LED']} </li>";
  $LEDRGB = "<li>LED RGB : {$_POST['LEDRGB']} </li>";
  $Radiateur = "<li>Radiateur : {$_POST['Radiateur']} </li>";
  $CouleurRad = "<li>Couleur Radiateur : {$_POST['CouleurRad']} </li>";
  $VentFournis = "<li>Ventilateur fourni : {$_POST['VentFournis']} </li>";
  $Tension = "<li>Tension (en Volts) : {$_POST['Tension']} </li>";

  
  $desk = "<ul>" . $marque . $TMemoire . $Capa . $CapaBar . $FreqMem . $NbBar . $LED . $LEDRGB . $Radiateur . $CouleurRad . $VentFournis . $Tension . "</ul>";
}elseif($typeid == 6) {
  $marque = "<li>Marque : {$_POST['marques']} </li>";
  $Puissance = "<li>Puissance (en W) : {$_POST['Puissance']} </li>";
  $CertifGoldPlus = "<li>Certification Gold Plus : {$_POST['CertifGoldPlus']} </li>";
  $Modulaire = "<li>Modulaire : {$_POST['Modulaire']} </li>";
  $Modularité = "<li>Modularité : {$_POST['Modularité']} </li>";

  $CoAl = explode ("&", $_POST['CoAl']);
  $a = "";
  foreach ($CoAl as $un) {
    $a = "<li>{$un}</li>{$a}";
  }
  $save[$type][$num]['CoAl'] = $CoAl;
  $CoAl = "<ul>Connecteur(s) alimentation ( & ) :{$a}</ul>";

  $diametreVent = "<li>Diamètre Ventilateur (en mm) : {$_POST['diametreVent']} </li>";
  $Silencieux = "<li>Silencieux : {$_POST['Silencieux']} </li>";

  $Formalim = explode ("&", $_POST['Format-Alim']);
  $b = "";
  foreach ($Formalim as $un) {
    $b = "<li>{$un}</li>{$b}";
  }
  $save[$type][$num]['Format-Alim'] = $Formalim;
  $Format_Alim = "<li>Format alimentation :<ul>{$b}</ul></li>";

  $Normalim = explode ("&", $_POST['Normes-Alim']);
  $c = "";
  foreach ($Normalim as $un) {
    $c = "<li>{$un}</li>{$c}";
  }
  $save[$type][$num]['Normes-Alim'] = $Normalim;
  $Normes_Alim = "<li>Normes alimentation :<ul>{$c}</ul></li>";

  $MuGPU = explode ("&", $_POST['MultiGPU']);
  $d = "";
  foreach ($MuGPU as $un) {
    $d = "<li>{$un}</li>{$d}";
  }
  $save[$type][$num]['MultiGPU'] = $MuGPU;
  $MultiGPU = "<li>Multi GPU :<ul>{$d}</ul><li>";
  $Hauteur = "<li>Hauteur (en mm) : {$_POST['Hauteur']} </li>";
  $Largeur = "<li>Largeur (en mm) : {$_POST['Largeur']} </li>";
  $Longueur = "<li>Longueur (en mm) : {$_POST['Longueur']} </li>";
  $desk = "<ul>" . $marque . $Puissance . $CertifGoldPlus . $Modulaire . $Modularité . $CoAl . $diametreVent . $Silencieux . $Format_Alim . $Normes_Alim . $MultiGPU . $Hauteur . $Largeur . $Longueur . "</ul>";
}elseif($typeid == 7) {
  $marque = "<li>Marque : " . $_POST['marques'] . " </li>";
  $CompaCPU = explode ("&", $_POST['CompaCPU']);
  $a = "";
  foreach ($CompaCPU as $un) {
    $a = "<li>{$un}</li>" . $a;
  }
  $save[$type][$num]['CompaCPU'] = $CompaCPU;
  $CompaCPU = "<li>Compatibilité Processeur :<ul>{$a}</ul></li>";
  $Color = "<li>Couleur : {$_POST['Couleur']} </li>";
  $LED = "<li>LED : {$_POST['LED']} </li>";
  $Connecteurs = "<li>Connecteurs {$_POST['Connecteurs']} </li>";
  $VRegl = "<li>Vitesse Réglable : {$_POST['VRéglable']} </li>";
  $TDPMax = "<li>TDP Max Par min (W) : {$_POST['TDPMax']} </li>";
  $NivSonMin = "<li>Niveau Sonor Min (Db) : {$_POST['NivSonorMin']} </li>";
  $NivSonMax = "<li>Niveau Sonor Max (Db) : {$_POST['NivSonorMax']} </li>";
  $VRotaMax = "<li>Vitesse Rotation Max (en RPM) : {$_POST['VRotaMax']} </li>";
  $DAirMax = "<li>Débit Max (en CFM) : {$_POST['DAirMax']} </li>";
  $diametre = "<li>Diametre (en mm) : {$_POST['diametre']} </li>";
  $Materiaux = explode ("&", $_POST['Matériaux']);
  $b = "";
  foreach ($Materiaux as $un) {
    $b = "<li>{$un}</li>" . $b;
  }
  $save[$type][$num]['Matériaux'] = $Materiaux;
  $Materiaux = "<li>Compatibilité Processeur :<ul>{$b}</ul></li>";
  $Hauteur = "<li>Hauteur avec ventilateur (en mm) : {$_POST['Hauteur']} </li>";
  $Largeur = "<li>Largeur avec ventilateur (en mm) : {$_POST['Largeur']} </li>";
  $Profondeur = "<li>Profondeur avec ventilateur (en mm) : {$_POST['Profondeur']} </li>";
  $Poids = "<li>Poids (en g) : {$_POST['Poids']} </li>";
  $desk = "<ul>" . $marque . $CompaCPU . $Color . $LED . $Connecteurs . $VRegl . $TDPMax . $NivSonMin . $NivSonMax . $VRotaMax . $DAirMax . $diametre . $Materiaux . $Hauteur . $Largeur . $Profondeur . $Poids . "</ul>";
}elseif($typeid == 8) {
  $marque = "<li>Marque : {$_POST['marques']} </li>";
  $socket = "<li>Socket : {$_POST['socket']} </li>";
  $Color = "<li>Couleur : {$_POST['Couleur']} </li>";
  $LED = "<li>LED : {$_POST['LED']} </li>";
  $ColorLED = "<li>CouleuR LED : {$_POST['CouleurLED']} </li>";
  $CoAl = explode ("&", $_POST['CoAl']);
  $a = "";
  foreach ($CoAl as $un) {
    $a = "<li>{$un}</li>{$a}";
  }
  $save[$type][$num]['CoAl'] = $CoAl;
  $CoAl = "<ul>Connecteur(s) alimentation ( & ) :{$a}</ul>";
  $TDPMax = "<li>TDP Max Par min (W) : {$_POST['TDPMax']} </li>";
  $diametre = "<li>Diametre (en mm) : {$_POST['diametre']} </li>";
  $NivSonMax = "<li>Niveau Sonor Max (Db) : {$_POST['NivSonorMax']} </li>";
  $VRotaMin = "<li>Vitesse Rotation Min (en RPM) : {$_POST['VRotaMin']} </li>";
  $VRotaMax = "<li>Vitesse Rotation Max (en RPM) : {$_POST['VRotaMax']} </li>";
  $DAirMax = "<li>Débit Max (en CFM) : {$_POST['DAirMax']} </li>";
  $Materiaux = explode ("&", $_POST['Matériaux']);
  $b = "";
  foreach ($Materiaux as $un) {
    $b = "<li>{$un}</li>" . $b;
  }
  $save[$type][$num]['Matériaux'] = $Materiaux;
  $Materiaux = "<li>Compatibilité Processeur :<ul>{$a}</ul></li>";
  $Hauteur = "<li>Hauteur (en mm) : {$_POST['Hauteur']} </li>";
  $Largeur = "<li>Largeur (en mm) : {$_POST['Largeur']} </li>";
  $Profondeur = "<li>Profondeur avec ventilateur (en mm) : {$_POST['Profondeur']} </li>";

  $desk = "<ul>" . $marque . $socket . $Color . $LED . $ColorLED . $CoAl . $TDPMax . $diametre . $NivSonMax . $VRotaMin . $VRotaMax . $DAirMax . $Materiaux . $Hauteur . $Largeur . $Profondeur . "</li>";
}elseif($typeid == 9) {
  $marque = "<li>Marque : {$_POST['marques']} </li>";
  $Color = "<li>Couleur : {$_POST['Couleur']} </li>";
  $LED = "<li>LED : {$_POST['LED']} </li>";
  $LEDRGB = "<li>LED RGB : {$_POST['LEDRGB']} </li>";
  $CoAl = explode ("&", $_POST['CoAl']);
  $a = "";
  foreach ($CoAl as $un) {
    $a = "<li>{$un}</li>{$a}";
  }
  $save[$type][$num]['CoAl'] = $CoAl;
  $CoAl = "<ul>Connecteur(s) alimentation ( & ) :{$a}</ul>";
  $diametre = "<li>Diametre (en mm) : {$_POST['diametre']} </li>";
  $NivSonMax = "<li>Niveau Sonor Max (Db) : {$_POST['NivSonorMax']} </li>";
  $VRotaMax = "<li>Vitesse Rotation Max (en RPM) : {$_POST['VRotaMax']} </li>";
  $DAirMax = "<li>Débit Max (en CFM) : {$_POST['DAirMax']} </li>";
  $Materiaux = explode ("&", $_POST['Matériaux']);
  $b = "";
  foreach ($Materiaux as $un) {
    $b = "<li>{$un}</li>" . $b;
  }
  $save[$type][$num]['Matériaux'] = $Materiaux;
  $Materiaux = "<li>Compatibilité Processeur :<ul>{$a}</ul></li>";
  $desk = "<li>" . $marque . $Color . $LED . $LEDRGB . $CoAl . $diametre . $NivSonMax . $VRotaMax . $DAirMax . $Materiaux . "</li>";
}
$send = json_encode($save[$type][$num]);
$filename = 'json/' . $type . '.json';
$file = fopen($filename, 'a+');
fwrite($file,"\r\n");
fwrite($file,$send);
fclose($file);
echo "Prévisualisation :<br>accueil > Composant > {$type} <br><br>
<div class='Prévisualisation'>
  <table>
    <tr>
      <td>
        <img class='Composant' src='{$image}'>
      </td>
      <td>
        <h4>{$title}</h4>
        <h5 id='caractéristiques'>{$desk}<br><br><br><p id='prix'>{$prix} €</p></h5>
      </td>
    </tr>
  </table></div>";
?>
</body>
</html>