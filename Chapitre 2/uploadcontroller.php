

<?php
//TODO [0] == i
var_dump($_FILES);
$directory = '/uploaded_images';
$file = $_FILES['upload_images'][0];
$max_size = 3145728;
$size = filesize($_FILES['upload_images']['tmp_name'][0]);
$file_types = array('.gif','.png','.jpg','.jpeg', '.ico');
$file_type = strrchr($_FILES['upload_images']['name'][0], '.');

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
    echo ($_FILES['upload_images']['tmp_name'][0]);
    if(move_uploaded_file($_FILES['upload_images']['tmp_name'][0], $directory . $file))
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
?>