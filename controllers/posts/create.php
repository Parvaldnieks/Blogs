<?php
require "Database.php";
$config = require("config.php");
$db = new Database($config);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if(trim($_POST["title"]) == "") {
        $errors["title"] = "Title cannot be empty!";
    }
        if(strlen($_POST["category_id"]) > 255) {
                $errors["title"] = "Title is too long!";
        }
            if($_POST["category_id"] < 1 || $_POST["category_id"] > 3) {
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