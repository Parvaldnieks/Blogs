<?php
require "Validator.php";
require "Database.php";
$config = require("config.php");
$db = new Database($config);

$query = "SELECT * FROM posts WHERE id = :id";

$params = [":id" => $_GET["id"]];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if(!Validator::string($_POST["title"], min: 1, max: 255)) {
        $errors["title"] = "Title cannot be empty or too long!";
    }
    if(!Validator::number($_POST["category_id"], min: 1, max: 3)) {
                $errors["category_id"] = "Category ID invalid!";
    }
    if(empty($errors)) {
            $query ="UPDATE posts
                     SET title = :title, category_id = :category_id
                     WHERE id = :id;";
            $params = [
                ":title" => $_POST["title"],
                ":category_id" => $_POST["category_id"],
                ":id" => $_GET["id"]
                ];
                $db->execute($query, $params);
                header("Location: /");
                die();
    }
}

$post = $db->execute($query, $params)
           ->fetch();

$title = "Edit a post";
require "views/posts/edit.view.php";