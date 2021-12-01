<?php
require_once "../private_html/Container.php";
$container = new Container();

$pageType = "home";

?>
<!DOCTYPE html>
<html>
<?php
    require "../private_html/modules/head.php";
?>
<body>

    <?php
        require "../private_html/modules/preLoad.php";
        require "../private_html/modules/navbar.php";
    ?>
    <div id="wrapper">
        <?php
        require "../private_html/templates/home.php";
        ?>
    </div>
    <?php
        require "../private_html/modules/postLoad.php";
    ?>
</body>
</html>