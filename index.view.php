<form>
  <input name='id' value='<?= ($_GET["id"] ?? "") ?>' />
  <button>Filter by ID</button>
</form>

<form>
  <input name='category' value='<?= ($_GET["category"] ?? "") ?>' />
  <button>Filter by category</button>
</form>

<h1>Posts</h1>


<ul>
<?php foreach($posts as $post) { ?>

  <li> <?= $post["title"] ?> </li>

<?php } ?>
</ul>