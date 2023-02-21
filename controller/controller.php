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

function article() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getArticle();

    require('view/articleView.php');
}

function projet() {
    $projectModel = new ProjectModel();
    $requete = $projectModel->getProject();

    require('view/projectView.php');
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

    require('view/updateView.php'); 
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