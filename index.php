<?php

require "functions.php";

// 1. Izveidot datu bāzi ✅
// 2. Izveidot savienojumu ar PHP ✅
// 3. Izvadīt datus uz HTML ✅

// Data Source Name
$dsn = "mysql:host=localhost;port=3306;user=root;password=;dbname=blog_ipb23;charset=utf8mb4";

// PHP Data Object
$pdo = new PDO($dsn);


// 1. Sagatavot vaicājumu
$statement = $pdo->prepare("SELECT * FROM posts");

// 2. Izpildīt vaicājumu
$statement->execute();

// 3. Iegūt rezultātus kā asociatīvo masīvu
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

//dd($posts[0]["content"]);

echo "<ul>";
foreach($posts as $post) {
    echo "<li>" . $post["content"] . "</li>";
}
echo "</ul>";