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
        $request = $connexion -> prepare("INSERT INTO tbl_posts (text, TOC, TOM) VALUES (:post_text, :TOC, :TOM) ");
        $request -> bindParam(":post_text", $post_text,PDO::PARAM_STR);
        $date = date('Y-m-d h:m:s');
        $request -> bindParam(":TOC",$date,PDO::PARAM_STR);
        $request -> bindParam(":TOM",$date,PDO::PARAM_STR);
        if ($request -> execute(array(":post_text" => $post_text,":TOC" => $date,":TOM" => $date)))
        {
            return $connexion -> lastInsertId();
        }
        else
        {
            return false;
        }
    }

    function insertImage($image_name,$postId)
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare("INSERT INTO tbl_images (name, postId) VALUES (:name,:postId)");
        $request -> bindParam(":name",$image_name,PDO::PARAM_STR);
        $request -> bindParam(":postId",$postId,PDO::PARAM_STR);
        if ($request -> execute(array(":name" => $image_name, ":postId" => $postId)))
        {
            return $connexion -> lastInsertId();
        }
        else
        {
            return false;
        }
    }

    //Returns posts and their linked images
    function getPostsAndImages()
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare('SELECT tbl_posts.id,text,TOC,TOM, tbl_images.id, name FROM tbl_posts NATURAL JOIN images ORDER BY id DESC');
        if ($request -> execute())
        {
            return $request -> fetchAll();
        }
        else 
        {
            return false;
        }
    }

    //Returns all posts text only
    function getPosts()
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare('SELECT id,text,TOC,TOM FROM tbl_posts ORDER BY id DESC');
        if ($request -> execute())
        {
            return $request -> fetchAll();
        }
        else 
        {
            return false;
        }
    }


    //Returns a specific post and the images corresponding to it
    function getPostAndImagesById($postId)
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare('SELECT tbl_posts.id,text,TOC,TOM, tbl_images.id, name FROM tbl_posts NATURAL JOIN images WHERE id = :postId');
        if ($request -> execute(array("postId" => $postId)))
        {
            return $request -> fetchAll(PDO::FETCH_ASSOC);
        }
        else 
        {
            return false;
        }
    }

    //Returns a specific post text only
    function getPostById($postId)
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare('SELECT id,text,TOC,TOM FROM tbl_posts WHERE id = :postId');
        if ($request -> execute(array("postId" => $postId)))
        {
            return $request -> fetchAll(PDO::FETCH_ASSOC);
        }
        else 
        {
            return false;
        }
    }

    function getImagesByPostId($postId)
    {
        $connexion = getConnexion();
        $request = $connexion -> prepare('SELECT * FROM tbl_images WHERE id = :postId');
        if ($request -> execute(array("postId" => $postId)))
        {
            return $request -> fetchAll();
        }
        else 
        {
            return false;
        }
    }


?>