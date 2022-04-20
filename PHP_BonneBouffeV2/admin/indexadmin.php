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
				<li><a href='indexadmin.php?lien=accueil'>Accueil </a> </li>
				<li><a href='indexadmin.php?lien=ajout'>Ajout</a></li>
				<li><a href='indexadmin.php?lien=update'>Update</a></li>
				<li><a href='indexadmin.php?lien=delete'>Delete</a></li>
				<li><a href='indexadmin.php?lien=deconnexion'>Deconnexion</a></li>
			</ol>
			<form method="post" action="indexadmin.php?lien=recherche">
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
				case"ajout":
					include("ajout.php");
				break;
				case"update":
					include("update.php");
				break;
				case"delete":
					include("delete.php");
				break;
				case"deconnexion":
					echo"<script> window.location.href='../index.php'</script>";
				break;
				case"recherche":
					include("recherche.php");
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