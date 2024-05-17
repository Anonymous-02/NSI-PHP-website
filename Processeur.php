<script type="text/javascript">
	function goto(url) {
		location.href = 'Processeur-display.php?item=' + url;
	}
</script>
<?php
require 'menu.html';
$num = 0;
$file = fopen('json/Processeur.json','r+');
echo "<div class='conteneur' class='listecomposants'>";
while(!feof($file)){
	$ligne = fgets($file);
	$comp = json_decode($ligne,true);
	echo "<div class='composants' onclick='goto({$num})'>
				<img id='image'src='{$comp['image-url']}'><br><br>
				<span id='titre-composant'>{$comp['titre']}</span>
				<span class='float-right'>{$comp['prix']} €</span></br></br></br>
			</div>";
	$num += 1;
}
?>
		</div>
	</body>
</html>