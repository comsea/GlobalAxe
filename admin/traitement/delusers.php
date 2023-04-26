<?php

require 'admin/db/connectdb.php';

$id = 0;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    $id = $_POST['id'];

    $query = "DELETE FROM USER WHERE USER . id = ?";
    $retour = $dbh->prepare($query);
    $retour->execute(array($id));

    header("Location: /users.php");
}
