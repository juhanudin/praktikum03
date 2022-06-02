<?php
require_once "pdo.php";

if(isset($_POST['user_id'])) {
    $sql = "DELETE FROM users WHERE user_id = :del";
    echo "<pre>\n".$sql."\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':del'=>$_POST['user_id']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete A User</title>
</head>
<body>
    <p>Delete A User</p>
    <form action="" method="post">
        <p><label for="user_id">ID to Delete: </label><input type="text" name="user_id" id="user_id" required></p>
        <p><input type="submit" value="Delete"></p>
    </form>    
</body>
</html>