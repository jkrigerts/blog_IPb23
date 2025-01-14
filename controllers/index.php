<?php

$select = "SELECT * FROM posts";
$params = [];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "" ) {
    $search_query = "%" . $_GET["search_query"] . "%";
    $select .= " WHERE content LIKE :nosaukums"; // Sagatavotais vaicājums
    $params = ["nosaukums" => $search_query]; // Saistītais parametrs
}
$posts = $db->query($select, $params)->fetchAll();

$pageTitle = "Blogs";
$style = "css/style1.css";
require "./views/index.view.php";