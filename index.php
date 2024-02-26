<?php

echo "Hello! :D";

$connection_string = "mysql:host=localhost;dbname=blog_strikaitis;user=root;password=;charset=utf8mb4";
$pdo = new PDO($connection_string);

// 1. Sagatavo SQL izpildei
$que = $pdo->prepare("SELECT * FROM posts");
// 2. Izpilda SQL
$que->execute();
// 3. Beidzot dabu rezultatus, visus pie tam!
$posts = $que->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($posts);
echo "</pre>";

?>