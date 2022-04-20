<html>
   <head>
      <title>Site de Bonnebouffe </title>
	  <style>
			li{
				display:inline;
				margin-right:100px;
			}
	  </style>
	  
	</head>
	
	<body>
	<center>
		<!--Section entete -->
		<div style="width:80%;height:30%;border:1px solid black;"> 
		</div>
		<!--Section menu -->
		<div style="width:80%;height:15%;border:1px solid black;"> 
			<ol>
				<li><a href='indexmembre.php?lien=accueil'>Accueil </a> </li>
				<li><a href='indexmembre.php?lien=recette'>Recettes</a></li>
				<li><a href='indexmembre.php?lien=update'>Update</a></li>
			
				<li><a href='indexmembre.php?lien=deconnexion'>Deconnexion</a></li>
			</ol>
			<form method="post" action="indexmembre.php?lien=recherche">
				<input type="text" name="search" value="">
				<input type="submit" name="recherche" value="Recherche...">
			</form>
		</div>
		<!--Section details -->
		<div style="width:80%;">
		<!--Section PHP -->
		<?php
		//Verifier si le lien est clique
		if(isset($_GET["lien"]))
		{
			$lien=$_GET["lien"];
			//Selon la valeur du lien recupere
			switch($lien)
			{
				case"accueil":
					include("accueil.php");
				break;
				case"recette":
					include("recettes.php");
				break;
				case"update":
					include("update.php");
				break;
		
				case"deconnexion":
					echo"<script> window.location.href='../index.php'</script>";
				break;
				case"recherche":
					include("../admin/recherche.php");
				break;
			
			}
		}
		else
		{
			include("accueil.php");
		}
		
		?>
		</div>
	</center>
	</body>
</html>