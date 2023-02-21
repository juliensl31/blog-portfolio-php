<?php

namespace BLOG\Article;

use BLOG\Manager\Manager;

require_once('Manager.php');

class ArticleModel extends Manager {

    public function getArticle() {
        
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM article ORDER BY created_date DESC'); 

        return $requete;
    }  
   
    public function getLastArticle() {
        
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM article ORDER BY created_date DESC LIMIT 0, 3'); 

        return $requete;
    }
    
    public function retrieveArticle() {
        
        $id = $_GET['id'];
        $bdd = $this->connection();
        $requete = $bdd->query("SELECT * FROM article WHERE id = '$id'");

        return $requete;
    }


    public function postArticle($titre, $message) {

        $bdd = $this->connection();
        $requete = $bdd->prepare('INSERT INTO article(title, content) VALUES(?, ?)');
        $result = $requete->execute([$titre, $message]);

        return $result;
    }

    public function updateArticle($newTitre, $newMessage) {
        $bdd = $this->connection();
        $id = $_GET['id'];
        $newTitre = htmlspecialchars($_POST['newTitre']);
        $newMessage = htmlspecialchars($_POST['newMessage']);
        $requete = $bdd->prepare("UPDATE article SET title = ?, content = ?  WHERE id = ?");
        $result = $requete->execute([$newTitre, $newMessage, $id]);

        return $result;
    }
   
    public function deleteArticle() {
        $id = $_POST['id'];
        $bdd = $this->connection();
        $requete = $bdd->prepare('DELETE FROM article WHERE id = :id');
        $result = $requete->execute([
            'id' => $id
        ]);

        return $result;
    }
}