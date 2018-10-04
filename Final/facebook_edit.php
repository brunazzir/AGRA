<?php
    include('getPosts.inc.php');
    $postId = $_GET['id'];
?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="./bonjour.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <div id="logo">
                        <img src="salut.ico" class="img-fluid"/>
                        Centre de Formation Professionelle et Technique d'informatique
                    </div>
                </div> 
                <div class="col">
                    <div id="banner">
                        <img src="salut.ico"/>
                        Banner B O I S
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div id="timeline">
                        <form id="upload_form" action="./editcontroller.php?id=<?php echo($postId);?>"  method="post" enctype="multipart/form-data" >
                            <?php
                                $postToEdit = showPostEdit($postId);
                                echo $postToEdit;
                            ?>
                            <div class="row">
                                <div class="col-4">
                                    <input type="file" name="upload_images[]" class="form-control btn btn-primary" accept="image/*" multiple/>
                                </div>
                                <div class="col-2">
                                    <input type="submit" class="form-control" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="bonjour.js"></script>