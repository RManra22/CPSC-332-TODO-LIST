<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index.php</title>
    </head> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding-top: 55px;
        }
        h1 {
            color: #333;
        }
        ul{
            list-style-type: none;
            text-align: center;
            padding-right: 45px;
        }
    </style>
    <body>

        <h1>My ToDo List</h1>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">Task title is required and must be ≤ 140 characters.</p>
        <?php endif; ?>

        <form method="POST" action="db.php">
            <input type="text" name="Tname" placeholder="Enter a new task: " maxlength="140" required>
            <button type="submit">Add</button>
        </form>

        <ul>
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=TODO;charset=utf8mb4','root','');
                $tasks = $pdo-> query('SELECT * FROM tasks');
                foreach ($tasks as $t) {
                    echo "<li>#{$t['id']}: {$t['tname']}</li>";
                }     
            ?>
        </ul>
            
    </body>
</html>