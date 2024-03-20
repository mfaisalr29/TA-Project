<?php $__env->startSection('container'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <h5>Dashboard</h5>
        <br><br>

        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Nomor Rumah
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">Detail Tagihan IPL</a>
                    <a href="#" class="list-group-item list-group-item-action" href="/profile">Profile</a>

                </div>
            </div>


            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" style="background-color: #394E69; border-radius:1%">
                        <div class="col-md-6">
                            <div class="card-body" style="background-color: #D9D9D9; padding: 4rem; border-radius:5%">
                                <h4>Selamat Datang, *Nama Warga</h4>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\muham\Documents\GitHub\TA-Project\Web Development\Back End\bcv1\resources\views/dashboard.blade.php ENDPATH**/ ?>