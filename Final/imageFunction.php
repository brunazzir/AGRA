<?php

include("resize-class.inc.php");

function manageImages($images)
{
    
    $file_types = array('image/x-icon', 'image/gif','image/png','image/jpg','image/jpeg');
    $savedImages = null;
    if($images != null)
    {
        for ($i=0;$i<count($images['name']);$i++) 
        {
            $directory = './uploaded_images/';
            $file_name = $images['name'][$i];
            $max_size = 3145728;
            $size = filesize($images['tmp_name'][$i]);
            $file_type = mime_content_type($images['tmp_name'][$i]);

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
                $target_name = date('Y-m-d-') . uniqid() . '-' . $file_name;
                if(move_uploaded_file($images['tmp_name'][$i], $directory . $target_name))
                {
                    $resizeImg = new resize($directory . $target_name);
                    $resizeImg->resizeImage(200,200, 'exact'); 
                    $resizeImg->saveImage($directory . $target_name,100);
                    $savedImages[]  = $target_name;
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

        return $savedImages;
    }
}
?>