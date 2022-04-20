<?php
include 'functions.php';




function CountMesRecettes() {
    global $selectAllFromRecettes;
    global $rCount;
    
     while ($row =mysqli_fetch_array($selectAllFromRecettes)) {
        $rCount += 1;
     }
    return $rCount;
}





     
   


?>


<head>
        
        <title>Bonne Bouffe | Recettes</title>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
        <link rel="stylesheet" type="text/css" href="./style/style.css"/>
        
</head>
    <body>
        
      
        
        <center>
            <hr size=1px width=200px color=#d1ccc0>
        <h1 id=verdana>Liste des recettes</h1>
           <hr size=1px width=200px color=#d1ccc0>
           
            <br>
            <br>
            
        </center>
        
         <center>
        <div id=abs>
         <h1><?php
                
                 if(isNotLogged()){
                     
                     echo "<img id=lock src='./images/lock.png'><br><br>";
            echo "Vous êtes limité à <span id=mark>3</span> recettes seulement. <br><br>";
                     echo "<a href='login.php'>Connectez-vous</a> pour en afficher d'autres !";
                 } else {
                     echo "Il existe actuellement <span id=mark>".County()."</span> recettes.";
                     echo "<br><br> ";
                     echo "<a id=link href='inscriptionrecette.php'>∎ Ajouter une recette</a>";
                     echo "<br><br> ";
                     echo "<a id=link href='mesrecettes.php'>∎ Aficher mes recettes</a>";
                 }
                     
                
                ?></h1>
        </div>
            </center>
        
        
        <table class="greyGridTable">
           <tr><th>Nom</th><th>Ingredients</th><th>Coût</th><th>Photo</th></tr>
           <?php 
           
            
            
            if(isNotLogged()){
            
                $max3 = 0;
                
    while ($rowR =mysqli_fetch_array($selectAllFromRecettes) and $max3 < 3) {
        
        
       
        
        $idR = $rowR[0];
        $nomR = $rowR[1];
        $ingredientsR = $rowR[2];
        $preparationR = $rowR[3];
        $nombrepersonneR = $rowR[4];
        $coutR = $rowR[5];
        $photoR = $rowR[6];
        $idmembreR = $rowR[7];
        
        $max3 += 1;
        
        
        
        echo "<tr>
        <td>$nomR</td>
        <td>$ingredientsR</td>
        <td>$coutR $</td> 
        <td><img height=200 width=150 src='./images/$photoR'></td>
        
        </tr>";
        
        }
                
     } else { //utilisateur reconnu
                
           $num = 0;  
                
                
    //remplissage des arrays avec les informations concernant les recettes dans la base de données
                
    while ($rowR =mysqli_fetch_array($selectAllFromRecettes)) {
       
        
        $idR[$num] = $rowR[0];
        $nomR[$num] = $rowR[1];
        $ingredientsR[$num] = $rowR[2];
        $preparationR[$num] = $rowR[3];
        $nombrepersonneR[$num] = $rowR[4];
        $coutR[$num] = $rowR[5];
        $photoR[$num] = $rowR[6];
        $idmembreR[$num] = $rowR[7];
       
       
        $num += 1;
        
    }
                
              $maxRecettes = 10;
                
                // Si le bouton n'est pas appuiyé
                
              if (!isset($_POST['nextpage'])){ 
                  
                 
                  
              for ($num = 0; $num < $maxRecettes; $num++) {
                  
                  if (@$idR[$num]!==null){
                      echo "
             <form method='post'>
             
             <tr>
             
        <td><span id=verdana>". $idR[$num] . " - " .  $nomR[$num]."</span></td>
        <td>".$ingredientsR[$num]."</td>
        <td><b>".$coutR[$num]." $</b></td> 
        <td><img height=200 width=150 src='./images/".$photoR[$num]."'></td>
       
         
                  </tr>
                  
                  </form>";
                  }
             
                     
if(isset($_POST[$num])){
   echo $idR[$num];
}      
        
                      
              }
                  
       } else {
                  
                  
                    for ($num = $maxRecettes; $num < ($maxRecettes+10) ; $num++) {
                     
                        if(@$idR[$num]!==null){  
             echo "<form method='post'>
             
             <tr>
             
        <td><span id=verdana>". @$idR[$num] . " - " .  @$nomR[$num]."</span></td>
        <td>".@$ingredientsR[$num]."</td>
        <td><b>".@$coutR[$num]." $</b></td> 
        <td><img height=200 width=150 src='./images/".@$photoR[$num]."'></td>
        
         
                  </tr>
                  
                  </form>";
                                 
  
                            }
        } //end for
                  
} //end else
        
            
    }
            
            
            

                
        // Compter les recettes
            
   if(CountMesRecettes() > 10){
            echo " <form method='post'>
            <input id=next type='submit' name='nextpage' value='>'>                                                 
            </form>
         <form method='post'>
            <input id=back type='submit' name='previouspage' value='<'>                                                 
            </form>";
        }                     

                 
       
        
        
        
            
            
            
            
            ?>
        </table>
       
       
        
        
        <script src="jquery-3.4.1.min.js"></script>
        <script src="script.js"></script>
        
    </body>

