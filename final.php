<?php
require_once "pdo.php";
if (isset($_POST['nama']) && isset($_POST['email']) && $_POST['password']) {
    $sql = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)";
    echo "<pre>\n".$sql."\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':nama' => $_POST['nama'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']
    ));
}
if (isset($_POST["delete"]) && isset($_POST["id"])) {
    $sql = "DELETE FROM users WHERE id = :del";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":del" => $_POST["id"]));
}
$stmt = $pdo->query("SELECT id, nama, email, password FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List + New User</title>
</head>
<body>
    <table border="1">
        <?php
        foreach($rows as $row) {
            echo "<tr><td>";
            echo $row["nama"];
            echo "</td><td>";
            echo $row["email"];
            echo "</td><td>";
            echo $row["password"];
            echo "</td><td>";
            echo '<form method="post">';
            echo '<input type="hidden" name="id" value="'.$row["id"].'">'."\n";
            echo '<input type="submit" value="Del" name="delete">';
            echo '</form>';
            echo "</td></tr>\n";
        }
        ?>
    </table>
    <p>Add A New User</p>
    <form action="" method="post">
        <p><label for="nama">Username: </label><input type="text" name="nama" id="nama" size="40" required></p>
        <p><label for="email">Email: </label><input type="email" name="email" id="email" required></p>
        <p><label for="password">Password: </label> <input type="password" name="password" id="password" required></p>
        <p><input type="submit" value="Add New"></p>
    </form>
</body>
</html>