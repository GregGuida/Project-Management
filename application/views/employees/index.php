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
    <?php foreach($employees as $key => $employee) { ?>
    <tr>
      <td>#<?php echo $employee['uid'] ?></td>
      <td><?php echo $employee['FirstName'] ?></td>
      <td><?php echo $employee['LastName'] ?></td>
      <td><?php echo $employee['Email'] ?></td>
      <td><a href="/employees/edit/<?php echo $employee['uid'] ?>">Edit</a> | <a href="/employees/delete/<?php echo $employee['uid'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
