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

function addArticle($titre, $message) {
    $articleModel = new ArticleModel;
    $result = $articleModel->postArticle($titre, $message);

    if($result === false) {
        throw new Exception("Impossible d'ajouter votre article pour le moment");
    }
    else {
        header('location: index.php?page=article');
        exit();
    }
 }

 function getArticle() {
    $articleModel = new ArticleModel();
    $requete = $articleModel->getArticle();

    require('view/updateView.php');
}

 function removeArticle($id){
    $articleModel = new ArticleModel;
    $result = $articleModel->deleteArticle($id);

    if($result === false) {
        throw new Exception("Impossible de supprimer votre article pour le moment");
    }
    else {
        header('location: index.php?page=article');
        exit();
    }
 }

 function changeArticle($titre, $message, $id){
    $articleModel = new ArticleModel;
    $result = $articleModel->updateArticle($titre, $message, $id);

    if($result === false) {
        throw new Exception("Impossible de supprimer votre article pour le moment");
    }
    else {
        header('location: index.php?page=article');
        exit();
    }
 }