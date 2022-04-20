<?php
include 'functions.php';

?>


<head>
        
        <title>Bonne Bouffe | Login</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="./style/style.css"/>
        
</head>
    <body>
         <!-- Member Form --> 
    <div id=divMembre>
        <form method="post">
            <center>
                <?php
    
    // If member is logged show = vous êtes connecté en tant que : Name of user otherwise show connectez-vous
    
    if(@$_SESSION["prenom"]!== null){
        echo "<p id=verdana> Vous êtes déjà connecté en tant que <span id=mark>".$_SESSION['prenom']. " " . $_SESSION['nom'] . "</span></p> <br> 
        
        <input id=disconnect type='submit' name='disconnect' value='Changer de compte'>
        <br>
        <br>
        <input id=disconnect type='submit' name='changeLogin' value='Modifier votre Login'>
         
         <br>
         <br>
         
         <input id=disconnect type='submit' name='changePassword' value='Modifier votre mot de passe'>
        
        ";
        if (isset($_POST["changePassword"])){
    
    echo "</form><form method='post'><p id=verdana><b> Changer votre <span id=mark>mot de passe</span> :</b></p> <br>
        <table>
            <tr><td><span id=verdana>Mot de passe actuel</span></td><td><input id=verdana type='password' name='oldPassword'></td></tr>
             <tr><td><span id=verdana>Nouveau mot de passe</span></td><td><input id=verdana type='password' name='newPassword'></td></tr>
            <tr><td><span id=verdana>Confirmer mot de passe</span></td><td><input id=verdana type='password' name='confirmNewPassword'></td></tr>
            <tr>
            <td><center><input id=enter type='submit' name='confirmPasswordChange' value='Valider'></center></td>
            
            </tr>
        </table>
        </form>";
    
}
        if (isset($_POST["changeLogin"])){
    
    echo "</form><form method='post'><p id=verdana><b> Changer votre <span id=mark>Login</span> :</b></p> <br>
        <table>
            <tr><td><span id=verdana>Login actuel</span></td><td><input id=verdana type='text' value='".$_SESSION['login']."' readonly></td></tr>
             <tr><td><span id=verdana>Nouveau Login </span></td><td><input id=verdana type='text' name='newLogin'></td></tr>
           
            <tr>
            <td><center><input id=enter type='submit' name='confirmLoginChange' value='Valider'></center></td>
            
            </tr>
        </table>
        </form>";
    
}
        
    } else {
        echo "<p id=verdana><b> Connectez-vous en tant que <span id=mark>Membre</span></b></p> <br>
        <table>
            <tr><td><span id=verdana>Login</span></td><td><input id=verdana type='text' name='login'></td></tr>
            <tr><td><span id=verdana>Password</span></td><td><input id=verdana type='password' name='password'></td></tr>
            <tr>
            <td><center><input id=enter type='submit' name='enter' value='Enter'></center></td>
            <td><a id=verdana href='inscription.php'>Non membre</a></td>
            </tr>
        </table>";
    } ?>
        
            </center>  
        </form>
        </div>
        
        <!-- Admin Form -->
        <div id=divAdmin>
        <form method="post">
            <?php if(@$_SESSION["loginA"] == null){
    echo "<p id=verdana><b> Connectez-vous en tant que <span id=markA>Admin</span></b></p> <br>
        <table>
            <tr><td><span id=verdana>Login</span></td><td><input id=verdana type='text' name='loginA'></td></tr>
            <tr><td><span id=verdana>Password</span></td><td><input id=verdana type='password' name='passwordA'></td></tr>
            <tr>
            <td><center><input id=enter type='submit' name='enterA' value='Enter'></center></td>
           
            </tr>
        </table>";
     

} else {
    echo "<p id=verdana> Vous êtes déjà connecté en tant que <span id=markA>".$_SESSION['loginA']. "</span></p> <br> 
        
        <input id=disconnect type='submit' name='disconnect' value='Changer de compte'>
        
        ";
}
            ?>
            
        </form>
        </div>
        
       
        
        
        <br>
        
        
    </body>

