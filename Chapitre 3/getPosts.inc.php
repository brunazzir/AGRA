<?php

include('bd_interactions.inc.php');


function showPosts()
{
    $posts = getPosts();
    $content = '';
    
    //TODO CHANGE FORMAT
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
        . '<a href="./transactions_db.php?id='.$posts[$i]['id'].'" onclick="return confirm(\'Voulez-vous vraiment supprimer ce post ?\')"><button name="DeletePost">Supprimer</button></a>';
    }
    return $content; 
}



?>