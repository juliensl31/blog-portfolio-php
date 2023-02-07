<?php

use Blog\user\UserModel;

    require_once('model/UserModel.php');

     function addUser($email, $password, $secret) {
         $userModel = new UserModel();
         $result = $userModel->getUser($email, $password, $secret);

         if($result === false) {
            throw new Exception("Impossible de vous inscrire pour le moment");
        }
        else {
            header('location: inscription.php');
            exit();
        }
     }
