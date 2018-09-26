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
        $content .= '<article'
    . '<div class="outset" >'
    . '<div>'
    . '<div>'
    . '<div align="center" bold><h3>'. $posts[$i]['TOC'] . '</h3></div>'
    . '<div align="right"><span class=""><a href="./editPost.php?id='.$posts[$i]['id'].'"><button>Modification</button></a></span>'
    . '<span align="" class=""><a href="./controllers/delete.php?id='.$posts[$i]['id'].'" onclick="return confirm(\'Voulez-vous vraiment supprimer ce post ?\')"><button class="buttonPost" name="Delete">Suppression</button></a></span></div>'
    . '</div>'
    . '<div>'
    . '<p>'. $posts[$i]['text'] . '</p>'
    . '</div>'
     . '<hr style="width:100%"/>';
for($j = 0 ; $j < count($images) ; $j++)
{
 $content .= '<div class="d-flex flex-row">'
    . '<div class="p-2"><img class="images col-md-offset-1" alt="l" src="./uploaded_images/'. $images[$j]['name'].'" width="80%"/></div>'
    . '</div>';
 
     $content .= '<hr style="width:100%"/>';
}

$content .= ''
    . '</div>'
    . '</div>'
    . '</article>';

}
return $content; 
}



?>