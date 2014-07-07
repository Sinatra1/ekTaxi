<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php use_javascript('jquery-2.1.1.min.js') ?>
<?php use_javascript('http://api-maps.yandex.ru/2.1/?lang=ru_RU') ?>
<?php use_javascript('Address.js') ?>
<?php use_stylesheet('address.css') ?>

<input id="routeId" type="hidden" value="<?php echo $form->routeId?>"/>

<form id="formNewRoute" action="<?php echo url_for('addresses/'.($form->getObject()->isNew() ? 'newRoute' : 'updateRoute').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="get">
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('routes/edit?id='.$form->routeId) ?>">назад</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'addresses/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <a id="saveRoute" href="#">Сохранить адреса</a>

            <?php
                if($form->isSetAllAddresses) {
                    echo '<a id="calcRouteCost" href="#">Рассчитать стоимость маршрута</a>';
                }
                else {
                    echo '<a id="calcRouteCost" href="#" style="display: none;">Рассчитать стоимость маршрута</a>';
                }
            ?>
        </td>
      </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>
                Откуда:
            </td>
            <td>
                <input id="addressA" type="text" name="addressA" class="addressTitle">
            </td>
        </tr>
        <tr>
            <td>
                Куда:
            </td>
            <td>
                <input id="addressB" type="text" name="addressB" class="addressTitle">
            </td>
        </tr>
    </tbody>
  </table>

   <div id="resultDiv">

   </div>
</form>
