<?php
require "functions.php";
require "Database.php";

$config = require("config.php");

$query = "SELECT * FROM posts";
$params = [];

if (isset($_GET["id"]) && $_GET["id"] != "") {
  $id = $_GET["id"];
  $query .= " WHERE id=:id";
  $params[":id"] = $id;
}

if (isset($_GET["category"]) && $_GET["category"] != "") {
  $category = trim($_GET["category"]);
  $query .= " JOIN categories
              ON posts.category_id = categories.id
              WHERE categories.name = :category
            ";
  $params[":category"] = $category;
}

$db = new Database($config);
$posts = $db
          ->execute($query, $params)
          ->fetchAll();


echo "<form>";
echo "<input name='id'/>";
echo "<button>Filter by ID</button>";
echo "</form>";

echo "<form>";
echo "<input name='category' value='". ($_GET["category"] ?? '') . "' />";
echo "<button>Filter by category</button>";
echo "</form>";

echo "<h1>Posts</h1>";

echo "<ul>";
foreach($posts as $post) {
  echo "<li>" . $post["title"] . "</li>";
}
echo "</ul>";

?>