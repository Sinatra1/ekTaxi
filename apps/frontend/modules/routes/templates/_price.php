<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('routes/'.($form->getObject()->isNew() ? 'newPrice' : 'updatePrice').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="get">


    <input type="hidden" name="sf_method" value="put" />

    <table>
        <tfoot>
        <tr>
            <td colspan="2">
                &nbsp;<a href="<?php echo url_for('routes/index') ?>">Список маршрутов</a>
                <?php if (!$form->getObject()->isNew()): ?>
                    &nbsp;<?php echo link_to('Удалить маршрут', 'routes/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                <?php endif; ?>
                <input type="submit" value="Записать" />

                <?php if (!$form->getObject()->isNew()): ?>
                    <a href="<?php echo url_for('addresses/new?routeId='.$form->getObject()->getId())?>">Указать адреса начала и конца маршрута</a>
                <?php endif; ?>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <tr>
            <td>
                Стоимость километра
            </td>
            <td>
                <input type="text" name="jobeet_routes[price]" id="jobeet_routes_price" value="<?php echo $form->getObject()->getData()["price"] ?>"> р.
            </td>
        </tr>
        </tbody>
    </table>
</form>
