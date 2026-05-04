<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

if(isset($_FILES['kep'])) {

    $targetDir = "../uploads/";
    $fileName = basename($_FILES["kep"]["name"]);
    $targetFile = $targetDir . $fileName;

    // feltöltés
    if(move_uploaded_file($_FILES["kep"]["tmp_name"], $targetFile)) {
        header("Location: ../index.php?kepek");
        exit;
    } else {
        echo "Hiba a feltöltés során!";
    }
}
?>