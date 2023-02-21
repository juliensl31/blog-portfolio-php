<?php

use BLOG\Article\ArticleModel;

require_once('model/ArticleModel.php');

function home() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getLastArticle();

    require('view/homeView.php');
}

function article() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getArticle();

    require('view/articleView.php');
}

function admin() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getArticle();

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