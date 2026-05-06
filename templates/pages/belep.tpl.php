<?php if(isset($_SESSION['login'])) { ?>
    <h1>Bejelentkezett:</h1>
    Azonosító: <strong><?= $_SESSION['login'] ?></strong><br><br>
    Név: <strong><?= $_SESSION['csn']." ".$_SESSION['un'] ?></strong>
<?php } else { ?>
    <h1>A bejelentkezés nem sikerült!</h1>
    <a href="index.php?oldal=belepes">Próbálja újra!</a>
<?php } ?>

<?php if(isset($errormessage)) { ?>
    <h2><?= $errormessage ?></h2>
<?php } ?>
