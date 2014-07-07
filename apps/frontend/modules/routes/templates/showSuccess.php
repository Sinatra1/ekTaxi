<?php use_stylesheet("route.css")?>
<table class="routeColumns">
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $jobeet_routes->getId() ?></td>
    </tr>
    <tr>
      <th>Цена:</th>
      <td><?php echo $jobeet_routes->getPrice() ?></td>
    </tr>
    <tr>
      <th>id адореса точки А:</th>
      <td><?php echo $jobeet_routes->getAddressIdA() ?></td>
    </tr>
    <tr>
      <th>id адреса точки B:</th>
      <td><?php echo $jobeet_routes->getAddressIdB() ?></td>
    </tr>
    <tr>
      <th>Дата создания:</th>
      <td><?php echo $jobeet_routes->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Дата обновления:</th>
      <td><?php echo $jobeet_routes->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('routes/edit?id='.$jobeet_routes->getId()) ?>">Редактировать цену маршрута</a>
&nbsp;
<a href="<?php echo url_for('routes/index') ?>">К списку маршрутов</a>
