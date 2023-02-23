<?php

namespace BLOG\Comment;

use BLOG\Manager\Manager;

require_once('Manager.php');

class CommentModel extends Manager {

    public function postComment($content, $article_id) {

        $bdd = $this->connection();
        $requete = $bdd->prepare('INSERT INTO comment(comment_content, article_id) VALUES(?, ?)');
        $result = $requete->execute([$content, $article_id]);

        return $result;
    }

    public function getComment() {

        $bdd = $this->connection();
        $req = $bdd->query('SELECT * FROM comment ORDER BY created_date DESC');

        return $req;
    }

}