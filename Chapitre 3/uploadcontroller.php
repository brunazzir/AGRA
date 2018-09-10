<?php

include("bd_interactions.inc.php");

$uploaded_files =$_FILES['upload_images']; // Englober dans un isset() ? -- TODO
$uploaded_text = $_POST['publication_text']; // ditto ^
$file_types = array('image/x-icon', 'image/gif','image/png','image/jpg','image/jpeg');


for ($i=0;$i<count($uploaded_files['name']);$i++) 
{
    $directory = './uploaded_images/';
    $file_name = $uploaded_files['name'][$i];
    $max_size = 3145728;
    $size = filesize($uploaded_files['tmp_name'][$i]);
    $file_type = mime_content_type($uploaded_files['tmp_name'][$i]);

    if(!in_array($file_type,$file_types)) //file type control
    {
        $error = 'You must upload an image. (.gif, .png, .jpg, .jpeg, .ico)';
    }
    if($size>$max_size)
    {
        $error = 'The file you tried to upload is over 3MB.';
    }
    if(!isset($error)) //Upload allowed if there is no error
    {
        if(move_uploaded_file($uploaded_files['tmp_name'][$i], $directory . date('Y-m-d-') . uniqid() . '-' . $file_name))
        {
            //UploadImageAndPost($uploaded_files,$uploaded_text);
            insertPost($uploaded_text);
            echo 'Upload successful.';
        }
        else 
        {
            echo 'Upload failed.';
        }
    }
    else
    {
        echo $error;
    }
}

function UploadImageAndPost ($files, $text) 
{
    $connexion = getConnexion();
    try
    {
        $connexion -> beginTransaction();
        $postId = insertPost($text);

       /* for ($i=0; $i < count($files); $i++)
        {
            addImages($files[$i], $postId);
        }*/

        return $connexion -> commit();
    }
    catch (Exception $e)
    {
        $connexion -> rollback();
        return false;
    }
}

?>