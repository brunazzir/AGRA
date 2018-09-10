<?php 
    DEFINE('DB_HOST', "127.0.0.1");
    DEFINE('DB_NAME', "brunazzi_cfpt_blog_2018");
    DEFINE('DB_USER', "root"); //User
    DEFINE('DB_PASS', ""); //Password


    function getConnexion() 
    {
        static $dbb = null; //ne perd pas sa valeur a chaque appel

        try 
        {
            if($dbb === null) //Vrai seulement lors du premier appel
            {
                $connexionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ;
                $dbb = new PDO($connexionString, DB_USER, DB_PASS);
                $dbb -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }
        catch(PDOException $e)
        {
            die("Error :" . $e -> getMessage());
        }
        return $dbb;
    }
?>