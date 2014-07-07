<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ЕК Такси - Твое лучшее такси</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
</head>
<body>
<div id="container">
    <div id="header">
        <div class="content">
          <h1>Маршруты</h1>
        </div>
    </div>

    <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
        <?php endif; ?>

        <?php if ($sf_user->hasFlash('error')): ?>
            <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
        <?php endif; ?>

        <div class="content">
            <?php echo $sf_content ?>
        </div>
    </div>

    <div id="footer">
        <div>Автор: Владислав Шумилов</div>
    </div>
</div>
</body>
</html>