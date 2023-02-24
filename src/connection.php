<?php
try {
         $bdd = new PDO('mysql:host=localhost;dbname=blog_portfolio;charset=utf8', 'root', 'root');
         }
         catch(Exception $e) {
             throw new Exception('Erreur : '.$e->getMessage());
         } 