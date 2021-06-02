<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="<?php echo e(csrf_token()); ?>" />

    <title>Webinarinc Developer Challenge</title>

    <link href="<?php echo e(mix('css/app.css')); ?>" type="text/css" rel="stylesheet" />
</head>

<body>
    <div id="app"></div>
    <script src="<?php echo e(mix('js/app.js')); ?>" type="text/javascript"></script>
</body>

</html><?php /**PATH C:\MAMP\htdocs\Webinarinc-challenge1\resources\views/app.blade.php ENDPATH**/ ?>