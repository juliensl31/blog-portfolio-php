<?php

namespace MVC\Manager;

use Exception;
use PDO;

class Manager {

    protected function connection() {
        try {
         $bdd = new PDO('mysql:host=localhost;dbname=blog_portfolio;charset=utf8', 'root', '');
         }
         catch(Exception $e) {
             throw new Exception('Erreur : '.$e->getMessage());
         } 
 
         return $bdd;
     }
}