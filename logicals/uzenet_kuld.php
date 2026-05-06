<?php
session_start();

try {

    $dbh = new PDO(
        'mysql:host=localhost;dbname=main_admin',
        'main_admin',
        'admin1990!',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    $dbh->query('SET NAMES utf8');

    if(isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['uzenet'])) {

        // adatok beolvasása
        $nev = trim($_POST['nev']);
        $email = trim($_POST['email']);
        $uzenet = trim($_POST['uzenet']);

        // alap ellenőrzés
        if($nev == "" || $email == "" || $uzenet == "") {
            die("Hiányzó adat!");
        }

        // 🔥 BEJELENTKEZÉS ELLENŐRZÉS
        if(isset($_SESSION['login'])) {
            $nev = $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")";
        } else {
            $nev = "Vendég";
        }

        // mentés adatbázisba
        $sql = "INSERT INTO uzenetek (nev, email, uzenet)
                VALUES (:nev, :email, :uzenet)";

        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            ':nev' => $nev,
            ':email' => $email,
            ':uzenet' => $uzenet
        ));

        // vissza az üzenetek oldalra
        header("Location: ../index.php?uzenetek");
        exit;
    }

} catch(PDOException $e) {
    echo "Hiba: " . $e->getMessage();
}
?>