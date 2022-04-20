<table width="100%"  border="1px">
<tr> 
	<td width="50%" align="center">
		<img src="photos/sushi.jpg" style="height:400px;width:650px">
	</td>
	<!-- Formulaire de Login -->
	<td valign="top"> 
		<h3>Branchez-vous membre! </h3>
		<form method="post">
			<table>
				<tr><td>Login</td> <td><input type="text" name="loginmembre" value=""></td> </tr>
				<tr><td>Password</td> <td><input type="password" name="passwordmembre" value=""></td></tr>
				<tr><td><input type="submit" name="membre" value="Entrer"> </td>
				<td><a href="index.php?lien=nonmembre">Non Membre </a></td> </tr>
			</table>
		</form>
		
		<h3>ADMIN </h3>
		<form method="post">
			<table>
				<tr><td>Login</td> <td><input type="text" name="loginadmin" value=""></td> </tr>
				<tr><td>Password</td> <td><input type="password" name="passwordadmin" value=""></td></tr>
				<tr><td><input type="submit" name="admin" value="Entrer"> </td> </tr>
			</table>
		</form>
		<!-- DEBUT:::Section PHP-->
		<?php
			//1)recuperation des donnees par $_POST du membre
			if(isset($_POST["membre"]))
			{
				$loginmembre=$_POST["loginmembre"];
				$passwordmembre=$_POST["passwordmembre"];
				
				//2)Connexion avec la base de donnees "bonnebouffe"
				$connect=mysqli_connect('localhost','root','','bonnebouffe') 
				or die("Erreur de connexion avec la BD!");
				//3) Requete SQL avec PHP-mysql
				$requete=mysqli_query($connect,"select * from membres where login='$loginmembre'
				and password='$passwordmembre'") or die("Erreur de requete SQL!");
				//4) Analyse et affichage des resultats de la requete
				$nbre=mysqli_num_rows($requete);
				if($nbre >0)
				{
					//Redirection vers la page MEMBRE
					//header() fonction PHP
					echo"<script> window.location.href='membre/indexmembre.php';  </script>";
				}
				else
				{
					echo"Login et/ou password du membre incorrects!";
				}
			}
			
			//1)recuperation des donnees par $_POST de l'admin
			if(isset($_POST["admin"]))
			{
				$loginadmin=$_POST["loginadmin"];
				$passwordadmin=$_POST["passwordadmin"];
				
				//2)Connexion avec la base de donnees "bonnebouffe"
				$connect=mysqli_connect('localhost','root','','bonnebouffe') 
				or die("Erreur de connexion avec la BD!");
				//3) Requete SQL avec PHP-mysql
				$requete=mysqli_query($connect,"select * from admin where login='$loginadmin'
				and password='$passwordadmin'") or die("Erreur de requete SQL!");
				//4) Analyse et affichage des resultats de la requete
				$nbre=mysqli_num_rows($requete);
				if($nbre >0)
				{
					//Redirection vers la page admin
					//header() fonction PHP
					echo"<script> window.location.href='admin/indexadmin.php';  </script>";
				}
				else
				{
					echo"Login et/ou password de l'admin incorrects!";
				}
			}
		?>
		<!-- FIN:::Section PHP-->
	</td>
</tr>

</table>

