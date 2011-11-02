<div class="page-header">
  <h2>Employee Directory</h2>
</div>

<table id="employeeTableSorter" class="zebra-striped">
  <thead>
    <tr>
      <th class="blue">ID</th>
      <th class="red">First Name</th>
      <th class="yellow">Last Name</th>
      <th class="purple">Email</th>
      <th class="green">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i = 0; $i < 50; $i++) { ?>
    <tr>
      <td>#<?php echo $i ?></td>
      <td>E. First Name</td>
      <td>E. Last Name</td>
      <td>lastname@tfm.com</td>
      <td><a href="/employees/edit/1">Edit</a> | <a href="/employees/delete/1">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
