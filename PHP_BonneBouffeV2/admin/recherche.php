<?php
//1) recuperation du nom recherche
if(isset($_POST["recherche"]))
{
	$search=$_POST["search"];
	
//2) connexion avec MYSQL
	include("../connexion.php");
//3)Requete SQL de selection de recette
	$selection=mysqli_query($connect,"select * from recettes where nom='$search'");
//3)Analyse et affichage des resultats de la requete
	$nbre=mysqli_num_rows($selection);
	if($nbre >0)
	{
		
		echo"<h3>Liste des recettes </h3>
				<table border='1'> 
					
					<th> Nom </th> <th>Ingredients </th>
					<th>Photo </th> <th>Date inscrite </th>";
		while($resultat=mysqli_fetch_row($selection))
		{
			echo "<tr><td>$resultat[1]</td>
			<td>$resultat[2]</td><td><img src='../photos/$resultat[3]' style='width:150px;height:150px'></td>
			<td>$resultat[4]</td></tr> ";
		}
		echo"</table>";
	}
	else
	{
		echo "Aucune recette trouvee dans la base de donnees!";
	}

}
?>