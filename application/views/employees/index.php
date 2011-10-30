<div class="page-header">
  <h2>Employee Directory</h2>
</div>

<table id="employeeTableSorter" class="zebra-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i = 0; $i < 50; $i++) { ?>
    <tr>
      <td>#<?php echo $i ?></td>
      <td>E. First Name</td>
      <td>E. Last Name</td>
      <td>lastname@tfm.com</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
