<?php
    $pdo = new PDO(
    'mysql:host=localhost;dbname=TODO;charset=utf8mb4','root','');

    $Tname = trim($_POST['Tname']??'');
    $length = strlen($Tname);
    
    if ($length > 140) {
        echo '<h1> Task name is too long!</h1>'; 
    } 
    else {
        $stmt = $pdo->prepare('INSERT INTO tasks (Tname) VALUES (:Tname)');
        $stmt-> execute([':Tname' => $Tname]);
    }

    header("Location: index.php");
    exit;
?>
