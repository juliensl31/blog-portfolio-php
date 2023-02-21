<?php

namespace BLOG\Project;

use BLOG\Manager\Manager;

require_once('Manager.php');

class ProjectModel extends Manager {

    public function getProject() {
        
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM project ORDER BY created_date DESC'); 

        return $requete;
    }  
   
    public function getLastProject() {
        
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM project ORDER BY created_date DESC LIMIT 0, 3'); 

        return $requete;
    }
    
    public function retrieveProject() {
        
        $id = $_GET['id'];
        $bdd = $this->connection();
        $requete = $bdd->query("SELECT * FROM project WHERE id = '$id'");

        return $requete;
    }


    public function postProject($titre_projet, $message_projet) {

        $bdd = $this->connection();
        $requete = $bdd->prepare('INSERT INTO project(title, content) VALUES(?, ?)');
        $result = $requete->execute([$titre_projet, $message_projet]);

        return $result;
    }

    public function updateProject($newTitre, $newMessage) {
        $bdd = $this->connection();
        $id = $_GET['id'];
        $newTitre = htmlspecialchars($_POST['newTitre']);
        $newMessage = htmlspecialchars($_POST['newMessage']);
        $requete = $bdd->prepare("UPDATE project SET title = ?, content = ?  WHERE id = ?");
        $result = $requete->execute([$newTitre, $newMessage, $id]);

        return $result;
    }
   
    public function deleteProject() {
        $id = $_POST['id'];
        $bdd = $this->connection();
        $requete = $bdd->prepare('DELETE FROM project WHERE id = :id');
        $result = $requete->execute([
            'id' => $id
        ]);

        return $result;
    }
}