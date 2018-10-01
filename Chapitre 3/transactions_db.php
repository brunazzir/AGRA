<?php
include("bd_interactions.inc.php");

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

function DeletePostAndImages($postId) 
{
    $connexion = getConnexion();
    try
    {
        $connexion->beginTransaction();
        $id = getPostById($postId);
    }
    catch(Exception $e)
    {
        $connexion->rollback();
        return false;
    }
}


?>