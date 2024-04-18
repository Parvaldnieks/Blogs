<?php

function dd($posts) {
    echo "<pre>";
    var_dump($posts);
    echo "</pre>";
    die();
  }

  function auth() {
    if(!isset($_SESSION["user"])) {
      header("Location: /login");
      die();
    }
}

function guest() {
  if(isset($_SESSION["user"])) {
    header("Location: /");
    die();
  }
}

?>