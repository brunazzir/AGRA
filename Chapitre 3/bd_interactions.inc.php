<?php

include("connexion.inc.php");

function getImage($idImage)
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare("SELECT * FROM tbl_images WHERE id = :id");
        $request -> bindParam(':id', $idImage, PDO::PARAM_INT); //evite les injections sql
        $request -> execute();
        $result = $request -> fetchAll(PDO::FETCH_ASSOC); //Récup du résultat
        return $result;
    }

    function insertPost($post_text)
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare("INSERT INTO tbl_posts (text, TOC, TOM) VALUES (:post_text, :TOC, :TOC) ");
        $request -> bindParam(':text', $post_text,PDO::PARAM_STR);
        $date = date('Y-m-d h:m:s');
        $request -> bindParam(':TOC',$date,PDO::PARAM_STR);
        if ($request -> execute(array("text" => $post_text)))
        {
            return $connexion -> lastInsertId();
        }
        else
        {
            return false;
        }
        $request -> execute();
    }

    function insertImage($image_name)
    {
        $connexion = getConnexion();
    }

?>