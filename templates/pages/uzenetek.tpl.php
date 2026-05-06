<h1>Beérkezett üzenetek</h1>

<?php
$dbh = new PDO('mysql:host=localhost;dbname=main_admin','main_admin','admin1990!');
$dbh->query('SET NAMES utf8');

$sql = "SELECT * FROM uzenetek ORDER BY ido DESC";
$stmt = $dbh->query($sql);

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div style='border:1px solid #c00000; margin:10px; padding:10px;'>";
    echo "<strong>Név:</strong> ".$row['nev']."<br>";
    echo "<strong>Email:</strong> ".$row['email']."<br>";
    echo "<strong>Üzenet:</strong><br>".$row['uzenet']."<br>";
    echo "<small>".$row['ido']."</small>";
    echo "</div>";
}
?>