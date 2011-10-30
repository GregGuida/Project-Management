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
