<?php require "views/components/head.php" ?>
<?php require "views/components/navbar.php" ?>

  <form>
    <input name='id' value='<?= ($_GET["id"] ?? "") ?>' />
    <button>Filter by ID</button>
  </form>

  <form>
    <input name='category' value='<?= ($_GET["category"] ?? "") ?>' />
    <button>Filter by category</button>
  </form>

  <h1>Posts and secret dashboard</h1>

  <ul>
    <?php foreach($posts as $post) { ?>

    <li>
        <a href="/show?id=<?= $post["id"]?>"> <?= htmlspecialchars($post["title"]) ?> </a>
        <form class="delete-form" method="POST" action="/delete">
        <button name="id" value="<?= $post["id"] ?>">Delete</button> </form>
    </li>

    <?php } ?>
  </ul>

  <form action="/logout" method="POST">
    <button>Logout</button>
</form>

<?php require "views/components/footer.php" ?>