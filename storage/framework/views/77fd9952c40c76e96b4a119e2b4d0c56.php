<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'MORINTERN')); ?> - Peserta</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-['Plus_Jakarta_Sans'] text-gray-900 antialiased bg-white">
    <?php echo e($slot); ?>

</body>
</html>
<?php /**PATH D:\Document\KULIAH\projectmagang\Morintern\resources\views\layouts\guest-peserta.blade.php ENDPATH**/ ?>