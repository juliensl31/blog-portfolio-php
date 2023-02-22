<?php

use BLOG\Article\ArticleModel;
use BLOG\Project\ProjectModel;

require_once('model/ArticleModel.php');
require_once('model/ProjectModel.php');

function home() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getLastArticle();
    
    $projectModel = new ProjectModel();
    $req = $projectModel->getLastProject();

    require('view/homeView.php');
}

function archiveArticle() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getArticle();

    require('view/archiveArticleView.php');
}

function archiveProjet() {
    $projectModel = new ProjectModel();
    $requete = $projectModel->getProject();

    require('view/archiveProjectView.php');
}

function admin() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getArticle();

    $projectModel = new ProjectModel();
    $req = $projectModel->getProject();

    require('view/adminView.php');
}

function updatingArticle() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->retrieveArticle();

    require('view/updateArticleView.php'); 
}

function updatingProject() {
    $projectModel = new ProjectModel();
    $req = $projectModel->retrieveProject();

    require('view/updateProjectView.php'); 
}

function addArticle($titre, $message) {
    $articleModel = new ArticleModel;
    $result = $articleModel->postArticle($titre, $message);

    if($result === false) {
        throw new Exception("Impossible d'ajouter votre article pour le moment");
    }
    else {
        header('location: index.php?page=admin');
        exit();
    }
 }

 function addProject($titre_projet, $message_projet) {
    $projectModel = new ProjectModel();
    $result = $projectModel->postProject($titre_projet, $message_projet);

    if($result === false) {
        throw new Exception("Impossible d'ajouter votre projet pour le moment");
    }
    else {
        header('location: index.php?page=admin');
        exit();
    }
 }

 function changeArticle($newTitre, $newMessage){
    $articleModel = new ArticleModel;
    $result = $articleModel->updateArticle($newTitre, $newMessage);

    if($result === false) {
        throw new Exception("Impossible de modifier votre article pour le moment");
    }
    else {
        header('location: index.php?page=admin');
        exit();
    }
 }

 function changeProject($newTitre_projet, $newMessage_projet){
    $projectModel = new ProjectModel;
    $result = $projectModel->updateProject($newTitre_projet, $newMessage_projet);

    if($result === false) {
        throw new Exception("Impossible de modifier votre projet pour le moment");
    }
    else {
        header('location: index.php?page=admin');
        exit();
    }
 }
 
 function removeArticle(){
    $articleModel = new ArticleModel;
    $result = $articleModel->deleteArticle();

    if($result === false) {
        throw new Exception("Impossible de supprimer votre article pour le moment");
    }
    else {
        header('location: index.php?page=admin');
        exit();
    }
 }

 function removeProject(){
    $projectModel = new ProjectModel;
    $result = $projectModel->deleteProject();

    if($result === false) {
        throw new Exception("Impossible de supprimer votre projet pour le moment");
    }
    else {
        header('location: index.php?page=admin');
        exit();
    }
 }