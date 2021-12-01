<?php 

class Functions
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;    
    }

    public function UploadModFile($fileRef)
    {
        $target_dir = "../storage/".basename($fileRef["name"])."/";

        $target_file = $target_dir . basename($fileRef["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        /*
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($fileRef["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }
        */

        /*
        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }
        */

        // Check file size
        if ($fileRef["size"] > 2000000000)
        {
            echo "Sorry, your file is too large. Max 250MB.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($fileType != "zip")
        {
            echo "Sorry, only .ZIP files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0)
        {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        }
        else
        {
            if (!mkdir("../storage/".basename($fileRef["name"]), 0777))
            {
                echo("An older file was found, replacing file!");
            }

            if (move_uploaded_file($fileRef["tmp_name"], $target_file))
            {
                echo "The file ". htmlspecialchars( basename( $fileRef["name"])). " has been uploaded.";
            }
            else
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

?>