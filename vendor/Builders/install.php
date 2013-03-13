<?php

class Install {
    function __construct() {
        include('vendor/Views/main.php');
        
        if (!isset($_GET['step'])) {
            echo '<h1>Installeren</h1><p>Om het Framework te installeren moet je de volgende stappen doorlopen, hierbij is toegang tot de database vereist!</p>';
            echo '<p class="step"><a href="http://localhost/Framework2.0/install?step=1" class="button button-large">Ga door</a></p>';
            
            return false;
        }
        
        if ($_GET['step'] == 1) {
            echo '<h1>Stap 1</h1><br />';
            
            echo '<form action="vendor/Builders/login" method="post">';
            echo '<p>Gebruikersnaam</p><input type="text" name="username"><br />';
            echo '<p>Wachtwoord</p><input type="password" name="password">';
            
            echo '<p class="step"><a href="http://localhost/Framework2.0/login" class="button button-large">Ga door</a></p></form>';
        } else if ($_GET['step'] == 2) {
            echo '<h1>Stap 2</h1>';
        } else {
            
            if (!is_numeric($_GET['step'])) {
                echo '<h1>Er is een fout opgetreden!</h1>';
                return false;
            }
            
            echo '<h1>Stap ' . htmlentities($_GET['step']) . '</h1>';
        }
         
        
    }
}