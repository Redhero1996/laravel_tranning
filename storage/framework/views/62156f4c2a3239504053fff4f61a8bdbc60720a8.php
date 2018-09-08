<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> <?php echo $__env->yieldContent('title'); ?> </title>

    <!-- Material Design fonts -->
    
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap.min.css'); ?>">

    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap-material-design.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/ripples.min.css'); ?>">

</head>
<body>

<?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo asset('js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?php echo asset('js/bootstrap.min.js'); ?>"></script>

<script src="<?php echo asset('js/ripples.min.js'); ?>"></script>
<script src="<?php echo asset('js/material.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>

</html