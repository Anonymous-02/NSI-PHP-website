<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="DicAuPC.css">
	<title></title>
	<script type="text/javascript">
		function back() {
			location.href = '';
		}
	</script>
</head>
<?php
$save = $_REQUEST['save'];
$type = $_REQUEST['type'];
$filename = $type . '.json';
$file = fopen($filename, 'a+');
fwrite($file,$save);
fclose($file);
?>
<script type="text/javascript">
	back();
</script>
<body>

</body>
</html>
