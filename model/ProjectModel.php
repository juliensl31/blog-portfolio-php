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
        
        $id_projet = $_GET['id'];
        $bdd = $this->connection();
        $requete = $bdd->query("SELECT * FROM project WHERE id = '$id_projet'");

        return $requete;
    }


    public function postProject($titre_projet, $message_projet, $techno) {

        $bdd = $this->connection();
        $requete = $bdd->prepare('INSERT INTO project(title, content, techno) VALUES(?, ?, ?)');
        $result = $requete->execute([$titre_projet, $message_projet, $techno]);

        return $result;
    }

    public function updateProject($newTitre_projet, $newMessage_projet, $newTechno) {
        $bdd = $this->connection();
        $id = $_GET['id'];
        $newTitre_projet = htmlspecialchars($_POST['newTitreProjet']);
        $newMessage_projet = htmlspecialchars($_POST['newMessageProjet']);
        $newTechno = htmlspecialchars($_POST['newTechno']);
        $requete = $bdd->prepare("UPDATE project SET title = ?, content = ?, techno = ?  WHERE id = ?");
        $result = $requete->execute([$newTitre_projet, $newMessage_projet, $newTechno, $id]);

        return $result;
    }
   
    public function deleteProject() {
        $id_projet = $_POST['id'];
        $bdd = $this->connection();
        $requete = $bdd->prepare('DELETE FROM project WHERE id = :id');
        $result = $requete->execute([
            'id' => $id_projet
        ]);

        return $result;
    }
}