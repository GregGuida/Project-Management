<div class="page-header">
  <h2>Category Management</h2>
</div>

<p>
  <a href="/categories/admin_new" class="btn primary">New Category</a>
</p>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <? foreach ($categories as $category) { ?>
      <tr>
        <td><?= $category['name'] ?></td>
        <td>
          <a href="/categories/edit/<?= $category['catID'] ?>">Edit</a> | <a href="/categories/delete/<?= $category['catID'] ?>">Delete</a>
        </td>
      </tr>
    <? } ?>
  </tbody>
</table>
