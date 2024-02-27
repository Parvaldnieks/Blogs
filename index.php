<?php
require "functions.php";

echo "Welcome to My Blog! :D";

$connection_string = "mysql:host=localhost;dbname=blog_strikaitis;user=root;password=;charset=utf8mb4";
$pdo = new PDO($connection_string);

// 1. Sagatavo SQL izpildei!
$que = $pdo->prepare("SELECT * FROM posts");
// 2. Izpilda SQL!!
$que->execute();
// 3. Beidzot dabu rezultātus, visus pie tam!!!
$posts = $que->fetchAll(PDO::FETCH_ASSOC);
// 4. Attēlot uz ekrāna!!!!
echo "<ul>";
foreach($posts as $post) {
    echo "<li>$post[title]</li>";
}
echo "</ul>";

?>