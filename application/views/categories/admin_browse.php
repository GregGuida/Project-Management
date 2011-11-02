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
    <?php for ($i = 0; $i < 15; $i++) { ?>
    <tr><td>Kitties</td><td><a href="/categories/edit/<?php echo $i ?>">Edit</a> | <a href="/categories/delete/<?php echo $i ?>">Delete</a></td></tr>
    <?php } ?>
  </tbody>
</table>
