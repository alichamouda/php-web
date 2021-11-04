<?php
// afficher la sitation qu'on vient de créer
echo "Login: ".htmlspecialchars($_POST["login"]) .
    "<br>Citation: " .
    htmlspecialchars($_POST["citation"]) .
    "<br>Auteur: " .
    htmlspecialchars($_POST["auteur"]) .
    "<br>Date: " .
    htmlspecialchars($_POST["date-citation"]);
