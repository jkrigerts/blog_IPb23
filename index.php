<?php

require "functions.php";
require "Database.php";

$config = require("config.php");

// Mērķis: Uztaisīt filtru - ierakstu meklēšanu
//  1. Izveidot meklēšanas joslu: HTML forma, kurā ir input un submit poga ✅
//  2. Kaut kā sarakstīt PHP
//  3. Atgriezt meklētos datus no SQL datu bāzes


$db = new Database($config["database"]);
$posts = $db->query("SELECT * FROM posts")->fetchAll();

if (isset($_GET["search_query"]) && $_GET["search_query"] != "" ) {
    $posts = $db->query("SELECT * FROM posts WHERE content LIKE '%" . $_GET["search_query"] . "%';")->fetchAll();
}
echo "<h1>Blogs</h1>";

echo "<form>";
echo "<input name='search_query' />";
echo "<button>Meklēt</button>";
echo "</form>";

echo "<ul>";
foreach($posts as $post) {
    echo "<li>" . $post["content"] . "</li>";
}
echo "</ul>";

