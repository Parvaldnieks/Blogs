<?php
require "Validator.php";
require "Database.php";
$config = require("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if(!Validator::string($_POST["title"], min: 1, max: 255)) {
        $errors["title"] = "Title cannot be empty or too long!";
    }
    if(!Validator::number($_POST["category_id"], min: 1, max: 3)) {
                $errors["category_id"] = "Category ID invalid!";
    }
    if(empty($errors)) {
            $query ="INSERT INTO posts (title, category_id)
                     VALUES (:title, :category_id);";
            $params = [
                ":title" => $_POST["title"],
                ":category_id" => $_POST["category_id"]
                ];
                $db->execute($query, $params);
                header("Location: /");
                die();
    }
}
$title = "Create post";
require "views/posts/create.view.php";