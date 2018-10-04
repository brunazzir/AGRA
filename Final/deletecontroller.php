<?php 

include('db_transactions.php');

if(isset($_GET['id']))
{
    $postId = $_GET['id'];

    $directory = "./uploaded_images/";

    $images = getImagesByPostId($postId);
    $img_count = count($images);
    if ($img_count > 0)
    {
        if (DeletePostAndImages($postId))
        {
            for ($i=0; $i < $img_count; $i++)
            {
                if(file_exists($directory.$images[$i]['name']))
                {
                    if(unlink($directory.$images[$i]['name']))
                    {
                        //header('Location: facebook.php');
                    }
                }
                else
                {
                    //header('Location: facebook.php');
                }
            }
            header('Location: facebook.php');
        }
    }
    else
    {
        if(deletePostById($postId))
        {
            header('Location: facebook.php');
        }
    }
}


?>