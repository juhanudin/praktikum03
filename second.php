<?php
$pdo = new PDO('mysql:host=localhost;port=3307;dbname=praktikum3',
 'root', '');
$stmt = $pdo->query("SELECT nama, email, password FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<table border="1">'."\n";
foreach ( $rows as $row ) {
    echo"<tr><td>";
    echo$row["nama"];
    echo"</td><td>";
    echo$row["email"];
    echo"</td><td>";
    echo$row["password"];
    echo"</td></tr>\n";
}
echo "</table>\n";
?>