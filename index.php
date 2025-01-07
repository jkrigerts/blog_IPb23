<?php

require "functions.php";
require "Database.php";

$config = require("config.php");

// Mērķis: Uztaisīt filtru - ierakstu meklēšanu
//  1. Izveidot meklēšanas joslu: HTML forma, kurā ir input un submit poga ✅
//  2. Kaut kā sarakstīt PHP ✅
//  3. Atgriezt meklētos datus no SQL datu bāzes ✅


$db = new Database($config["database"]);

$select = "SELECT * FROM posts";
$params = [];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "" ) {
    $search_query = "%" . $_GET["search_query"] . "%";
    $select .= " WHERE content LIKE :nosaukums"; // Sagatavotais vaicājums
    $params = ["nosaukums" => $search_query]; // Saistītais parametrs
}
$posts = $db->query($select, $params)->fetchAll();


echo "<h1>Blogs</h1>";

echo "<form>";
echo "<input name='search_query' />";
echo "<button>Meklēt</button>";
echo "</form>";

if (count($posts) == 0 ) {
    echo "Nav atrasts neviens ieraksts 😭 lūdzu pamēģini citu vārdu 🐣";
}

echo "<ul>";
foreach($posts as $post) {
    echo "<li>" . $post["content"] . "</li>";
}
echo "</ul>";

