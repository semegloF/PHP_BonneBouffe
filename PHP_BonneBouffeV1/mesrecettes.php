<?php
include 'functions.php';

$selectAllFromRecettesM =mysqli_query($connect ,"SELECT * FROM recettes where idmembre = ".$_SESSION['idmembre']." ;")or die ("Erreur de selection");
$rCount =0;


function CountMesRecettes() {
    global $selectAllFromRecettesM;
    global $rCount;
    
     while ($row =mysqli_fetch_array($selectAllFromRecettesM)) {
        $rCount += 1;
     }
    return $rCount;
}



      
   


?>


<head>
        
        <title>Bonne Bouffe | Mes Recettes</title>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
        <link rel="stylesheet" type="text/css" href="./style/style.css"/>
    
        
</head>
    <body>
        
        
        
        
        
        
        
        
        
        
   
        
        
        
        
        
        
        
        
        
        
        
        
        
        <center>
            <hr size=1px width=200px color=#d1ccc0>
        <h1 id=verdana>Liste de mes recettes</h1>
           <hr size=1px width=200px color=#d1ccc0>
           
            <br>
            <br>
           
        
        </center>
        
         <center>
        <div id=abs>
         <h1><?php
                
               // Si la fonction CountMesRecettes 
                    if (CountMesRecettes()>1){
                        echo "Vous avez actuellement <span id=mark>".CountMesRecettes()."</span> recettes.";
                    } elseif(CountMesRecettes()==0){
                        echo "Vous n'avez actuellement aucune recette.";
                    }else{
                        echo "Vous avez actuellement <span id=mark>".CountMesRecettes()."</span> recette.";
                    }
                     
                     echo "<br><br> ";
                     echo "<a id=link href='inscriptionrecette.php'>∎ Ajouter une recette</a>";
                     echo "<br><br> ";
                     echo "<a id=link href='recettes.php'>∎ Aficher toutes les recettes</a>";
                 
                     
                
                ?></h1>
        </div>
            </center>
        
        
        <table class="greyGridTable">
           <tr><th>Nom</th><th>Ingredients</th><th>Coût</th><th>Photo</th></tr>
           <?php 
           
$selectAllFromRecettesM =mysqli_query($connect ,"SELECT * FROM recettes where idmembre = ".$_SESSION['idmembre'].";")or die ("Erreur de selection");
                
           $num = 0;  
                
                
    //remplissage des arrays avec les informations concernant les recettes dans la base de données
                
    while ($rowR =mysqli_fetch_array($selectAllFromRecettesM)) {
       
        
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
                
                
              if (!isset($_POST['nextpage'])){
                  
                 
                  
              for ($num = 0; $num < 10; $num++) {
                  
                 
                  
                  if(@$idR[$num]!==null){
                       $deleteRecette = "delete".$idR[$num];
                      $updateRecette = "update".$idR[$num];
             echo "
             <form method='post'>
             
             <tr>
             
        <td><span id=verdana>". @$idR[$num] . " - " .  @$nomR[$num]."</span></td>
        <td>".@$ingredientsR[$num]."</td>
        <td><b>".@$coutR[$num]." $</b></td> 
        <td><img height=200 width=150 src='./images/".@$photoR[$num]."'></td>
        <td><input id=plus type='submit' name='$deleteRecette' value='x'></td>
        <td><input id=updateR type='submit' name='$updateRecette' value='+'></td>
        
   
         
                  </tr>
                  
                  </form>
                  ";
                     
  // Si le bouton delete est triggered
                      
         if(isset($_POST[$deleteRecette])){

   

 $delete= mysqli_query($connect,"DELETE from recettes where idrecette = $idR[$num] ;") or die
	("Erreur de delete");
             
echo "<script>document.location.reload(true)</script>"; 


}
                      
// Si le bouton UPDATE est triggered 
                      
   if(isset($_POST[$updateRecette])){
       
   $_SESSION['idRec'] = $idR[$num];
 echo "


             <form method='post'>
             
             <tr>
             
        <td><span id=verdana><input type='text' name='nomUpdate' value=".  @$nomR[$num]."></span></td>
        <td><textarea type='text' name='ingredientsUpdate' >".@$ingredientsR[$num]."</textarea></td>
        <td><b><input id=numberInput type='number' name='coutUpdate' value=".@$coutR[$num]."> $</b></td> 
        <td></td>
        <td></td>
       
        <td><input type='submit' id='okUpdate' name='okUpdate' value='OK'></td>
        
   
         
                  </tr>
                  
                  </form>";
       
       
       
       
       
}
                      
                   
                     
                      
              }
              }
                 
                  
     // plus de 10 recettes par page             
       } else {
                  
                  
                    for ($num = $maxRecettes; $num < ($maxRecettes+10) ; $num++) {
                     
                        if(@$idR[$num]!==null){
             echo "<form method='post'>
             
             <tr>
             
        <td><span id=verdana>". @$idR[$num] . " - " .  @$nomR[$num]."</span></td>
        <td>".@$ingredientsR[$num]."</td>
        <td><b>".@$coutR[$num]." $</b></td> 
        <td><img height=200 width=150 src='./images/".@$photoR[$num]."'></td>
        <td><input id=plus type='submit' name='delete' value='x'></td>
        
         
                  </tr>
                  
                  </form>";
                            
   
  
                            }
        } //end for
                  
} //end else
        
    
       if(isset($_POST['okUpdate'])){
           
            
                          $updateRecette = mysqli_query($connect,"UPDATE recettes SET nom = '".$_POST['nomUpdate']."', ingredients = '".$_POST['ingredientsUpdate']."', cout = ".$_POST['coutUpdate']." where idrecette = ".$_SESSION['idRec']." ;") or die ("Erreur de update");
              
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
      
        
        
        
    </body>





<body>
<script src="jquery-3.4.1.min.js"></script>
<script src="script.js"></script>
</body>



