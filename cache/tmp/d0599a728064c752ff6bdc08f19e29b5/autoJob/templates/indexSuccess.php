<h1>Jobeet routess List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Price</th>
      <th>Address id a</th>
      <th>Address id b</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($jobeet_routess as $jobeet_routes): ?>
    <tr>
      <td><a href="<?php echo url_for('job/show?id='.$jobeet_routes->getId()) ?>"><?php echo $jobeet_routes->getId() ?></a></td>
      <td><?php echo $jobeet_routes->getPrice() ?></td>
      <td><?php echo $jobeet_routes->getAddressIdA() ?></td>
      <td><?php echo $jobeet_routes->getAddressIdB() ?></td>
      <td><?php echo $jobeet_routes->getCreatedAt() ?></td>
      <td><?php echo $jobeet_routes->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('job/new') ?>">New</a>
