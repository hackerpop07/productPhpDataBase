<?php
include_once 'class/App.php';
$app = new App();
$app->setId($_GET['id']);
$app->delete();
header('Location: index.php');
?>