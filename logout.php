<?php
    session_start(); // Initialiser
    session_unset(); // Désactiver
    session_destroy(); // Détruire

    setcookie('auth', '', time() - 1);

    header('location: connectionView.php');
    exit();
