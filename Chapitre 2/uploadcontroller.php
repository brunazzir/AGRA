

<?php

$uploaded_files =$_FILES['upload_images'];

for ($i=0;$i<count($uploaded_files['name']);$i++) 
{
    var_dump($_FILES);
    $directory = './uploaded_images/';
    $file_name = $uploaded_files['name'][$i];
    $max_size = 3145728;
    $size = filesize($uploaded_files['tmp_name'][$i]);
    $file_types = array('.gif','.png','.jpg','.jpeg', '.ico');
    $file_type = strrchr($uploaded_files['name'][$i], '.');

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

/*function resize_image($image) 
{
    $image 
}
*/
?>