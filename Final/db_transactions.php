<?php
include("db_interactions.inc.php");

//Ajoute un post et son image dans la base de données
function addPostAndImages($text,$images)
{
    $connexion = getConnexion();
    try
    {
        $connexion->beginTransaction();
        $postId = insertPost($text);

        for ($i=0;$i<count($images);$i++)
        {
            insertImage($images[$i], $postId);
        }
        return $connexion->commit();
    }
    catch(Exception $e)
    {
        $connexion->rollback();
        return false;
    }
}


//Supprime un post et ses images dans la base de données grâce à l'id du post
function DeletePostAndImages($postId)  
{
    $connexion = getConnexion();
    try
    {
        $connexion->beginTransaction();
        deleteImagesByPostId($postId);
        deletePostById($postId);

        return $connexion->commit();
    }
    catch(Exception $e)
    {
        $connexion->rollback();
        return false;
    }
}

function updatePostAndImages($postId, $text, $imagesToSave, $imagesToRemove)
{
    $connexion = getConnexion();
    try
    {
        $connexion->beginTransaction();
        for($i=0; $i < count($imagesToRemove);$i++)
        {
            deleteImageById($imagesToRemove[$i]['id']);
        }
        for($i=0; $i < count($imagesToSave);$i++)
        {
            insertImage($imagesToSave[$i], $postId);
        }
        updatePostById($postId,$text);

        return $connexion->commit();
    }
    catch(Exception $e)
    {
        $connexion->rollback();
        return false;
    }
}

?>