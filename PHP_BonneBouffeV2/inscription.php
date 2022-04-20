<table width="100%"  border="1px">
<tr> 
	<td width="50%" align="center">
		<img src="photos/sushi.jpg" style="height:400px;width:650px">
	</td>
	<!-- Formulaire d'inscription de membre -->
	<td valign="top"> 
		<h3> Inscription de membre </h3>
		<form method="post">
			<table>
				<tr><td>Nom </td><td><input type="text" name="nom" value="" > </td> </tr>
				<tr><td>Prenom </td><td><input type="text" name="prenom" value="" > </td> </tr>
				<tr><td>Telephone</td><td><input type="text" name="telephone" value="" > </td> </tr>
				<tr><td>adresse </td><td><input type="text" name="adresse" value="" > </td> </tr>
				<tr><td>naissance</td><td><input type="date" name="naissance" value="" > </td> </tr>
				<tr><td>Login </td><td><input type="text" name="login" value="" > </td> </tr>
				<tr><td>Password</td><td><input type="password" name="password" value="" > </td> </tr>
				<tr><td><input type="submit" name="inscrire" value="Inscrire" > </td> </tr>
			
			</table>
		</form>
		<!-- DEBUT:::Section PHP-->
		<?php
			//1)Recuperation des donnees transmises par POST
			if(isset($_POST["inscrire"]))
			{
				$nom=$_POST["nom"];
				$prenom=$_POST["prenom"];
				$telephone=$_POST["telephone"];
				$adresse=$_POST["adresse"];
				$naissance=$_POST["naissance"];
				$login=$_POST["login"];
				$password=$_POST["password"];
				$idmembre=substr($nom,0,3).substr($prenom,0,2);
			//2) Connexion avec MYSQL et la BD
				include("connexion.php");
			//3) Requete SQL d'ajout de nouveau membre
				$insertion=mysqli_query($connect,"insert into membres values(
				'$idmembre','$nom','$prenom','$telephone','$adresse','$naissance',
				'$login','$password')") or die("Erreur de requete SQL!");
			//4) Analyse et affichage des resultats de la requete
				$nbre=mysqli_affected_rows($connect);
				if($nbre >0)
				{
					echo"Ajout de $nbre membre reussi!";
				}
				else
				{
					echo "Aucun ajout de membre!";
				}
			}
		?>
		<!-- FIN::: Section PHP-->
	</td>
</tr>

</table>

