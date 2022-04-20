<?php
include 'functions.php';
?>


<head>
        
        <title>Bonne Bouffe | Recettes</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="./style/style.css"/>
        
</head>
    <body>
        <div id=divAdmin>
      <form method="post">
          <p id=verdana>Inscriptions de nouveaux membres</p> <br>
        <table>
            
            <tr><td><span id=verdana>Prénom</span></td><td><input id=verdana type='text' name='prenomI'></td></tr>
            <tr><td><span id=verdana>Nom</span></td><td><input id=verdana type='text' name='nomI'></td></tr>
            <tr><td><span id=verdana>Téléphone</span></td><td><input id=verdana type='text' name='telephoneI'></td></tr>
            <tr><td><span id=verdana>Adresse</span></td><td><input id=verdana type='text' name='adresseI'></td></tr>
            <tr><td><span id=verdana>Date de naissance</span></td><td><input id=verdana type='date' name='dateI'></td></tr>
            <tr><td><span id=verdana>Login</span></td><td><input id=verdana type='text' name='loginI'></td></tr>
            <tr><td><span id=verdana>Password</span></td><td><input id=verdana type='password' name='passwordI'></td></tr>
            <tr>
            <td><center><input id=enter type='submit' name='inscrire' value='Inscrire'></center></td>
            </tr>
        </table>
          
        </form>
        </div>
        
    </body>

