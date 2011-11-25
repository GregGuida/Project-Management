<div class="page-header">
  <h2>Categories</h2>
</div>

<ul>
  <?php foreach ($categories as $category) { ?>
    <li><a href="/categories/show/<?= $category['catID'] ?>"> <?= $category['name'] ?> </a></li>
  <?php } ?>
</ul>
