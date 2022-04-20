<head>
        
        <title>Bonne Bouffe | Inscrire une recette</title>
       <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <link rel='stylesheet' type='text/css' href='./style/style.css'/>
    
        
</head>
<body>
<?php
include 'functions.php';
 if(isNotLogged()){
    echo "
    
        
      <center>
          <h1 >Vous ne pouvez pas accéder à cette page si vous n'êtes pas connecté !</h1> <br>
        </center>";
     
    
}

 else {
     echo " 
        <div id=divAdmin>
      <form method='post'  enctype='multipart/form-data'>
          <h1 >Inscrivez une nouvelle recette</h1> <br>
        <table>
            
            <tr><td><span id=verdana>Nom de la recette</span></td><td><input id=verdana type='text' name='nomRc'></td></tr>
            <tr><td><span id=verdana>Ingrédients</span></td><td><textarea id=verdana rows='3' cols='40' type='text' name='ingredientsRc'></textarea></td></tr>
            <tr><td><span id=verdana>Préparation</span></td><td><textarea id=verdana rows='3' cols='40' type='text' name='preparationRc'></textarea></td></tr>
            <tr><td><span id=verdana>Nombre de personne</span></td><td><input id=verdana type='number' name='nombrePersonneRc'></td></tr>
            <tr><td><span id=verdana>Coût</span></td><td><input id=verdana type='number' name='coutRc'></td></tr>
            <tr><td><span id=verdana>Photo</span></td><td><input id=verdana type='file' name='photoRc'></tr>
            
            
            <tr>
            <td><center><input id=enter type='submit' name='inscrireR' value='Inscrire'></center></td>
            </tr>
        </table>
          
        </form>
        </div>
        
    
           ";
 }
  ?>
</body>





