<?php

include('db_interactions.inc.php');

function showPosts()
{
    $posts = getPosts();
    $content = '';
    
    for($i = 0; $i < count($posts); $i++)
    {
        $images = getImagesByPostId($posts[$i]['id']);
        $content .= 
        '<div class = "row row-post"  >'
            . '<div class="col-sm" >'
                . '<p>'. $posts[$i]['text'] . '</p>'
            . '</div>'
        //. '<hr style="width:100%"/>'
            . '<div class="col-sm">';
        for($j = 0 ; $j < count($images) ; $j++)
        {
            $content .= 
                    '<div>'
                        . '<img class="img-fluid" src="./uploaded_images/'. $images[$j]['name'].'"/>'
                    . '</div>';
            //$content .= '<hr style="width:100%"/>';
        }

        $content .= ''
            . '</div>'
        . '</div>'
        . '<a href="./deletecontroller.php?id='.$posts[$i]['id'].'" onclick="return confirm(\'Voulez-vous supprimer ce post ?\')"><button name="DeletePost">Supprimer</button></a>'
        . '<a href="./facebook_edit.php?id='.$posts[$i]['id'].'"><button name="EditPost">Éditer</button></a>';
    }
    return $content; 
}   


function showPostEdit($postId)
{
    $post = getPostById($postId);
    $images = getImagesByPostId($postId);

    $content = 
    '<div class = "row row-post">'
        . '<div class="col-sm">';
    for($i = 0;$i < count($images); $i ++)
    {
        $content .= 
            '<div>'
                . '<input type="checkbox" name="checkBoxes[]" value="'. $images[$i]['id'] . '"/>' 
                . '<img class="img-fluid" src="./uploaded_images/'. $images[$i]['name'].'"/>'
            . '</div>';
    }
        $content .= 
        '</div>'
    .'</div>'
    .'<div class="row"> ' 
        .'<div class="col-8">'
            .'<textarea id="publication" name="publication_text" class="form-control" rows="6" placeholder="Partagez vos pensées">'.$post[0]['text'].'</textarea>'
        .'</div>'
    .'</div>';
    
    return $content;
}



?>