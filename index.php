<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Live Editor</title>
	<style type="text/css">
	body{
		margin: 0;
		padding: 0;
	}
	#pageContainer{
		position: relative;
		width: 70%;
		margin-top: 0px;
		background: blue;
		margin: 0;
		padding: 0;
		float: right;
	}
	.editZone{
		position: fixed;
		left: 0;
		top: 0;
		width: 30%;
		height: 100%;
		border-bottom: 5px solid blue;
		margin: 0;
		padding: 0;
		transition: width 2s;
		float: left;
	}
	.editZone.inactive{
		width: 100%;
		width: 0px;
	}
	#close{
		position: relative;
		width: 100%;
		height: 20px;
		background: silver;
	}

	#imgUrl{
		width: 95%;
		padding: 5px;
		text-align: left;
	}

	/*DARKEN*/
	#pageContainer img {
	  -webkit-filter: brightness(100%);
	  -webkit-transition: all 1s ease;
	     -moz-transition: all 1s ease;
	       -o-transition: all 1s ease;
	      -ms-transition: all 1s ease;
	          transition: all 1s ease;
	}
	 
	#pageContainer img:hover {
	  -webkit-filter: brightness(90%);
	}

	#pageContainer div {
	  -webkit-transition: all 1s ease;
	     -moz-transition: all 1s ease;
	       -o-transition: all 1s ease;
	      -ms-transition: all 1s ease;
	          transition: all 1s ease;
	}
	 
	#pageContainer div:hover {
	  background-color: rgba(0,0,0,0.1);
	}

	</style>
</head>
<body>
	<div class="editZone inactive">
			<div id="close">
				<div id="themeSelectorContainer">
					<select id="themeSelector">
						<option>Select One</option>
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
			<div id="imageEditZone">
				<input type="text" value="" id="imgUrl">
				<br/>
				<div id="imgW">
					Width: <span></span>
				</div>
				<br/>
				<div id="imgH">
					Height: <span></span>
				</div>
				<br/>
				<div id="SampleImg">
					<input type="button" value="SampleImg" id="putSample">
				</div>
			</div>
	</div>
	<div id="pageContainer">

	</div>
	
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="js/liveEdit.js"></script>
</body>
</html>