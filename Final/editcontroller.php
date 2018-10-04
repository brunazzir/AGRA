<?php
    include('db_transactions.php');
    include('imageFunction.php');
    if(isset($_POST) && isset($_GET))
    {
        if(!empty($_POST['publication_text']))
        {
            $postId = $_GET['id'];
            $postText = $_POST['publication_text'];
            $images = getImagesByPostId($postId);
            $imagesToRemove = array();
            $directory = "./uploaded_images/";

            
            //Vérifie s'il y a des images à rajouter
            if(isset($_FILES['upload_images']) && is_array($_FILES['upload_images']))
            {
                $savedImages = manageImages($_FILES['upload_images']);
            }
            else 
            {
                $savedImages = null;
            }

            //Vérification des checkbox pour la supression des images
            if(isset($_POST['checkBoxes']))
            {
                for($i = 0; $i < count($images);$i++)
                {
                    if(in_array($images[$i]['id'],$_POST['checkBoxes']))
                    {
                        $imagesToRemove[] = $images[$i];
                    }
                }
            }

            if(updatePostAndImages($postId,$postText,$savedImages,$imagesToRemove))
            {
                echo "we in";
                for($i=0;$i <= count($imagesToRemove);$i++)
                {
                    if(file_exists($directory.$imagesToRemove[$i]['name']))
                    {
                        if(unlink($directory.$imagesToRemove[$i]['name']))
                        {
                            header("Location : facebook.php");
                        }
                    }
                }
                header("Location: facebook.php");
            }
            else
            {
                for($i=0;$i<count($savedImages);$i++)
                {
                    if(file_exists($directory.$savedImages[$i]))
                    {
                        if(unlink($directory.$savedImages[$i]))
                        {
                            header('Location: facebook.php');
                        }
                    }
                }
            }
            header("Location: facebook.php");
        }
    }

?>