<?php
require "functions.php";
require "Database.php";
$config = require ("config.php");

echo "<center>Welcome to My Blog! :D</center>";

$db = new Database($config);
$posts = $db
            ->execute("SELECT * FROM posts")
            ->fetchAll();

echo "<ul>";
foreach($posts as $post) {
    echo "<li>$post[title]</li>";
}
echo "</ul>";

?>