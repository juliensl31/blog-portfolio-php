<?php

namespace Blog\User;

use Blog\Manager\Manager;

require_once('Manager.php');

class UserModel extends Manager {

    public function getUser($email, $password, $secret) {
        $bdd = $this->connection();
        $req = $bdd->prepare('INSERT INTO user(email, password, secret) VALUES(?, ?, ?)');
		$result = $req->execute([$email, $password, $secret]);

        return $result;
    }
}