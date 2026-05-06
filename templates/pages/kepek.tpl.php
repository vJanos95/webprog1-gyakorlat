<<h1>Képgaléria (F1)</h1>

<?php if(isset($_SESSION['login'])): ?>


<form action="./logicals/feltoltes.php" method="post" enctype="multipart/form-data">
    <input type="file" name="kep" required>
    <button type="submit">Feltöltés</button>
</form>
 <?php else: ?>

    <p>Csak bejelentkezett felhasználók tölthetnek fel képet.</p>

<?php endif; ?>

<hr>