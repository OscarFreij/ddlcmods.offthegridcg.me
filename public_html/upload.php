<?php
require_once "../private_html/Container.php";
$container = new Container();
$container->Functions()->UploadModFile($_FILES["fileToUpload"]);
?>