<?php

require 'admin/db/connectdb.php';

$id = 0;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    $id = $_POST['id'];

    $query = "DELETE FROM articles WHERE articles . id = ?";
    $retour = $dbh->prepare($query);
    $retour->execute(array($id));

    header("Location: /actus.php");
}