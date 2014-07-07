<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $jobeet_addresses->getId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $jobeet_addresses->getTitle() ?></td>
    </tr>
    <tr>
      <th>Geo:</th>
      <td><?php echo $jobeet_addresses->getGeo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $jobeet_addresses->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $jobeet_addresses->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('addresses/edit?id='.$jobeet_addresses->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('addresses/index') ?>">List</a>
