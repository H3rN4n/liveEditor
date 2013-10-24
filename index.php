<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Live Editor</title>
	<style type="text/css">
	#pageContainer{
		position: relative;
		width: 100%;
		margin-top: 0px;
		background: blue;
		margin: 0;
		padding: 0;
	}
	.editZone{
		position: relative;
		width: 100%;
		height: 280px;
		border-bottom: 5px solid blue;
		margin: 0;
		padding: 0;
		transition: 2s;
	}
	.editZone.inactive{
		width: 100%;
		margin-top: -290px;
	}
	#close{
		position: relative;
		width: 100%;
		height: 20px;
		background: silver;
	}
	</style>
</head>
<body>
	<div class="editZone inactive">
			<div id="close">
				<div id="themeSelectorContainer">
					<select id="themeSelector">
						<?php
						$directorio = opendir("templates"); //ruta actual
						while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
						{
						    if (is_dir($archivo))//verificamos si es o no un directorio
						    {
						        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
						    }
						    else
						    {
						        echo "<option>".$archivo . "</option>";
						    }
						}
						?>
					</select>
				</div>
			</div>
			<div id="mceZone"></div>
	</div>
	<div id="pageContainer">

	</div>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="js/liveEdit.js"></script>
</body>
</html>