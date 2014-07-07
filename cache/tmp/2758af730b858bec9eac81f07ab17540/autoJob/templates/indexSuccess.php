<h1>Jobeet addressess List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Geo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($jobeet_addressess as $jobeet_addresses): ?>
    <tr>
      <td><a href="<?php echo url_for('job/show?id='.$jobeet_addresses->getId()) ?>"><?php echo $jobeet_addresses->getId() ?></a></td>
      <td><?php echo $jobeet_addresses->getTitle() ?></td>
      <td><?php echo $jobeet_addresses->getGeo() ?></td>
      <td><?php echo $jobeet_addresses->getCreatedAt() ?></td>
      <td><?php echo $jobeet_addresses->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('job/new') ?>">New</a>
