<?php
$uzenet = "";
$szerkesztendo = null;

try {
    $dbh = new PDO('mysql:host=localhost;dbname=main_admin', 'main_admin', 'admin1990!',
                   array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8');


    if (isset($_GET['torol'])) {
        $st = $dbh->prepare("DELETE FROM pilota_txt_1 WHERE az = :az");
        $st->execute(array(':az' => $_GET['torol']));
        header("Location: index.php?oldal=crud");
        exit;
    }

    if (isset($_GET['szerkeszt'])) {
        $st = $dbh->prepare("SELECT * FROM pilota_txt_1 WHERE az = :az");
        $st->execute(array(':az' => $_GET['szerkeszt']));
        $szerkesztendo = $st->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['uj_pilota'])) {
            $sql = "INSERT INTO pilota_txt_1 (nev, nem, szuldat, nemzet)
            VALUES (:nev, :nem, :szuldat, :nemzet)";
            $st = $dbh->prepare($sql);
            $st->execute(array(
                ':nev' => $_POST['nev'],
                ':nem' => $_POST['nem'],
                ':szuldat' => $_POST['szuldat'],
                ':nemzet' => $_POST['nemzet']
            ));
            $uzenet = "Sikeresen rögzítve!";

        } elseif (isset($_POST['modosit_pilota'])) {
            $sql = "UPDATE pilota_txt_1
            SET nev = :nev, nem = :nem, szuldat = :szuldat, nemzet = :nemzet
            WHERE az = :az";
            $st = $dbh->prepare($sql);
            $st->execute(array(
                ':nev' => $_POST['nev'],
                ':nem' => $_POST['nem'],
                ':szuldat' => $_POST['szuldat'],
                ':nemzet' => $_POST['nemzet'],
                ':az' => $_POST['az']
            ));

            header("Location: index.php?oldal=crud&siker=1");
            exit;
        }
    }

    if (isset($_GET['siker'])) {
        $uzenet = "Sikeres módosítás!";
    }


    $pilota_lista = $dbh->query("SELECT * FROM pilota_txt_1 ORDER BY az DESC")->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $uzenet = "Hiba: " . $e->getMessage();
}
?>
