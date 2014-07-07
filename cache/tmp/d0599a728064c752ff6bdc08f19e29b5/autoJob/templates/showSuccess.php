<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $jobeet_routes->getId() ?></td>
    </tr>
    <tr>
      <th>Price:</th>
      <td><?php echo $jobeet_routes->getPrice() ?></td>
    </tr>
    <tr>
      <th>Address id a:</th>
      <td><?php echo $jobeet_routes->getAddressIdA() ?></td>
    </tr>
    <tr>
      <th>Address id b:</th>
      <td><?php echo $jobeet_routes->getAddressIdB() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $jobeet_routes->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $jobeet_routes->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('job/edit?id='.$jobeet_routes->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('job/index') ?>">List</a>
