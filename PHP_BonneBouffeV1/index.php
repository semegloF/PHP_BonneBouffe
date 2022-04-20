<?php
include 'functions.php';





?>


<head>
        
        <title>Bonne Bouffe | Accueil</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="./style/style.css"/>
        
</head>
    <body>
        
      
        
        <center>
        <h1> 
            Bienvenue 
            <span id=markA><?php 
                 if(@$_SESSION["loginA"]!== null && @$_SESSION["prenom"]!== null){
                     echo "[";
                 } 
                echo strtoupper(@$_SESSION["loginA"]);
                
                    if(@$_SESSION["loginA"]!== null && @$_SESSION["prenom"]!== null){
                     echo "]";
                 } 
                ?></span>
            <span id=mark><?php echo @$_SESSION["prenom"]?> <?php echo @$_SESSION["nom"]?></span> 
            
            !
        </h1>
            <br>
            <form method="post">
            <input id=disconnect type="submit" name="disconnect" value="<?php
    
    // If member is logged show disconnect, otherwise show login
    
    if(@$_SESSION["prenom"] == null && @$_SESSION["loginA"] == null){
        echo "Connectez-vous" ; }
                elseif(@$_SESSION["prenom"] !== null && @$_SESSION["loginA"] == null) {
                    echo "Déconnexion de ";
                    echo $_SESSION['prenom'];
                    echo " ";
                    echo $_SESSION['nom'];
                } elseif(@$_SESSION["prenom"] == null && @$_SESSION["loginA"] !== null){
                    echo "Déconnexion de ";
                    echo strtoupper($_SESSION['loginA']);
                } else {
                    echo "Déconnexion de ";
                    echo "[".strtoupper($_SESSION['loginA'])."]";
                    echo " ";
                    echo $_SESSION['prenom'];
                    echo " ";
                    echo $_SESSION['nom'];
                    
                }
                
                                                                        
                                                                        ?>">
            </form>
        </center>
        
        
    </body>

