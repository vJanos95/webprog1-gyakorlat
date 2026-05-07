<h2>Pilóták kezelése (CRUD)</h2>

<?php if($uzenet) echo "<p style='color: #ffcc00; font-weight: bold;'>$uzenet</p>"; ?>

<form action="index.php?oldal=crud" method="post" style="background: #222; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #333;">

<?php if ($szerkesztendo): ?>
<h3>Pilóta adatainak módosítása (Azonosító: #<?= $szerkesztendo['az'] ?>)</h3>
<input type="hidden" name="az" value="<?= $szerkesztendo['az'] ?>">
<?php else: ?>
<h3>Új pilóta rögzítése</h3>
<?php endif; ?>

<label>Név:</label>
<input type="text" name="nev" placeholder="Pilóta neve" value="<?= $szerkesztendo ? htmlspecialchars($szerkesztendo['nev']) : '' ?>" required>

<label>Nem:</label>
<select name="nem" required>
<option value="Férfi" <?= ($szerkesztendo && $szerkesztendo['nem'] == 'Férfi') ? 'selected' : '' ?>>Férfi</option>
<option value="Nő" <?= ($szerkesztendo && $szerkesztendo['nem'] == 'Nő') ? 'selected' : '' ?>>Nő</option>
</select>

<label>Születési dátum:</label>
<input type="date" name="szuldat" value="<?= $szerkesztendo ? $szerkesztendo['szuldat'] : '' ?>" required>

<label>Nemzetiség:</label>
<input type="text" name="nemzet" placeholder="Nemzetiség" value="<?= $szerkesztendo ? htmlspecialchars($szerkesztendo['nemzet']) : '' ?>" required>

<?php if ($szerkesztendo): ?>
<input type="submit" name="modosit_pilota" value="Módosítások mentése" style="background-color: #ffcc00; color: black;">
<a href="index.php?oldal=crud" style="color: white; margin-left: 15px; text-decoration: none; font-size: 0.9rem;">Mégse</a>
<?php else: ?>
<input type="submit" name="uj_pilota" value="Pilóta mentése">
<?php endif; ?>
</form>

<table border="1" style="width:100%; border-collapse: collapse; color: white; background: #111; border: 1px solid #333;">
<tr style="background: #c00000;">
<th style="padding: 10px;">ID</th>
<th>Név</th>
<th>Nem</th>
<th>Születési dátum</th>
<th>Nemzetiség</th>
<th>Műveletek</th>
</tr>
<?php foreach($pilota_lista as $p): ?>
<tr style="border-bottom: 1px solid #222;">
<td style="padding: 10px; text-align: center;"><?= $p['az'] ?></td>
<td><strong><?= htmlspecialchars($p['nev']) ?></strong></td>
<td style="text-align: center;"><?= $p['nem'] ?></td>
<td style="text-align: center;"><?= $p['szuldat'] ?></td>
<td><?= htmlspecialchars($p['nemzet']) ?></td>
<td style="text-align: center;">
<a href="index.php?oldal=crud&szerkeszt=<?= $p['az'] ?>"
style="color: #ffcc00; text-decoration: none; margin-right: 15px; font-weight: bold;">Szerkesztés</a>

<a href="index.php?oldal=crud&torol=<?= $p['az'] ?>"
onclick="return confirm('Biztosan törlöd <?= htmlspecialchars($p['nev']) ?> pilótát?')"
style="color: #ff4444; text-decoration: none; font-weight: bold;">Törlés</a>
</td>
</tr>
<?php endforeach; ?>
</table>
