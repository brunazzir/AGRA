<?php
include("bd_interactions.inc.php");


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

?>