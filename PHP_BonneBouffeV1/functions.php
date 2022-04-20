<?php
session_start();

// Random string generator function

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//date d'aujourd'hui avec les minutes et secondes

function todaysDate() {
   return date("Ymd") . "-" . date("his");
}


// Variables for connection

$localhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bonnebouffe';
$connect = mysqli_connect($localhost, $username, $password, $dbname) or die ("Erreur de connexion");

// Login 

if (isset ($_POST["enter"]))
{
	$login =$_POST["login"];
	$password =$_POST["password"];
    
//select tout les membre qui ont le login et password écrit par l'utilisateur
    
	$select = mysqli_query($connect,"select * from membres where login = '$login' and password = '$password'") or die
	("Erreur de selection");
    
//insérer le résultat du select dans la variable $ligne
    
    
    $row = mysqli_fetch_row($select);
    
 // Si le mot de passe et/ou l'identifiant est incorrect
    
        if(@$row == null){
        echo "<center id='mdperror'>Identifiant et/ou mot de passe incorrect !</center>";
    } else {
            $_SESSION["idmembre"] = $row[0];
        $_SESSION["prenom"] = $row[1];
        $_SESSION["nom"] = $row[2];
            $_SESSION["login"]= $row[6];
            $_SESSION["password"] = $row[7];
        
        
        echo '<script>window.location.href = "index.php"</script>';
       
    }
        
}

// Si le client clique sur le bouton déconnexion

if (isset($_POST["disconnect"])){
    session_destroy();
    
     echo '<script>window.location.href = "login.php"</script>';
    
}


  
if (isset ($_POST["enterA"]))
{
	$loginA =$_POST["loginA"];
	$passwordA =$_POST["passwordA"];
    
//select tout les membre qui ont le login et password écrit par l'utilisateur
    
	$select = mysqli_query($connect,"select * from admin where login = '$loginA' and password = '$passwordA'") or die
	("Erreur de selection");
    
//insérer le résultat du select dans la variable $ligne
    
    
    $row = mysqli_fetch_row($select);
    
 // Si le mot de passe et/ou l'identifiant est incorrect
    
        if(@$row == null){
        echo "<center id='mdperror'>Identifiant et/ou mot de passe incorrect !</center>";
    } else {
        $_SESSION["loginA"] = $row[0];
        
        
        
        echo '<script>window.location.href = "index.php"</script>';
       
    }
        
}



// Inscrire 

    
if (isset ($_POST["inscrire"]))
{
	$nomI =$_POST["nomI"];
	$prenomI =$_POST["prenomI"];
	$telephoneI =$_POST["telephoneI"];
	$adresseI =$_POST["adresseI"];
	$dateI =$_POST["dateI"];
	$loginI =$_POST["loginI"];
	$passwordI =$_POST["passwordI"];
    
  
    if ($prenomI == null){
        
        echo "<center id='mdperror'>Le <b><i>Prénom</i></b> doit être rempli !</center>";
        
        }
    elseif($nomI == null){
         echo "<center id='mdperror'>Le <b><i>Nom</i></b> doit être rempli !</center>";
        }
    elseif($telephoneI == null){
         echo "<center id='mdperror'>Le <b><i>Téléphone</i></b> doit être rempli !</center>";
        }
    elseif($adresseI == null){
         echo "<center id='mdperror'>L'<b><i>Adresse</i></b> doit être remplie !</center>";
        }
    elseif($dateI == null){
         echo "<center id='mdperror'>La <b><i>Date</i></b> doit être remplie !</center>";
        }
    elseif($loginI == null){
         echo "<center id='mdperror'>Le <b><i>Login</i></b> doit être rempli !</center>";
        }
    elseif($passwordI == null){
         echo "<center id='mdperror'>Le <b><i>Password</i></b> doit être rempli !</center>";
    }
    elseif(strlen($passwordI) < 8) {
         echo "<center id='mdperror'>Le <b><i>Password</i></b> doit contenir au moins 8 caractères !</center>";
    }  
     elseif(strlen($telephoneI) < 10) {
         echo "<center id='mdperror'>Le numéro de <b><i>Téléphone</i></b> n'est pas valide !</center>";
    }  
         else {
        
// Inscription des membres
    
	$insert = mysqli_query($connect,"INSERT INTO membres (prenom, nom, telephone, adresse, datedenaissance, login, password)
VALUES ('$nomI','$prenomI','$telephoneI','$adresseI','$dateI','$loginI','$passwordI');") or die
	("Erreur d'insertion'");
echo "<center id='reussi'> Inscription de ".$prenomI." ".$nomI." réussie</center>";
    }  
    
}; //fermeture de ISSET inscrire

 $selectAllFromRecettes =mysqli_query($connect ,"SELECT * FROM recettes;")or die ("Erreur de selection");
$selectAllFromRecettesC =mysqli_query($connect ,"SELECT * FROM recettes;")or die ("Erreur de selection");






   //changer le mot de passe d'un compte

if (isset ($_POST["confirmPasswordChange"]))
{
   
    if ($_POST["oldPassword"] == $_SESSION["password"]){
        
        if ($_POST["newPassword"] !== $_POST["confirmNewPassword"]){
            
            echo "<center id='mdperror'> Le mot de passe à confirmer ne ressemble pas au nouveau mot de passe !</center>";
       
   } else {
            $update= mysqli_query($connect,"UPDATE membres SET password = '".$_POST["newPassword"]."' where prenom = '".$_SESSION["prenom"]."';") or die
	("Erreur de update");
        
        
echo "<center id='reussi'> Mot de passe de ".$_SESSION["prenom"]." ".$_SESSION["nom"]." a été modifié avec succès</center>";
        
        $_SESSION["password"] = $_POST["newPassword"];
        
      
        }
        
    } else {
        echo "<center id='mdperror'> Mot de passe actuel incorrect</center>";
    }
    
   
    
}
// changer de login

if (isset ($_POST["confirmLoginChange"]))
{
    
   
    if ($_POST["newLogin"] == $_SESSION["login"]){
        echo "<center id='mdperror'> Le nouveau login ressemble à votre login actuel </center>";
    }elseif($_POST["newLogin"] !== trim($_POST["newLogin"])){ //le Login ne doit pas contenir des espaces
        echo "<center id='mdperror'> Les espaces ne sont pas tolérés dans le Login !</center>";
    }elseif($_POST["newLogin"] == null){ //le login ne peut pas être null
        echo "<center id='mdperror'> Merci d'entrer un login valide</center>";
    }elseif(strlen($_POST["newLogin"]) < 3 or strlen($_POST["newLogin"]) > 20){ //le login ne peut pas être supérieur à 3 ou inférieur à 20
        echo "<center id='mdperror'> Merci d'entrer un login entre 3 et 20 caractères !</center>";
    }
    else {
        $updatelogin= mysqli_query($connect,"UPDATE membres SET login = '".$_POST["newLogin"]."' where prenom = '".$_SESSION["prenom"]."';") or die
	("Erreur de update");
         $_SESSION["login"] = $_POST["newLogin"];
        echo "<center id='reussi'> Login de ".$_SESSION["prenom"]." ".$_SESSION["nom"]." a été modifié avec succès</center>";
    }
    
   
    
}


// Inscrire recette

    
if (isset ($_POST["inscrireR"]))
{
	$nomRc =$_POST["nomRc"];
	$ingredientsRc =$_POST["ingredientsRc"];
	$preparationRc =$_POST["preparationRc"];
	$nombrePersonneRc =$_POST["nombrePersonneRc"];
	$coutRc =$_POST["coutRc"];
	@$photoRc = $_POST["photoRc"];
    
    if($_FILES['photoRc']['error'] != UPLOAD_ERR_NO_FILE)
  {
        
         $photo = todaysDate().".jpg";
    
   
    $path = "./images/" . $photo;
        
   move_uploaded_file($_FILES['photoRc']['tmp_name'], $path);
        
    
        $photoRc = $photo;
        
    } 
    else { // Fonction faisant que si l'image n'existe pas upload une image par défaut !
         $photoRc = "/default.jpg";
    }
    
  
    if ($nomRc == null){
        
        echo "<center id='mdperror'>Le <b><i>Nom</i></b> doit être rempli !</center>";
        
        }
    elseif($ingredientsRc == null){
         echo "<center id='mdperror'>N'oubliez pas de remplir la section <b><i>ingrédients</i></b> !</center>";
        }
    elseif($preparationRc == null){
         echo "<center id='mdperror'>N'oubliez pas de remplir la section <b><i>préparation</i></b> !</center>";
        }
    elseif($nombrePersonneRc == null){
         echo "<center id='mdperror'>Le <b><i>nombre de personnes</i></b> ne peut pas être vide !</center>";
        }
    elseif($coutRc == null){
         echo "<center id='mdperror'>Le <b><i>coût</i></b> doit être rempli !</center>";
        }
    /* elseif($photoRc == null){
         echo "<center id='mdperror'>N'oubliez pas d'importer une <b><i>photo</i></b> de votre plat !</center>";
        } */
         else {
          $idmembre =   $_SESSION["idmembre"];
        
// Inscription des membres
    
	$insertRc = mysqli_query($connect,"INSERT INTO recettes (nom, ingredients, preparation, nombrepersonne, cout, photo, idmembre)
VALUES ('$nomRc','$ingredientsRc','$preparationRc','$nombrePersonneRc','$coutRc','$photoRc','$idmembre');") or die
	("Erreur d'insertion'");
echo "<center id='reussi'> Recette ajoutée avec succès !</center>";
    }  
    
} //fermeture de ISSET inscrire recette


//fonction qui compte tout les éléments de $row
function County() {
    global $selectAllFromRecettesC;
    global $rCount;
    
     while ($row =mysqli_fetch_array($selectAllFromRecettesC)) {
        $rCount += 1;
     }
    return $rCount;
}

// check si l'utilisateur est connecté

function isNotLogged(){
    if(@$_SESSION["loginA"] == null and @$_SESSION["prenom"] == null){
        return true;
} else {
        return false;
     } 
}




?>

<center><h1 id=floatright>Bonne Bouffe®</h1></center>


  <ul id=ul>

<li id=li><a href="./index.php">ACCUEIL</a></li>
<li id=li><a href="./login.php">LOGIN</a></li>
<li id=li><a href="./recettes.php">RECETTES</a></li>
<li id=li><a href="./contact.php">CONTACT</a></li>
<li id=li><a href="./references.php">RÉFÉRENCES</a></li>
      <?php if(isNotLogged()){
    
}
      else{
          echo "<li id=li><a href='./disconnect.php'>DÉCONNEXION</a></li>";
          }
      ?>

      



</ul>


<br><br>

