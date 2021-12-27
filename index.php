<?
    include_once('functions.php');
    if ($pages[$path]) {
        include_once("pages/$path.php");
    } else {
        include_once("pages/page404.php");
    }
?>  