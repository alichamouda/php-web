<?php

function tableMult($numero, $taille)
{

   // Le paramètre numero indique le numéro de la 
   // table et taille indique le nombre de ligne 
   // de la table. Exemple si numero vaut 6 et
   //  taille 20, la fonction construira la table
   // de multiplication de 6 de 1 à 20.
   $resultat = "";
   $resultat = $resultat . "<div class=\"multi-table\">";
   for ($i = 1; $i <= $taille; $i++) {
      $resultat = $resultat . "<p>$numero X $i = " . ($numero * $i) . "</p>";
   }
   $resultat = $resultat . "</div>";
   return $resultat;
}
