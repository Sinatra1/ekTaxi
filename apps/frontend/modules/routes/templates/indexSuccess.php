<h2>Список маршрутов</h2>

<table>
  <thead>
    <tr>
      <th>id маршрута</th>
      <th>Цена</th>
      <th>id точки А</th>
      <th>id точки B</th>
      <th>Дата создания</th>
      <th>Дата обновления</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($jobeet_routess as $jobeet_routes): ?>
    <tr>
      <td><a href="<?php echo url_for('routes/edit?id='.$jobeet_routes->getId()) ?>"><?php echo $jobeet_routes->getId() ?></a></td>
      <td><?php echo $jobeet_routes->getPrice() ?></td>
      <td><?php echo $jobeet_routes->getAddressIdA() ?></td>
      <td><?php echo $jobeet_routes->getAddressIdB() ?></td>
      <td><?php echo $jobeet_routes->getCreatedAt() ?></td>
      <td><?php echo $jobeet_routes->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('routes/new') ?>">Создать новый маршрут</a>
