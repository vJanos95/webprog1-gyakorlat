<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=main_admin', 'main_admin', 'admin1990!',
                       array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok
        where bejelentkezes = :bejelentkezes and jelszo = :jelszo";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(
            ':bejelentkezes' => $_POST['felhasznalo'],
            ':jelszo' => sha1($_POST['jelszo'])
        ));

        $row = $sth->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $_SESSION['csn'] = $row['csaladi_nev'];
            $_SESSION['un'] = $row['uto_nev'];
            $_SESSION['login'] = $_POST['felhasznalo'];

            // Siker esetén frissítjük az oldalt, hogy a session életbe lépjen
            header("Location: index.php");
            exit;
        } else {
            $uzenet = "Hibás felhasználónév vagy jelszó!";
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
    }
}
?>
